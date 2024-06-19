<div class="row">

    <h3 tyle="margin-left: 5% !important;">Match</h3>
    <hr class="hr-style">


</div>
<div class="row">

    <div id="base-section-container-match" class="section-container-class" style="margin-left: 0% !important;">

        <?= $this->Form->create(null,['id' => 'myForm-test-match-base','class'=>'needId2']) ?>
        <?= $this->Form->hidden('_csrfToken', ['value' => $this->request->getAttribute('csrfToken')]); ?>

        <section id="base-section-1-match">
            <?=  $this->Form->control('title',[
            'value'=> 'Exam',
            'class'=> 'title-input',
            'label'=> 'Enter Quiz Title',
            'id'=>'base-title-match',
            'style'=>'margin-left: 0%;
            width: 80%;'
        ]); ?>
            <br>
            <?=  $this->Form->control('description',[
            'value'=> 'Read carefully and answer the following questions. ',
            'class'=> 'desc-input',
            'label'=> 'Enter Quiz Description',
            'id'=> 'base-description-match',
            'style'=> 'margin-left: 1%;'
        ]); ?>
        </section>
        <section id="base-section-2-match">
            <?php
    echo  $this->Form->control('question',[
        'value'=> 'Add your Multiple Choice question here',
        'class'=> 'title-input-question',
        'label'=> 'Enter Quiz Question',
        'id'=> 'base-question-match',
        'style'=> 'margin-left: 0%;'
    ]);

    ?>

            <?php $j = 1 ; for ($i = 1; $i <= 3; $i++): ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">

                        <?php echo $this->Form->control('option_' . $i, [
            'type' => 'text',
            'value' => 'Option ' . $i,
            'id' => 'base-option_' . $i . '-match',
            'class' => 'form-control',
             'label' => 'Item ' . $j ,
        ]); ?>

                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">

                        <?php echo $this->Form->control('question_' . $i+1, [
                    'type' => 'text',
                    'value' => 'Question ' . $i,
                    'id' => 'base-question_' . $i . '-match',
                    'class' => 'form-control',
                    'label' => 'Match item ' . $j ,
                ]); ?>
                    </div>
                </div>
            </div>
            <?php $j++;  endfor; ?>
         

        </section>

        <button id="base-next-button-match" style="margin-left: 0%;height: 41px;
    border-radius: 0%;" class="next-btn btn nav-btn  me-md-4 edugato-btn-bleu">Ready to
            start</button>
        <button id="base-prev-button-match" style="margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;" class="prev-btn btn nav-btn  me-md-4 edugato-btn-bleu">Prev</button>
        <?= $this->Form->button(__('Save'),[
        'id'=>'base-sub-test-text-match',
        'class'=>'btn nav-btn btn-primary edugato-btn',
        'style'=>'margin-top: 6%;
        margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;'
    ]) ?>
        <?= $this->Form->end() ?>

    </div>


</div>


<style>
.edugato-btn-bleu {
    background-color: white !important;
    color: #003F91 !important;
    border: 2px solid #003F91;
}

.edugato-btn-bleu:hover {
    background-color: #003F91 !important;
    color: white !important;
    border: 2px solid #003F91;
}

.section-container-class {
    margin: 0%;
    margin-top: 4%;
    padding: 5%;
    margin-left: 22%;
    background-color: white;
}



.title-input {
    font-size: 29px;
    border: none !important;
    border-bottom: 1px solid black !important;
    border-radius: 0px !important;
    text-align: center;
    margin: 0%;
    margin-left: 10%;

}

.title-input-question {
    font-size: 26px;
    border: none !important;
    border-bottom: 1px solid black !important;
    border-radius: 0px !important;
    text-align: center;
    margin: 0%;
    margin-left: -3%;
    width: 455px;

}

.desc-input {
    font-size: 16px !important;
    border: none !important;
    border-bottom: 1px solid black !important;
    border-radius: 0px !important;
    text-align: center;
    width: 344px;
    margin-left: 11%;
    margin-top: 5%;
    margin-bottom: 2%;

}

.desc-input:hover,
.title-input:hover {
    border: 1px dashed black !important;
    border-radius: 0px !important;
}

.prev-btn,
.next-btn {
    margin-top: 6%;
    margin-left: 32%;
    BACKGROUND-COLOR: #1f3b64;
    border-color: #1f3b64;
}

.prev-btn {
    margin-left: 26% !important;

}

.radiobox-circl {
    border: 1px solid black;
    width: 20px;
    display: block !important;
    height: 20px;
    margin-top: 59%;
    margin-left: -49%;
}

.radiobox-circl-option {
    border: 1px solid black;
    width: 20px;
    display: block !important;
    height: 19px;
    margin-top: 2%;
    margin-left: -4%;
    margin-bottom: -5%;
}

.custom-plus-btn {
    background-color: white;
    color: #1f3b64;
    border-color: #1f3b64;
    margin-left: 9%;
}
</style>