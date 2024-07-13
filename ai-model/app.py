from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from openai import OpenAI

app = FastAPI()
origins = [
    "http://localhost", 
    "http://127.0.0.1:8000",  
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

class SelectTopic(BaseModel):
    topic: str


class UserAnswer(BaseModel):
    user_answer: str

class GameState:
    def __init__(self):
        self.current_topic = None
        self.questions = []
        self.current_question_index = 0

game_state = GameState()


@app.post('/generate')
async def generate_assistance(prompt: UserPrompt):
    if not game_state.current_topic:
        completion = client.chat.completions.create(
            model="gpt-3.5-turbo",
            messages=[
                {"role": "system", "content": "You are Gato, an English teacher at EduGato. Suggest 4 topics for a game composed of 10 questions in English. Wait for the user to choose a topic before continuing."},
                {"role": "user", "content": prompt.user_prompt}
            ]
        )
        response = completion.choices[0].message
        return {"response": response}
    else:
        raise HTTPException(status_code=400, detail="A topic has already been selected.")

@app.post('/select_topic')
async def select_topic(select_topic: SelectTopic):
    if not game_state.current_topic:
        game_state.current_topic = select_topic.topic

        completion = client.chat.completions.create(
            model="gpt-3.5-turbo",
            messages=[ 
                {"role": "system", "content": f"You are Gato, an English teacher at EduGato. Generate 10 questions for the topic '{game_state.current_topic}'. Give only the questions, nothing else."}
            ]
        )

        # Extract and process questions
        content = completion.choices[0].message.content
        print(f"content: {content}")
        game_state.questions = content.split('\n')  # Split the content by newlines to get individual questions
        game_state.current_question_index = 0  # Reset the question index

        count = game_state.current_question_index
        quest = game_state.questions
        print(f"Next question: {quest}")
        print(f"count: {count}")
        return {
            "response": "Topic selected. Starting the game. Here is your first question:",
            "question": game_state.questions[game_state.current_question_index]
        }
    else:
        raise HTTPException(status_code=400, detail="A topic has already been selected.")


@app.post('/next_question')
async def next_question(user_answer: UserAnswer):
    if game_state.current_topic and game_state.questions:
        # Process user answer if needed

        game_state.current_question_index += 1

        if game_state.current_question_index < len(game_state.questions):
            current_question = game_state.questions[game_state.current_question_index]
            print(f"Next question: {current_question}")
            return {
                "response": "Here's your next question:",
                "question": current_question
            }
        else:
            game_state.current_topic = None
            game_state.questions = []  # Clear questions list after game ends
            game_state.current_question_index = 0
            return {"response": "Game over. You have answered all the questions."}
    else:
        raise HTTPException(status_code=400, detail="No active game. Please start by selecting a topic.")




@app.post('/test')
async def generate_assistance(prompt: UserPrompt):


    
    completion = client.chat.completions.create(
        model="gpt-3.5-turbo",
        messages=[
            {"role": "system", "content": "You are Gato, an English teacher at EduGato. Suggest 6 topics for a game composed of 10 questions in English. Then, based on the user's choice, create the game, and once the user choose a topic you should give him each time one questions till 10 , All your responses must be formatted in markdown."},
            {"role": "user", "content": prompt.user_prompt}
        ]
    )
    return {"response": completion.choices[0].message}

