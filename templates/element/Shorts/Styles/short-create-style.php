<style>
.svideo-container {
    background-color: #ECEFF4;
    flex-shrink: 0;
    padding: 1rem;
}
.svideo-card {
    border: 2px dashed #728197;
    height: 100%;
    display: flex;
    padding: 1rem;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 0.5rem 0.5rem 0 0;
}

.quiz-section {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 4rem;
    flex-grow: 1;
}

.quiz-card {
    border-radius: 0.5rem;
    min-width: fit-content;
    display: flex;
    flex-direction: column;
    gap: 2rem;
    text-align: center;
    justify-content: center;
}

.upload-card {
    flex: 1;
    min-width: 180px;
    padding: 1rem;
    border-radius: 1rem;
    background-color: hsl(var(--muted-color));
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.upload-card__container {
    border-radius: 0.5rem;
    padding: 1rem;
    border: 2px dashed hsla(var(--foreground-color), 0.4);
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
}

.quiz-card-title {
    font-size: 14px;
    font-weight: 600;
    text-align: center;
}

.quiz-icon {
    cursor: pointer;
}

.custom-video-container {
    padding: 0%;
    padding-left: 0%;
    height: 625px;
    font-weight: 500;
}

.visually-hidden {
    position: absolute;
    left: -9999px;
    top: -9999px;
    width: 1px;
    height: 1px;
    overflow: hidden;
}

.shortVid {
    width: 100%;
    height: 100%;
    border-radius: 16px 0px 0px 16px;
    object-fit: cover;
}

.avatarText {
    border-radius: 2rem;
    color: #23344670;
    border: 1px solid #23344633;
    font-size: 22px;
    height: 52px;
    font-weight: 600;
    padding: 0 16px;
    width: 100%;
    text-align: center;
    font-size: 18px;
    font-weight: 500;
}

.avatarText:focus {
    color: #233446;
}

@media (min-width: 991.98px) {
    .svideo-card {
        border-radius: 0.5rem 0 0 0.5rem;
    }
}

@media (min-width: 1199.98px) {
    .svideo-card {
        border-radius: 0.5rem 0.5rem 0 0;
    }
}

@media (min-width: 1399.98px) {
    .svideo-card {
        border-radius: 0.5rem 0 0 0.5rem;
    }
    .quiz-section {
        gap: 2rem;
    }
}

</style>