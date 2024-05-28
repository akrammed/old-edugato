<div class="container">
    <div class="row">

        <h3 style="margin-left: 4%;">Record to answer</h3>
        <hr class="hr-style">
    </div>
    <div class="row">


        <div id="section-container-record" style="
    margin-left: 0%;
" class="section-container-class">

            <?= $this->Form->create(null,['id' => 'myForm-test-record','class'=>'needId2']) ?>
            <?= $this->Form->hidden('_csrfToken', ['value' => $this->request->getAttribute('csrfToken')]); ?>

            <section id="section-1-record">
                <?=  $this->Form->control('title',[
            'value'=> 'Exam',
            'class'=> 'title-input',
            'label'=> 'Enter Quiz Title',
            'id'=>'title-text-record',
            'style'=>'margin-left: 0%;
            width: 80%;'
        ]); ?>
                <br>
                <?=  $this->Form->control('description',[
            'value'=> 'Read carefully and answer the following questions. ',
            'class'=> 'desc-input',
            'label'=> 'Enter Quiz Description',
            'id'=> 'description-text-record',
            'style'=> 'margin-left: 1%;'
        ]); ?>
            </section>
            <section id="section-2-record">
                <?php
    echo  $this->Form->control('question',[
        'value'=> 'Add your Multiple Choice question here',
        'class'=> 'title-input-question',
        'label'=> 'Enter Quiz Question',
        'id'=> 'question-text-record',
        'style'=> 'margin-left: 0%;'
    ]);

  ?>
               
            </section>

            <button id="next-button-record" style="    height: 35px;
    border-radius: 0%;
    margin-left: 0% !important;" class="next-btn btn nav-btn  me-md-4 edugato-btn-bleu">Ready to start</button>
            <button id="prev-button-record" style="margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;" class="prev-btn btn nav-btn  me-md-4 edugato-btn-bleu">Prev</button>
            <?= $this->Form->button(__('Save'),[
        'id'=>'sub-test-text-record',
        'class'=>'btn nav-btn btn-primary edugato-btn ',
        'style'=>'margin-top: 6%;margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;'
    ]) ?>
            <?= $this->Form->end() ?>

        </div>


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