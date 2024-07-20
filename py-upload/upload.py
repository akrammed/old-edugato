
from fastapi import FastAPI, File, UploadFile, HTTPException
from fastapi.responses import JSONResponse
from fastapi.middleware.cors import CORSMiddleware
from pathlib import Path
import shutil
import mimetypes

app = FastAPI()


app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  
    allow_credentials=True,
    allow_methods=["*"],  
    allow_headers=["*"],  
)


BASE_DIR = Path("../webroot/uploads")
UPLOAD_DIRS = {
    "pictures": BASE_DIR / "pictures",
    "videos": BASE_DIR / "videos",
    "audio": BASE_DIR / "audio",
    "other": BASE_DIR / "other"
}


for directory in UPLOAD_DIRS.values():
    directory.mkdir(parents=True, exist_ok=True)


MIME_TYPE_MAP = {
    'image': UPLOAD_DIRS["pictures"],
    'video': UPLOAD_DIRS["videos"],
    'audio': UPLOAD_DIRS["audio"]
}

def get_upload_dir(file_type: str) -> Path:
    for mime_prefix, directory in MIME_TYPE_MAP.items():
        if file_type.startswith(mime_prefix):
            return directory
    return UPLOAD_DIRS["other"]

@app.post("/upload/")
async def upload_files(files: list[UploadFile]):
    uploaded_files = []
    for file in files:
        file_type, _ = mimetypes.guess_type(file.filename)
        upload_dir = get_upload_dir(file_type or "")
        
        file_location = upload_dir / file.filename
        try:
            with open(file_location, "wb") as buffer:
                shutil.copyfileobj(file.file, buffer)
            uploaded_files.append(file.filename)
        except Exception as e:
            raise HTTPException(status_code=500, detail=f"Failed to upload file: {e}")
    
    return JSONResponse(content={"status": "success", "filenames": uploaded_files}, status_code=201)

@app.get("/files/{category}")
async def list_files_by_category(category: str):
    if category not in UPLOAD_DIRS:
        raise HTTPException(status_code=400, detail="Invalid category")
    
    directory = UPLOAD_DIRS[category]
    files = [file_path.name for file_path in directory.iterdir() if file_path.is_file()]
    return JSONResponse(content={category: files})

@app.delete("/files/{category}/{filename}")
async def delete_file(category: str, filename: str):
    if category not in UPLOAD_DIRS:
        raise HTTPException(status_code=400, detail="Invalid category")
    
    directory = UPLOAD_DIRS[category]
    file_path = directory / filename
    
    if not file_path.exists() or not file_path.is_file():
        raise HTTPException(status_code=404, detail="File not found")
    
    try:
        file_path.unlink()
        return JSONResponse(content={"status": "success", "message": f"File '{filename}' deleted."})
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Failed to delete file: {e}")


if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8000)
