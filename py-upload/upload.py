from fastapi import FastAPI, HTTPException, File, UploadFile
from fastapi.middleware.cors import CORSMiddleware
from fastapi.responses import JSONResponse
from pathlib import Path

app = FastAPI()
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], 
    allow_credentials=True,
    allow_methods=["*"], 
    allow_headers=["*"],  
)
from fastapi import FastAPI, 


app = FastAPI()


UPLOAD_DIR = Path("uploads")
UPLOAD_DIR.mkdir(exist_ok=True)

@app.post("/upload/")
async def upload_file(file: UploadFile):
    file_location = UPLOAD_DIR / file.filename
    with open(file_location, "wb") as buffer:
        buffer.write(await file.read())
    return JSONResponse(content={"filename": file.filename})

if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8000)
