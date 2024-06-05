<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="wrong-alert">
                    <?php echo $this->element('icons/wrong'); ?>
                    <h3 class="correct-title correct-icon-btn">
                        correct answer : <br> <span class="wrong-answer-2"></span></h3>
                </div>
                <div class="correct-alert">
                    <?php echo $this->element('icons/correct'); ?>
                    <h3 class="correct-title correct-icon-btn">
                        That's correct !</h3>
                </div>

                <button id="skip" class="btn-skip skip-event">Skip</button>
            </div>

            <div class="col-6"><button id="check" class="btn-next next">Check</button><button id="continue"
                    class="btn-next next">continue</button></div>
        </div>
    </div>
</div>

