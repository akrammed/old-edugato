from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from openai import OpenAI

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost:8765"], 
    allow_credentials=True,
    allow_methods=["GET", "POST"],
    allow_headers=["*"],
)

api_key = 'sk-api-Bc2sYgyt9VCFRh3R5w74T3BlbkFJFRTZV0JcesdQyqJUhfRt'

client = OpenAI(api_key=api_key)

class UserPrompt(BaseModel):
    user_prompt: str


@app.post('/generate')
async def generate_assistance(prompt: UserPrompt):
    completion = client.chat.completions.create(
        model="gpt-3.5-turbo",
        messages=[
              {"role": "system", "content": "You are Emily, an English teacher at EduGato, skilled in explaining complex english concepts with creative flair.and you know only english if somone ask you anything not about english answer with i am sorry, i can only help you in english "},
            {"role": "user", "content": prompt.user_prompt}
        ]
    )
    return {"response": completion.choices[0].message}

@app.get('/test/')
async def test_server():
    return {"message": "Server is running"}
