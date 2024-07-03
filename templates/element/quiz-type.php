<div class="row">
    <div class="col-sm">
        <h3>Chose quiz type</h3>
        <hr class="hr-style">
    </div>

</div>
<div class="container">
    <div class="col-sm">
        <div class="row custom-row">
            <div class="card-deck">
                <div class="card">
                    <h5 class="card-title custom-card-title text-center ">Text options</h5>
                    <div class="card-body">

                        <a href="#" id="text-option" data-quiz-type="textOptionType"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('text-option.svg', ['class'=>'card-img-top custom-img']) ?></a>
                    </div>
                </div>

                <div class="card">
                    <h5 class="card-title custom-card-title text-center">Fill in the blanks</h5>
                    <div class="card-body">
                        <a href="#" data-quiz-type="gapsTypeOption"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('blamk.svg', ['class'=>'card-img-top custom-img']) ?></a>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-title custom-card-title text-center">True / False</h5>
                    <div class="card-body">
                        <a href="#" data-quiz-type="trueFlaseOptionType"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('true-false.svg', ['class'=>'card-img-top custom-img']) ?></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row custom-row">
            <div class="card-deck">
                <div class="card">
                    <h5 class="card-title custom-card-title text-center">Image options</h5>
                    <div class="card-body">
                        <a href="#" id="image-option" data-quiz-type="imageOptionType"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('image-option.svg', ['class'=>'card-img-top custom-img']) ?></a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-title custom-card-title text-center">Match</h5>
                    <div class="card-body">
                        <a href="#" data-quiz-type="baseMatchTypeOption"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('match.svg', ['class'=>'card-img-top custom-img']) ?></a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-title custom-card-title text-center">Ordering</h5>
                    <div class="card-body">
                        <a href="#" data-quiz-type="orderTypeOption"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('ordering.svg', ['class'=>'card-img-top custom-img']) ?></a>
                    </div>
                </div>


            </div>
        </div>
        <div class="row custom-row">
            <div class="card-deck" >
                <div class="card">
                    <h5 class="card-title custom-card-title text-center">Talk to answer</h5>
                    <div class="card-body">
                        <a href="#" id="image-option" data-quiz-type="recordToAnswerType"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('audio.svg', ['class'=>'card-img-top custom-img']) ?></a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-title custom-card-title text-center">Listen to answer </h5>
                    <div class="card-body">
                        <a href="#" id="image-option" data-quiz-type="listenToAnswerTypeOption"
                            class="navbar-brand edugato-navbar-logo optionsType">
                            <?= $this->Html->image('audio.svg', ['class'=>'card-img-top custom-img']) ?></a>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.optionsType').click(function() {
        var id = $(this).attr('data-quiz-type');
        $(`#${id}`).css('display', 'block');
        var lessonId = $(`#lId`).val();
        $(`.needId2`).append(`<input type="hidden" name="lesson_id" value=${lessonId} >`);
        optiosScript[id]();
        $(`#QuizzeType`).css('display', 'none');
    })
});
</script>
<style>
.hr-style {
    background-color: black !important;
}

.custom-row {
    margin-bottom: 7%;
}

.custom-card-title {
    margin-top: 8%;
}

.custom-img {
    margin: -20%;
    margin-left: -5%;
    width: 80%;
}
</style>