<style>
@media screen and (max-width: 1000px) {
    .type-match {
        max-width: none;
    }

    .type-match::placeholder {

        font-size: 12px;
    }


}

#actions {
    right: 2% !important;
    top: 87%;
}

.header-title-info {

    color: #000;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 18px;
    text-align: end;
}

#matches {
    margin-top: 15%;
}

.type-match {
    display: flex;
    padding: 4px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    background: var(--Brand-Secondary, #7F77FF);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    border: none;
    color: var(--Interactive-Secondary-Solid-Hover-Background, #CBD4E1);
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
}

.type-match::placeholder {
    color: #fff;
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
}

.type-match:focus {
    border: none;
    outline: none;
}

#fields {
    margin-top: 8%;
}

#options {
    display: inline-flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
}

#match {
    display: inline-flex;
    gap: 8px;
    flex-wrap: wrap;
}

#empties {
    display: inline-flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
}

.empty {
    display: flex;
    height: 32px;
    width: 100%;
    padding: 4px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    background: var(--Background-Secondary, #F6F8FB);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
}

.question-text {

    flex-shrink: 0;
    color: #000;
    font-size: 12px;
    font-weight: 400;
    line-height: 18px;
    text-align: center;
}

.talking-bubbls {
    margin-right: -1%;
}

.option {
    display: flex;
    padding: 4px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    background: var(--Text-Informative, #105FCE);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    border: none;
    color: var(--Interactive-Secondary-Solid-Hover-Background, #CBD4E1);
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    width: 100%;
}

.option::placeholder {
    color: #fff;
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
}

.option:focus {
    border: none;
    outline: none;
}

.gato-quition-bubble {
    display: flex;
    width: 300px;
    padding: 8.913px 11.141px;
    align-items: center;
    gap: 5.57px;
    border-radius: 33.423px;
    border: 0.557px solid var(--Outline-Container, rgba(154, 168, 188, 0.20));
    background: var(--Background-Primary, #FFF);
    box-shadow: 0px 1.114px 4.456px 0px rgba(0, 0, 0, 0.04);
    margin-bottom: 10%;
    margin-right: -35%;
    color: #9AA8BC;
    font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    line-height: 24px;
}

.gato-quition-bubble:focus {
    border: none !important;
}


.ellipse {
    margin-left: 100%;
    margin-top: 110%;
}

.ellipse2 {
    margin-left: 30%;
}

.title {
    display: flex;
    align-items: center;
}


.avatar-gato {
    width: 56.262px;
    height: 63.503px;
    flex-shrink: 0;
}

.icon-avatar .container {
    padding: 20px;
    background-color: #f9f9f9;
}

.quiz {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.quiz h3 {
    text-align: center;
}

.quizContainer {
    /* display: flex  !important; */
    flex-direction: column !important;
    justify-content: flex-end !important;
}

#actions {
    position: absolute;
    bottom: 0;
    right: 0;
    display: flex;
}

.cancel {
    display: flex;
    width: 91px;
    height: 39px;
    padding: 0px 16px;
    justify-content: center;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
    border-radius: 8px;
    background: var(--Background-Informative, #E0EDFF);
    color: var(--Brand-Primary, #5C17E5);
    display: flex;
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 150%;
    border: none;
    margin-right: 4%;
    margin-left: -19%;
}

.save {
    display: flex;
    width: 108px;
    height: 39px;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
    border-radius: 8px;
    background: var(--Interactive-Primary-Solid-Enabled-Background, #5C17E5);
    color: var(--Interactive-Primary-Solid-Enabled-Foreground, #FFF);
    font-family: Poppins;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: 150%;
    border: none;
    display: flex;
}

.return {
    display: flex !important;
}

.correct-option {
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    background: #17BF33;
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    width: 100%;
    height: 40px;
    border: none;
    color: #FFF;
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
    text-align: center;
}

.correct-option:focus {
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    align-items: center;
    border: none;
}
.correct-option::placeholder{
    color : #FFF;
}

.false-option {
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    background: var(--Brand-Secondary, #7F77FF);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    color: var(--Interactive-Primary-Solid-Enabled-Foreground, #FFF);

    /* Label/Large */
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    width: 100%;
    border: none;
    height: 40px;
    text-align: center;
}

.false-option:focus {
    border: none;
    color: var(--Interactive-Primary-Solid-Enabled-Foreground, #FFF);

    /* Label/Large */
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    display: flex;
    align-items: center;

}
.false-option::placeholder{
    color : #FFF;
}

.add-option {
    margin-top: 6%;
    margin-left: 6%;
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    border: 1px solid var(--Outline-Input-Enabled, #9AA8BC);
    background: var(--Background-Primary, #FFF);

    /* Elevation/Small */
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    width: 108px;
    height: 40px;
    color: var(--Background-Secondary-Inverse, #27313F);

    /* Label/Large */
    font-family: Poppins;
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    text-align: center;
    /* 150% */
}


#correct-frame {
    display: flex;
    width: 118px;
    height: 141px;
    justify-content: center;
    align-items: center;
    gap: 16px;
    flex-shrink: 0;
    border-radius: 16px;
    border: 4px solid var(--Outline-Positive, #17BF33);
    background: #FFF;
}

.style-option {
    width: 78px;
    height: 77px;
    flex-shrink: 0;
}


.gato-header-quiz-create {
    display: grid;
    justify-content: start;
}

.order-option {
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    background: var(--Brand-Secondary, #7F77FF);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    color: var(--Interactive-Primary-Solid-Enabled-Foreground, #FFF);
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
    width: 72px;
    border: none;
    height: 40px;
}

.order-option:focus {
    border: none;
    color: var(--Interactive-Primary-Solid-Enabled-Foreground, #FFF);
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
    display: flex;
    align-items: center;

}

.add-option {
    margin-top: 6%;
    margin-left: 6%;
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    border: 1px solid var(--Outline-Input-Enabled, #9AA8BC);
    background: var(--Background-Primary, #FFF);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    width: 108px;
    height: 40px;
    color: var(--Background-Secondary-Inverse, #27313F);
    font-size: 14px;
    font-weight: 500;
    line-height: 24px;
    text-align: center;
}

.space-input {
    height: 130px;
    flex-shrink: 0;
    border-radius: 8px;
    background: var(--Background-Secondary, #F6F8FB);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16) inset;
    position: relative;
    padding: 10px;
    margin-top: 10%;
}

.space-input .back-space-icon {
    position: absolute;
    top: 0;
    right: 0;
    margin: 2%;
}

#correct-frame {
    display: flex;
    width: 118px;
    height: 141px;
    justify-content: center;
    align-items: center;
    gap: 16px;
    flex-shrink: 0;
    border-radius: 16px;
    border: 4px solid var(--Outline-Positive, #17BF33);
    background: #FFF;
}

#add-word-order {
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    border-radius: 16px;
    border: 1px solid var(--Outline-Input-Enabled, #9AA8BC);
    background: var(--Background-Primary, #FFF);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    margin-left: 2%;
}

#order-word {
    border-radius: 16px;
    background: var(--Brand-Secondary, #7F77FF);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    display: flex;
    padding: 8px 16px;
    justify-content: center;
    align-items: center;
    gap: 12px;
    width: 14%;
    height: 40px;
}
</style>