from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from openai import OpenAI

app = FastAPI()
origins = [
    "http://localhost",  # Include this if you are testing locally
    "http://127.0.0.1:8000",  # Adjust according to your specific needs
    # You can add more origins here
]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],  
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
            {"role": "system", "content": "You are Gato, an English teacher at EduGato. Suggest 6 topics for a game composed of 10 questions in English. Then, based on the user's choice, create the game, and once the user choose a topic you should give him each time one questions till 10 "},
            {"role": "user", "content": prompt.user_prompt}
        ]
    )
    return {"response": completion.choices[0].message}

@app.get('/test/')
async def test_server():
    return {"message": "Server is running"}
