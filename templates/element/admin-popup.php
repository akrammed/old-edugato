<style>
#popupContainer {
    z-index: 9999999;
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black !important;
    background-color: white;
    width: 800px;
    height: 500px;
    overflow-y: auto;
    overflow-x: hidden;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.popup-shadow {
    box-shadow: 0 0 100px rgba(0, 0, 0, 0.5);
    border-radius: 0px !important;
}

::-webkit-scrollbar {
    width: 5px;
}


::-webkit-scrollbar-thumb {
    background: #DB5461;
}
</style>

<div id="popupContainer" class="messagepop pop popup-shadow">



    <div class="" id="add-course-pop-up" style="display:none;">
        <?php echo $this->element("Lms.Default/add-course"); ?>
    </div>
    <div class="" id="add-short-pop-up" style="display:none;">
        <?php echo $this->element("Lms.Default/add-short"); ?>
    </div>
    <div class="" id="add-lesson-pop-up" style="display:none;">
        <?php echo $this->element("Lms.Default/add-lesson"); ?>
    </div>
    <div class="" id="edit-lesson-popup" style="display:none;">
        <?php echo $this->element("Lms.Default/edit-lesson"); ?>
    </div>
    <div class="" id="add-activity-pop-up" style="display:none;">
        <?php echo $this->element("Lms.Default/add-activity"); ?>
    </div>
    <div class="" id="add-video-pop-up" style="display:none;">
        <?php echo $this->element("Lms.Default/add-video"); ?>
    </div>
    <div class="" id="import-activity-pop-up" style="display:none;">
        <?php echo $this->element("Lms.Default/import-activity"); ?>
    </div>
    <div class="" id="edit-course-pop-up" style="display:none;">
        <?php echo $this->element("Lms.Default/edit-course"); ?>
    </div>
    <div class="" id="text-option-pop-up" style="display:none;">
        <?php echo $this->element("Quiz/text-options"); ?>
    </div>

    <div class="" id="quiz-view-pop-up" style="display:none;">
        <?php echo $this->element("quiz-view"); ?>
    </div>

</div>
