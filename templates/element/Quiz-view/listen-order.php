
        <div class="container">
            <div class="row">
                <div class="content" style="margin-top: 4%;">
                    <div class="conversation">
                        <div class="avatar-container">
                            <?php echo $this->element('icons/avatar'); ?>
                            <?php echo $this->element('icons/talikng-bubbls'); ?>
                            <h2 class="avatar-question"><?= $questions[0]['question'] ?> </h2>
                        </div>
                    </div>
                </div>

                <div class="options">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="options">
                                    <div  style="display: grid;cursor:pointer;
    justify-content: center;" onclick="startRecording()">
                                        <button id="recordButton"
                                            class="record-btn-style"><?php echo $this->element('icons/start-record'); ?>
                                        </button>
                                    </div>
                                    <?php echo $this->element('icons/record-animation'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<style>
.record-btn-style {
    width: 70px;
    height: 70px;
    background-color: #5C17E5;
    border: none;
    border-radius: 16px;
    box-shadow: 0px 0px 10px gray;
}

.options {
    height: 200px;
    display: grid;
    align-items: center;
}
</style>