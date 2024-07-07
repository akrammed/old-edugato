<p class="question-text"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>

<div class="title">
    <?= $this->element('icons/avatar') ?>
    <?= $this->element('icons/talikng-bubbls') ?>
    <?=$this->Form->control('question',['class'=>"avatarText",'value'=>$text,'label'=>false])?>
</div>
<style>
    .avatarText {
        border-radius: 33.423px;
        border: 0.557px solid rgba(154, 168, 188, 0.20);
        background:  #FFF;
        box-shadow: 0px 1.114px 4.456px 0px rgba(0, 0, 0, 0.04);
        padding: 10px;
        width: 340px;
        color: #9AA8BC;
        font-family: "Poppins";
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }
    .avatarText:focus {
        color:  #9AA8BC;
        border: none;

    }
    .avatarText::placeholder {
        color:  #9AA8BC;

    }
</style>