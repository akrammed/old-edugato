<div class="row">

    <h3 style="margin-left: 5%;">Image Options</h3>
    <hr class="hr-style">


    <hr class="hr-style">
</div>

<div class="row">


    <div id="section-container-image" class="section-container-class-image" style="margin-left: 0% !important;">

        <?= $this->Form->create(null,['id' => 'myForm-test-image','type'=>'file','class'=>'needId2']) ?>
        <?= $this->Form->hidden('_csrfToken', ['value' => $this->request->getAttribute('csrfToken')]); ?>

        <section id="section-1-image">
            <?=  $this->Form->control('title',[
            'value'=> 'Exam',
            'class'=> 'title-input',
            'label'=> 'Enter Quiz Title',
            'id'=>'title-image',
            'style'=>'margin-left: 0%;
            width: 80%;'
        ]); ?>
            <br>
            <?=  $this->Form->control('description',[
            'value'=> 'Read carefully and answer the following questions. ',
            'class'=> 'desc-input',
            'label'=> 'Enter Quiz Description',
            'id'=> 'description-image',
            'style'=> 'margin-left: 1%;'
        ]); ?>
        </section>
        <section id="section-2-image">
            <?php
    echo  $this->Form->control('question',[
        'value'=> 'Add your Multiple Choice question here',
        'class'=> 'title-input-question',
        'label'=> 'Enter Quiz Question',
        'id'=> 'question-image',
        'style'=> 'margin-left: 0%;'
    ]);

    ?>
            <div class="row" style="margin-left: 2%;">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6" style="margin-bottom: -11%;"> <a href="#" id="plus-1"
                                style="font-size:30px">+</a></div>
                        <div class="col-sm-6" style="margin-left: -39%;"> <img id="show-icon-1" width="24"
                                style="margin-bottom: -20%;" height="24"
                                src="https://img.icons8.com/material-outlined/24/filled-trash.png" alt="filled-trash" />
                        </div>
                    </div>



                    <?= $this->Html->image('default-image.jpg', ['class'=>'image-option-style','style'=>'width: 164px;','alt' => 'textalternatif','id'=>'option-picture-1']) ?>

                    <?php
  echo $this->Form->control('option_1',[
    'id'=>'Option_1-image',
    'class'=>'image-option-style',
    'type'=>'file',
    'label'=>'',
    'hidden'=>true
  ]);
  ?>
                </div>
                <div class="col-sm-6">
                    <div id="imagePreview-2"></div>
                    <div class="row">
                        <div class="col-sm-6" style="margin-bottom: -11%;"> <a href="#" id="plus-2"
                                style="font-size:30px">+</a></div>
                        <div class="col-sm-6" style="margin-left: -39%;"> <img id="show-icon-2" width="24"
                                style="margin-bottom: -20%;" height="24"
                                src="https://img.icons8.com/material-outlined/24/filled-trash.png" alt="filled-trash" />
                        </div>
                    </div>
                    <?= $this->Html->image('default-image.jpg', ['class'=>'image-option-style','style'=>'width: 164px;','alt' => 'textalternatif','id'=>'option-picture-2']) ?>
                    <?php
  echo $this->Form->control('option_2',[
    'id'=>'Option_2-image',
    'class'=>'image-option-style',
    'type'=>'file',
    'label'=>'',
    'hidden'=>true
  ]);
  ?>
                </div>
            </div>
            <div class="row" style="margin-left: 2%;">
                <div class="col-sm-6">
                    <div id="imagePreview-3"></div>
                    <div class="row">
                        <div class="col-sm-6" style="margin-bottom: -11%;"> <a href="#" id="plus-3"
                                style="font-size:30px">+</a></div>
                        <div class="col-sm-6" style="margin-left: -39%;"> <img id="show-icon-3" width="24"
                                style="margin-bottom: -20%;" height="24"
                                src="https://img.icons8.com/material-outlined/24/filled-trash.png" alt="filled-trash" />
                        </div>
                    </div>
                    <?= $this->Html->image('default-image.jpg', ['class'=>'image-option-style','style'=>'width: 164px;','alt' => 'textalternatif','id'=>'option-picture-3']) ?>

                    <?php
  echo $this->Form->control('option_3',[
    'id'=>'Option_3-image',
    'class'=>'image-option-style',
    'type'=>'file',
    'label'=>'',
    'hidden'=>true
  ]);
  ?>
                </div>
                <div class="col-sm-6">
                    <div id="imagePreview-4"></div>
                    <div class="row">
                        <div class="col-sm-6" style="margin-bottom: -11%;"> <a href="#" id="plus-4"
                                style="font-size:30px">+</a></div>
                        <div class="col-sm-6" style="margin-left: -39%;"> <img id="show-icon-4" width="24"
                                style="margin-bottom: -20%;" height="24"
                                src="https://img.icons8.com/material-outlined/24/filled-trash.png" alt="filled-trash" />
                        </div>
                    </div>
                    <?= $this->Html->image('default-image.jpg', ['class'=>'image-option-style','style'=>'width: 164px;','alt' => 'textalternatif','id'=>'option-picture-4']) ?>
                    <?php
  echo $this->Form->control('option_4',[
    'id'=>'Option_4-image',
    'class'=>'image-option-style',
    'type'=>'file',
    'label'=>'',
    'hidden'=>true
  ]);
  ?>
                </div>






                <!-- <div id="options-container-image"></div>
                <button id="add-option-image" style="    margin-left: 0%;
    height: 35px;
    border-radius: 0%;" class="custom-plus-btn  btn nav-btn  me-md-4 edugato-btn-bleu"> <span
                        class="custom-plus">+</span> Add Option</button>
                <input type="hidden" id="optionCount-image" value="2">
                <button id="remove-option-image" style="margin-left: 0%;
    height: 35px;
    border-radius: 0%;" class="custom-plus-btn  btn nav-btn  me-md-4 edugato-btn-bleu"> <span
                        class="custom-plus">-</span> Remove Option</button> -->

        </section>

        <button id="next-button-image" style="margin-left: 0%;height: 41px;
    border-radius: 0%;" class="next-btn btn nav-btn  me-md-4 edugato-btn-bleu">Ready to
            start</button>
        <button id="prev-button-image" style="margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;" class="prev-btn btn nav-btn  me-md-4 edugato-btn-bleu">Prev</button>
        <?= $this->Form->button(__('Save'),[
        'id'=>'sub-test-image',
        'class'=>'btn nav-btn btn-primary edugato-btn',
        'style'=>'margin-top: 6%;
        margin-left: 0% !important;
        height: 35px;
        border-radius: 0%;'
    ]) ?>
        <?= $this->Form->end() ?>
    </div>

</div>

<script>

</script>

<style>
.image-option-style {
    margin-top: 13%;
    margin-bottom: 19%;
    height: 99px;
}

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



.section-container-class-image {
    margin: 0%;
    margin-top: 4%;
    padding: 5%;
    margin-left: 32%;
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
    margin-left: -5%;
    width: 455px;

}

.desc-input {
    font-size: 16px !important;
    border: none !important;
    border-bottom: 1px solid black !important;
    border-radius: 0px !important;
    text-align: center;
    width: 344px;
    margin-left: 10%;
    margin-top: 5%;
    margin-bottom: 2%;

}

.desc-input:hover,
.title-input:hover {
    border: 1px dashed black !important;
    border-radius: 0px !important;
}

.annuler-btn,
.prev-btn,
.next-btn {
    margin-top: 6%;
    margin-left: 31%;
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