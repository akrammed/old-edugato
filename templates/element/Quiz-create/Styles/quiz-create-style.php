<style>
.header-title-info {
    color: #000;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 18px;
    text-align: end;
}

#matches {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.type-match {
    display: flex;
    padding: 0 1rem;
    justify-content: center;
    align-items: center;
    height: 44px;
    border-radius: 16px;
    background: #7F77FF;
    border: none;
    color: #ffffff;
    font-size: 16px;
    font-weight: 500;
}

.type-match::placeholder {
    color: #ffffff;
}

#fields {
    display: flex;
    gap: 1rem;
}

#options, #empties {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    flex: 1;
    flex-shrink: 0;
}

#match {
    display: inline-flex;
    gap: 8px;
    flex-wrap: wrap;
}

.option, .empty {
    width: 100%;
    padding: 0 1rem;
    height: 44px;
    border-radius: 16px;
    background: #105FCE;
    border: none;
    color: #CBD4E1;
    font-size: 16px;
    font-weight: 500;
}

.empty {
    background: #ECEFF4;
}

.option::placeholder {
    color: #FFF;
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
    display: flex;
    align-items: center;
}

.cancel {
    background-color: #E0EDFF;
    color: #5C17E5;
    border: none;
    border-radius: 1rem;
    height: 44px;
    padding: 0 2.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 500;
    margin-right: 0.5rem;
}

.save {
    background-color: #5C17E5;
    color: white;
    border: none;
    border-radius: 1rem;
    height: 44px;
    padding: 0 2.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 500;
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