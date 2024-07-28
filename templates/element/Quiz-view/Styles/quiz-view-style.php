<style>

.quiz-title-row {
    display: grid;
    justify-content: center;
}

.quiz-title {
    font-size: 26px;
    color: black;
    font-weight: 600;
}

.avatar-container {
    display: flex;
    justify-content: center;
    margin-top: 0%;
    margin-left: 0%;
}

.avatar-question {
    font-size: 16px;
    margin-top: -3%;
    font-weight: 600;
    margin-left: -1%;
    background-color: white;
    padding: 2%;
    height: 70%;
    border-radius: 39px;
    box-shadow: 0px 0px 20px #dddddd;
}

.answer-list,
.options-list {
    display: flex;
    justify-content: center;
    width: 90%;
}

.option-element {
    border: 2px solid;
    color: white;
    background-color: #7F77FF;
    padding: 2%;
    border-radius: 18px;
    margin: 1%;
    cursor: pointer;
    list-style-type: none;
    font-size: 13px;
    text-align: center;
}

.footer {
    height: 90px;
    padding: 20px 0;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.col-check {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
}

.col-skip {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.skip-btn,
.check-btn {
    background-color: transparent;
    border: 2px solid black;
    color: black;
    width: 72px;
    border-radius: 16%;
    height: 44px;
}

.skip-btn {
    background-color: transparent;
    border: 3px solid #525E6F;
}

.correct-title {
    margin-top: 10%;
    font-size: 22px;
    color: rgb(1, 106, 28);
}

.wrong-title {
    margin-top: 8%;
    font-size: 22px;
    color: rgb(177, 0, 15);
}

.answer-alert {
    display: flex;
}

.continue-btn {
    background-color: white;
    color: rgb(1, 106, 28);
    border-color: rgb(1, 106, 28);
}

.image-card {
    height: 150px;
    background-color: transparent;
    border: none;
    width: 170px;
}

.image-groupe {
    display: flex;
    margin-top: 1.5%;
    justify-content: center;
}

.answers {
    height: 100px;
}

@media (max-width: 1000px) {
    .image-card {
        height: 117px;
        background-color: transparent;
        border: none;
        width: 124px;
    }

    
}
</style>