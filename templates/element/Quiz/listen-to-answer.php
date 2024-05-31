<div class="container">
    <div class="row">

        <h3 style="margin-left: 4%;">Listen to answer</h3>
        <hr class="hr-style">
    </div>
    <div class="row">


        <div id="section-container-listen-to-answer" style="
    margin-left: 0%;
" class="section-container-class">

            <?= $this->Form->create(null,['id' => 'myForm-listen-to-answer','class'=>'needId2','type'=>'file']) ?>
            <?= $this->Form->hidden('_csrfToken', ['value' => $this->request->getAttribute('csrfToken')]); ?>

            <section id="section-1-listen-to-answer">
                <?=  $this->Form->control('title',[
            'value'=> 'Exam',
            'class'=> 'title-input',
            'label'=> 'Enter Quiz Title',
            'id'=>'title-listen-to-answer',
            'style'=>'margin-left: 0%;
            width: 80%;'
        ]); ?>
                <br>
                <?=  $this->Form->control('description',[
            'value'=> 'Read carefully and answer the following questions. ',
            'class'=> 'desc-input',
            'label'=> 'Enter Quiz Description',
            'id'=> 'description-listen-to-answer',
            'style'=> 'margin-left: 1%;'
        ]); ?>
            </section>
            <section id="section-2-listen-to-answer">
                <?php
    echo  $this->Form->control('question',[
        'type'=>'file',
        'class'=> 'title-input-question',
        'label'=> 'Enter Quiz Audio',
        'id'=> 'question-listen-to-answer',
        'style'=> 'margin-left: 0%;'
    ]);
    for ($i = 1; $i <= 4; $i++) {
        echo '<div class="row">
        <div class="col-sm-12">
        ';
      echo $this->Form->control('option_' . $i,[
        'value'=>'Option '. $i,
        'id'=>'option_'. $i.'-listen-to-answer',
        'class'=>'desc-input',
        'label'=>'',
        'for'=>'my-checkbox'. $i,
        'style'=>'margin-left: 0%;'
      ]);
      echo '</div></div>';


    }
  ?>
                <div id="conter-listen-to-answer">

                </div>
                <div class="option-container-listen-to-answer"></div>
                <button id="add-option-listen-to-answer" style="margin-left: 0%;
    height: 35px;
    border-radius: 0%;" class="custom-plus-btn  btn nav-btn  me-md-4 edugato-btn-bleu"> <span
                        class="custom-plus">+</span> Add Option</button>
                <input type="hidden" id="optionCount-listen-to-answer" value="10">
                <button id="remove-option-listen-to-answer" style="margin-left: 0%;
    height: 35px;
    border-radius: 0%;" class="custom-plus-btn  btn nav-btn  me-md-4 edugato-btn-bleu"> <span
                        class="custom-plus">-</span> Remove Option</button>
            </section>

            <button id="next-button-listen-to-answer" style="    height: 35px;
    border-radius: 0%;
    margin-left: 0% !important;" class="next-btn btn nav-btn  me-md-4 edugato-btn-bleu">Ready to start</button>
            <button id="prev-button-listen-to-answer" style="margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;" class="prev-btn btn nav-btn  me-md-4 edugato-btn-bleu">Prev</button>
            <?= $this->Form->button(__('Save'),[
        'id'=>'sub-listen-to-answer',
        'class'=>'btn nav-btn btn-primary edugato-btn ',
        'style'=>'margin-top: 6%;margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;'
    ]) ?>
            <?= $this->Form->end() ?>

        </div>


    </div>
</div>


<?php echo $this->element('Quiz/quiz-editor-style'); ?>
