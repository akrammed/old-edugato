<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-6 col-skip">
                <div class="wrong-alert answer-alert">
                    <?php echo $this->element('icons/wrong'); ?>
                    <h3 class="wrong-title correct-icon-btn">
                        That was not correct !</h3>
                </div>
                <div class="correct-alert answer-alert">
                    <?php echo $this->element('icons/correct'); ?>
                    <h3 class="correct-title correct-icon-btn">
                        That's correct !</h3>
                </div>
            </div>
            <div class="col-6 col-check">
            </div>
        </div>
    </div>
</div>