<style>
@media screen and (max-width: 1000px) {
    .type-match {
        max-width: none;
    }

    .type-match::placeholder {

        font-size: 12px;
    }

    .empty {
        width: 100%;
        max-width: none;
    }

    .option {
        width: 100%;
        font-size: 13px;
    }
}

#actions {
    right: 2% !important;
    /* top: 135%; */
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
    width: 108%;
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
    color: var(--Interactive-Secondary-Solid-Hover-Background, #CBD4E1);
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
    flex-direction: column;
    gap: 8px;
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
}

.option::placeholder {
    color: var(--Interactive-Secondary-Solid-Hover-Background, #CBD4E1);
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
    margin-bottom: 30%%;
}

.option-create-sub-title {}

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
    background: var(--Foreground-Positive, #17BF33);

    /* Elevation/Small */
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
    width: 72px;
    height: 40px;
    border: none;
    color: var(--Interactive-Primary-Solid-Enabled-Foreground, #FFF);

    /* Label/Large */
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
}

.correct-option:focus {
    color: var(--Interactive-Primary-Solid-Enabled-Foreground, #FFF);

    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    align-items: center;
    border: none;
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
    width: 150px;
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

.space-input {
    width: 584px;
    height: 130px;
    flex-shrink: 0;
    border-radius: 8px;
    background: var(--Background-Secondary, #F6F8FB);
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16) inset;
    position: relative;
    padding: 10px;
    margin-top: 10%;
}

.space-input .icon {
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

style-option {
    width: 78px;
    height: 77px;
    flex-shrink: 0;
}


.gato-header-quiz-create {
    display: grid;
    justify-content: start;
}
</style>