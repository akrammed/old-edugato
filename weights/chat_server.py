
from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

class Message(BaseModel):
    user: str
    content: str

@app.post("/send_message/")
async def send_message(message: Message):
    print(f"Received message from {message.user}: {message.content}")
    return {"status": "Message received"}

@app.get("/messages/")
async def get_messages():
    return [
        {"user": "Alice", "content": "Hello!"},
        {"user": "Bob", "content": "Hi there!"}
    ]
