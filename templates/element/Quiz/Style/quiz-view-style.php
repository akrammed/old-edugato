<style>
body {
    background-color: #F6F8FB !important;
    font-family: "Poppins", sans-serif !important;
    font-weight: 700;
    font-style: normal !important;
    color: #27313F !important;
}

.quiz-title-row {
    display: grid;
    justify-content: center;
}

.quiz-title {
    font-size: 29px;
    color: black;
    font-weight: 500;
}

.avatar-container {
    display: flex;
    justify-content: center;
    margin-top: 2%;
    margin-left: 1%;
    border-bottom: 1px solid #CBD4E1;
}

.avatar-question {
    font-size: 16px;
    margin-top: 2%;
    font-weight: 600;
}

.options-list {
    display: flex;
    justify-content: center;
    border-bottom: 1px solid #CBD4E1;
}

.option-element {
    border: 2px solid;
    color: white;
    background-color: #7F77FF;
    padding: 2%;
    border-radius: 9%;
    margin: 1%;
    cursor: pointer;
    list-style-type: none;
    font-size: 11px;
}

.footer {
    height: 70px;
    border-top: 3px solid #ECEFF4;
    padding: 20px 0;
    position: fixed;
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
    margin-top: 4%;
    background-color: white;
    color: rgb(1, 106, 28);
    border-color: rgb(1, 106, 28);
}
</style>