from fastapi import FastAPI, HTTPException, Request
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import httpx

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost:8765"],
    allow_credentials=True,
    allow_methods=["GET", "POST"],
    allow_headers=["*"],
)

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

OPENAI_API_KEY = 'skdjfoij3m4i2j343kmlkdfkaj32k3j4'

@app.post("/assistant/")
async def get_assistant_response(request: AssistantRequest) -> AssistantResponse:
    try:
        prompt = request.prompt
        print(f"Received prompt: {prompt}")

        data = {
            "model": "gpt-3.5-turbo",
            "messages": [
                {"role": "system", "content": "EduGato is your English teacher assistant."},
                {"role": "user", "content": prompt}
            ]
        }

        headers = {
            "Content-Type": "application/json",
            "Authorization": f"Bearer {OPENAI_API_KEY}"
        }

        async with httpx.AsyncClient() as client:
            response = await client.post(
                "https://api.openai.com/v1/chat/completions",
                json=data,
                headers=headers
            )
            response.raise_for_status()
            response_data = response.json()
            assistant_response = response_data['choices'][0]['message']['content']

        return AssistantResponse(response=assistant_response)

    except httpx.HTTPStatusError as e:
        if e.response.status_code == 401:
            raise HTTPException(status_code=401, detail="Invalid API key provided")
        else:
            raise HTTPException(status_code=500, detail=f"HTTP error occurred: {e}")
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Unexpected error occurred: {e}")

@app.post("/quiz/")
async def check_quiz_answer(request: QuizRequest) -> QuizResponse:
    try:
        question = request.question
        user_answer = request.user_answer

        data = {
            "model": "gpt-3.5-turbo",
            "messages": [
                {"role": "system", "content": "You are an assistant that helps verify and correct quiz answers."},
                {"role": "user", "content": f"Question: {question}\nUser's Answer: {user_answer}"}
            ]
        }

        headers = {
            "Content-Type": "application/json",
            "Authorization": f"Bearer {OPENAI_API_KEY}"
        }

        async with httpx.AsyncClient() as client:
            response = await client.post(
                "https://api.openai.com/v1/chat/completions",
                json=data,
                headers=headers
            )
            response.raise_for_status()
            response_data = response.json()
            assistant_message = response_data['choices'][0]['message']['content']

        is_correct = "correct" in assistant_message.lower()
        return QuizResponse(is_correct=is_correct, correction=assistant_message)

    except httpx.HTTPStatusError as e:
        if e.response.status_code == 401:
            raise HTTPException(status_code=401, detail="Invalid API key provided")
        else:
            raise HTTPException(status_code=500, detail=f"HTTP error occurred: {e}")
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Unexpected error occurred: {e}")

@app.get("/test/")
async def test_endpoint():
    return {"message": "This is a test endpoint for GET requests"}

@app.middleware("http")
async def log_requests(request: Request, call_next):
    print(f"Incoming request: {request.method} {request.url}")
    response = await call_next(request)
    return response

