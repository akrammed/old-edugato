<style>
.navbar-container {
    display: flex;
    align-items: center;
    width: 100%;
}

.left-navbar {
    width: 30% !important;
}

.right-navbar {
    width: 60% !important;
    margin-left: 2%;
}

.video-container {
    position: relative;
    width: 75%;
    margin: auto;
}

.custom-video {
    width: 100%;
    height: auto;
    border-radius: 2%;
}

.progress-bar2 {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background-color: #E3E5EA;
    top: -13%;
    z-index: 1;
}

.play-icon {
    cursor: pointer;
    position: relative;
    bottom: 0;
    left: 45%;
    top: -11%;
    z-index: 1;
}

.full-icon {
    cursor: pointer;
    position: relative;
    bottom: 0;
    left: 81%;
    top: -11%;
    z-index: 1;
}

.setting-icon {
    cursor: pointer;
    position: relative;
    bottom: 0;
    left: 71%;
    top: -11%;
    z-index: 1;
}

.p-icon {
    cursor: pointer;
    position: relative;
    bottom: 0;
    left: 45%;
    top: -11%;
    z-index: 1;
}

.n-icon {
    cursor: pointer;
    position: relative;
    bottom: 0;
    left: 45%;
    top: -11%;
    z-index: 1;
}

.progress-2 {
    height: 100%;
    background-color: #5C17E5;
    /* Color of the progress */
    width: 0;
    /* Start with 0 width */
}

.custom-btn {
    background-color: #F6F8FB;
    border-color: #F6F8FB;
    box-shadow: none;
    color: #5C17E5;
}

.custom-menu-item {
    width: 90% !important;
    background-color: #EAF3FF !important;
    margin-left: 5% !important;
    border-radius: 5%;
}

.progress-bar {
    background-color: #5C17E5 !important;
    color: #fff;
    box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
}

.app-brand .layout-menu-toggle {
    background-color: #5C17E5;
    border: 7px solid #f5f5f9;
}

.circle {
    border: 3px solid #27313F;
    border-radius: 200px;
    font-size: 10px;
    padding: 1%;
    padding-left: 5px;
    padding-right: 6px;
    color: #27313F;
    margin-top: 7%;
    margin-left: -9%;
    width: 20px;
}

.activities-count {
    font-size: 11px;
    color: #6a6a6a;
}

.chapter-element {
    background-color: #F6F8FB;
    color:#27313F !important;
}
.custom-course-progress{
width: 266px;margin-left: -43%;
}
.menu-link:hover {
    background-color: #ECEFF4 !important;
}

.menu-link:focus {
    background-color: #DBE3FC !important;
}

.menu-link.active {
    background-color: #DBE3FC !important;
}

.card-title {
    font-weight: 700;
    color:#27313F;
    text-align: center;
    font-size: 23px;
}

.video {
    margin-left: 13%;
    flex-grow: 1;
    width: 79%;
    border-radius: 3%;
}

#prev:hover,
#next:hover {
    color: #5C17E5 !important;
}

.navbar-detached {
    box-shadow: none !important;
}
.card {
    background-clip: padding-box;
    box-shadow: none !important;
}

.navbar-title-course {
    font-weight: 700;
    color:#27313F !important;
    font-size: 22px;
}

.custom-quiz-iframe {
    height: 450px;
    margin-top: 0%;
    margin-left: 13%;
    width: 74%;
    border-radius: 31px
}

@media (max-width: 1200px) {

.custom-quiz-iframe {
    height:     450px !important;
    margin-top: 0%;
    margin-left: 13%;
    width: 74%;
    border-radius: 31px
}
}

@media (max-width: 500px) {
    .video-container {
        position: relative;
        width: 97%;
        margin: auto;
    }
    .custom-course-progress{
width: 266px;margin-left: -35%;
}

    .custom-height {
        height: 191px;

    }

    .navbar-title-course {
        font-weight: 700;
        color:#27313F !important;
        font-size: 17px;
    }

    .custom-display {
        display: none;
    }

    .custom-margin {
        margin-left: 24%;
    }

    .subtitle {
        font-size: 10px;
    }


    .card-title {
        font-weight: 700;
        color:#27313F;
        text-align: center;
        font-size: 14px;
    }

    .progress-bar2 {
        margin-top: -13%;
    }

    .n-icon {
        left: 36%;
    }

    .play-icon {
        left: 37%;
    }


    .p-icon {

        left: 38%;
    }

    .full-icon {
        left: 64%;
    }

    .setting-icon {
        left: 45%;
    }

    .custom-quiz-iframe {
        height: 496px;
        margin-top: -3%;
        margin-left: 2%;
        width: 97%;
        border-radius: 31px
    }
}

</style>