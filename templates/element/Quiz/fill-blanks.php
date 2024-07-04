<div id="section-container" class="section-container-class">
    <?= $this->Form->create($quiz) ?>

    <section id="section-1">
        <?=  $this->Form->control('title',[
            'value'=> 'Exam',
            'class'=> 'title-input',
            'label'=> 'Enter Quiz Title'
        ]); ?>
        <br>
        <?=  $this->Form->control('description',[
            'value'=> 'Read carefully and answer the following questions. ',
            'class'=> 'desc-input',
            'label'=> 'Enter Quiz Description'
        ]); ?>
    </section>
    <section id="section-2">
        <h2>Section 2: Question & Options</h2>
        <?php
                    echo $this->Form->control('question');
                    echo $this->Form->control('option_1');
                    echo $this->Form->control('option_2');
                    echo $this->Form->control('option_3');
                    echo $this->Form->control('option_4');
                    echo $this->Form->control('option_5');
                    echo $this->Form->control('option_6');
                    echo $this->Form->control('option_7');
                    echo $this->Form->control('option_8');
                ?>
        <div id="options-container">
        </div>
        <button id="add-option">Add Option</button>
    </section>
    <button id="next-button" class="next-btn">Ready to start</button>
    <button id="prev-button">Prev</button>
    <?= $this->Form->button(__('Submit'),[
        'id'=>'sub-btn'
    ]) ?>
    <?= $this->Form->end() ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var optionCount = 1;
    $("#section-2").hide();
    $("#prev-button").hide();
    $("#sub-btn").hide();

    $("#next-button").click(function() {
        event.preventDefault();
        $("#section-1").hide();
        $("#section-2").show();
        $("#prev-button").show();
        $("#next-button").hide();
        $("#sub-btn").show();
    });

    $("#prev-button").click(function() {
        event.preventDefault();
        $("#section-2").hide();
        $("#section-1").show();
        $("#prev-button").hide();
        $("#next-button").show();
        $("#sub-btn").hide();
    })

    $("#add-option").click(function() {

    });
});
</script>

<style>
.section-container-class {
    margin: 27%;
    margin-top: 12%;
    padding: 5%;
    border: 1px solid;
}
.desc-input,
.title-input {
    font-size: 33px;
    border: none !important;
    border-bottom: 1px solid black !important;
    border-radius: 0px !important;
    text-align: center;
}
.desc-input{
    font-size: 15px !important; 
}
.desc-input:hover,
.title-input:hover {
    border: 1px dashed black !important;
    border-radius: 0px !important;
}

.next-btn{
    margin-top: 6%;
    margin-left: 27%;
    BACKGROUND-COLOR: #1f3b64;
    border-color:#1f3b64;
}
</style>