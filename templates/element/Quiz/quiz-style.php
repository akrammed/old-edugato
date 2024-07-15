<style>
body {
    background-color: #F6F8FB !important;
}

.question-cat {
    font-size: 18px;
    font-weight: 700;
}

.container-loading {
    margin: 5% auto;
    width: 400px;
    text-align: center;
    margin-bottom: 5%;
}

.container-loading .progress {
    margin: 0 auto;
    width: 600px;
    margin-left: -26%;
    margin-top: -5%;
    height: 17px;
    background-color: #ECEFF4 !important;
}

.progress {
    padding: 4px;
    background: rgba(0, 0, 0, 0.25);
    border-radius: 6px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
}

.progress-bar {
    height: 16px;
    border-radius: 4px;
    background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    -webkit-transition: 0.4s linear;
    -moz-transition: 0.4s linear;
    -o-transition: 0.4s linear;
    transition: 0.4s linear;
    -webkit-transition-property: width, background-color;
    -moz-transition-property: width, background-color;
    -o-transition-property: width, background-color;
    transition-property: width, background-color;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
}


#five:checked~.progress>.progress-bar {
    width: 5%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#twentyfive:checked~.progress>.progress-bar {
    width: 25%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#fifty:checked~.progress>.progress-bar {
    width: 50%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}


#seventyfive:checked~.progress>.progress-bar {
    width: 75%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#onehundred:checked~.progress>.progress-bar {
    width: 100%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}


#continue {
    background-color: rgb(255, 255, 255);
    color: rgb(1, 106, 28);
    border: 2px solid rgb(1, 106, 28);
    margin-top: 4%;
    width: 30%;
}


.radio {
    display: none;
}

.label {
    display: inline-block;
    margin: 0 5px 20px;
    padding: 3px 8px;
    color: #aaa;
    text-shadow: 0 1px black;
    border-radius: 3px;
    cursor: pointer;
}

.radio:checked+.label {
    color: white;
    background: rgba(0, 0, 0, 0.25);
}

.card {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.footer {
    height: 90px;
    padding: 20px 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f8f9fa;
    /* Example background color */
}

.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}

.btn-skip,
.btn-next {
    background-color: transparent;
    border: 2px solid black;
    margin-right: auto;
    color: black;
    width: 72px;
    border-radius: 16%;
    height: 44px;
    margin-top: 2%;
}

.btn-skip {
    background-color: transparent;
    border: 3px solid #525E6F;
    margin-right: auto;
}



.btn-next {
    display: block;
    margin-left: 78%;
}

.line {
    color: white;
}

.title {
    color: white;
    text-align: center;
}

.content {
    color: white;
    text-align: center;
    border-bottom: 3px solid #ECEFF4;
}

.content {
    text-align: center;
    /* Center align the content */
}

.conversation {
    display: flex;
    align-items: center;
    /* Align items vertically */
}

.avatar-container {
    margin-right: 20px;
    /* Adjust spacing between avatar and speech */
}

.avatar-img {
    width: 100px;
    /* Adjust size as needed */
    height: auto;
    /* For circular avatars */
}

.speech-container {
    color: black;
    padding: 10px;
    /* Optional: Add a shadow */
}

/* Style the speech text */
.speech-container h2 {
    margin: 0;
    /* Remove default margin */
}

.answers {
    border-bottom: 3px solid #ECEFF4;
    margin-top: 5%;
    color: white;
    height: 47px;

}

.options {
    margin-top: 4%;
}

.answers ol,
.options ol {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    margin-left: 10%;
}

.answers li,
.options li {
    margin-right: 10px;
    /* Adjust spacing between list items */
}

/* Optional: Adjust styling of list items */
.answers li,
.options li {
    background-color: #7F77FF;
    border-radius: 10px;
    padding: 10px;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    width: 105px;
    text-align: center;
}

.wrong-alert {
    display: flex;
    align-items: center;
    color: rgb(216 72 72);
    margin-left: 5%;
}

.correct-alert {
    display: flex;
    align-items: center;
    color: rgb(121, 185, 51, 1);
    margin-left: 5%;
}

.correct-alert img,
.wrong-alert img {
    display: block;
    margin: 8px 0 0 10px;
}

.alert {
    background: rgb(19, 31, 36, 1);
    border-radius: 98px;
    display: block;
    float: left;
    height: 80px;
    width: 80px;
}

.quiz-title-2 {
    margin-left: -11%;
    color: black;
    font-size: 24px;
    font-weight: 700;
    margin-top: 3%;
    margin-bottom: 4%;
}

.correct-icon-btn {
    margin-left: 6%;
    width: 252px;
    font-size: 16px;
    font-weight: 700;

}




@media only screen and (min-width: 769px) {
    .container-loading .progress {
        margin: 0 auto;
        width: 183%;
        margin-left: -44%;
        margin-top: -5%;
        height: 17px;
        background-color: #ECEFF4 !important;
    }

    .quiz-title-2 {
        margin-left: -10%;
        color: black;
        font-size: 24px;
        font-weight: 700;
        margin-top: 3%;
        margin-bottom: 4%;
    }


    .btn-next {
        display: block;
        margin-left: 78%;
    }

    .btn-skip {
        margin-left: 6%;
    }

    .answers ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 5%;
    }

    .content {
        text-align: center;
        width: 72%;
        margin-left: 10%;
    }

    .answers {
        border-bottom: 3px solid #ECEFF4;
        margin-top: 5%;
        color: white;
        width: 72%;
        height: 47px;
        margin-left: 10%;
    }

    .options ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 14%;
    }


    #continue {
        background-color: rgb(255, 255, 255);
        color: rgb(1, 106, 28);
        border: 2px solid rgb(1, 106, 28);
        margin-top: 3.5%;
        width: 22%;
        margin-left: 72%;
    }

    .correct-icon-btn {
        margin-left: 1%;
        width: 252px;
        font-size: 16px;
        font-weight: 700;
        margin-top: 2%;
    }
}

@media only screen and (max-width: 768px) {
    .question-cat {
        font-size: 15px;
        font-weight: 700;
    }

    .content {
        color: white;
        text-align: center;
        width: 76%;
        border-bottom: 3px solid #ECEFF4;
        margin-left: 10%;
    }

    .icon-alert {
        width: 56%;

    }

    .container-loading .progress {
        margin: 0 auto;
        width: 99%;
        margin-left: 1%;
        margin-top: -5%;
        height: 17px;
        background-color: #ECEFF4 !important;
    }

    .options ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 7%;
    }

    .answers li,
    .options li {
        font-size: 64% !important;
        width: 18%;
    }

    .options {
        margin-top: 4%;
        margin-left: 8%;
    }

    .answers {
        border-bottom: 3px solid #ECEFF4;
        margin-top: 5%;
        color: white;
        height: 47px;
        width: 79%;
        margin-left: 9%;
    }

    .quiz-title-2 {
        margin-left: -9%;
        color: black;
        font-size: 16px;
        font-weight: 700;
        margin-top: 3%;
        margin-bottom: 4%;
    }

    .answers ol,
    .options ol {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-left: 2%;
    }


    .answers li,
    .options li {
        font-size: 77%;
    }

    .btn-skip {
        margin-left: 15%;
    }

    .btn-next {
        margin-left: 44%;
    }

    .container-loading {
        margin: 5% auto;
        width: 400px;
        text-align: center;
        margin-bottom: 5%;
    }

    .correct-icon-btn {
        margin-left: 6%;
        width: 252px;
        font-size: 15px;
        font-weight: 700;
        margin-top: 7%;
    }

    #continue {
        background-color: rgb(255, 255, 255);
        color: rgb(1, 106, 28);
        border: 2px solid rgb(1, 106, 28);
        margin-top: 9%;
        width: 44%;
    }

}
</style>