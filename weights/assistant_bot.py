from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
import httpx

app = FastAPI()

OPENAI_API_KEY = 'YOUR_OPENAI_API_KEY'

client = httpx.AsyncClient(headers={"Authorization": f"Bearer {OPENAI_API_KEY}"})

class AssistantRequest(BaseModel):
    prompt: str

class AssistantResponse(BaseModel):
    response: str

class QuizRequest(BaseModel):
    question: str
    user_answer: str

class QuizResponse(BaseModel):
    is_correct: bool
    correction: str

@app.post("/assistant/")
async def get_assistant_response(request: AssistantRequest) -> AssistantResponse:
    try:
        response = await fetch_assistant_response(request.prompt)
        return AssistantResponse(response=response)
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

async def fetch_assistant_response(prompt: str) -> str:
    try:
        url = "https://api.openai.com/v1/engines/gpt-3.5-turbo/completions"
        headers = {
            "Content-Type": "application/json",
            "Authorization": f"Bearer {OPENAI_API_KEY}"
        }
        data = {
            "model": "gpt-3.5-turbo",
            "messages": [
                {"role": "system", "content": "EduGato is your English teacher assistant."},
                {"role": "user", "content": prompt},
                {"role": "assistant", "content": "As your English teacher, let me explain that concept."},
                {"role": "assistant", "content": "Here's an example to illustrate."},
                {"role": "assistant", "content": "Would you like more examples or clarification on this topic?"},
            ]
        }
        async with httpx.AsyncClient() as client:
            response = await client.post(url, headers=headers, json=data)
            response_data = response.json()
            return response_data['choices'][0]['message']['content']
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.post("/quiz/")
async def check_quiz_answer(request: QuizRequest) -> QuizResponse:
    try:
        response = await fetch_quiz_correction(request.question, request.user_answer)
        return QuizResponse(is_correct=response['is_correct'], correction=response['correction'])
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

async def fetch_quiz_correction(question: str, user_answer: str) -> dict:
    try:
        url = "https://api.openai.com/v1/engines/gpt-3.5-turbo/completions"
        headers = {
            "Content-Type": "application/json",
            "Authorization": f"Bearer {OPENAI_API_KEY}"
        }
        data = {
            "model": "gpt-3.5-turbo",
            "messages": [
                {"role": "system", "content": "You are an assistant that helps verify and correct quiz answers."},
                {"role": "user", "content": f"Question: {question}\nUser's Answer: {user_answer}"},
                {"role": "assistant", "content": "Let's check if the user's answer is correct and provide the correct answer if it is not."},
            ]
        }
        async with httpx.AsyncClient() as client:
            response = await client.post(url, headers=headers, json=data)
            response_data = response.json()
            assistant_message = response_data['choices'][0]['message']['content']
            is_correct = "correct" in assistant_message.lower()
            return {"is_correct": is_correct, "correction": assistant_message}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8000)
