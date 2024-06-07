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
                <button id="skip" class="skip-btn">Skip</button>
            </div>
            <div class="col-6 col-check">
                <button id="check" class="check-btn">Check</button>
                <button id="continue" class="check-btn continue-btn">continue</button>
            </div>
        </div>
    </div>
</div>