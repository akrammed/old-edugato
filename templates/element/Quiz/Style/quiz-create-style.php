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
        top: 135%;
    }

    .part-2 {

        flex-shrink: 0;
        color: #000;

        /* Body/Small */
        font-family: Poppins;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 18px;
        /* 150% */
        margin-left: 17%;
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

    .text {
        display: flex;
        width: 288px;
        padding: 8.913px 11.141px;
        align-items: center;
        gap: 5.57px;
        border-radius: 33.423px;
        border: 0.557px solid var(--Outline-Container, rgba(154, 168, 188, 0.20));
        background: var(--Background-Primary, #FFF);
        box-shadow: 0px 1.114px 4.456px 0px rgba(0, 0, 0, 0.04);
        margin-bottom: 4%;
        margin-right: -35%;
        color: var(--Background-Secondary-Inverse, #27313F);
        font-family: Poppins;
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }

    .text::placeholder {
        color: #9AA8BC;
        font-family: Poppins;
        font-size: 21px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
        margin: auto;
    }

    .text:focus {
        border: none;
        outline: none;
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
        margin-top: -3%;
        margin-left: -3%;
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
</style>