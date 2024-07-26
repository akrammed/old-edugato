<?php for ($i = 0; $i < 3; $i++) { ?>
<div class="justify-content-between d-flex flex-column align-items-center" id="conversation<?=$i?>">
    <div class="d-flex align-items-center position-relative">
        <button class="position-absolute btn-reset" id="deleteConversation<?=$i?>"
            style="left: 0.5rem"><?= $this->element('icons/delete', ['color' => "red"]); ?></button>
        <input id="qustion<?= $i ?>" class="wordAudio send" required type="text"
            placeholder="type option 1 here..">
    </div>
    <div class="mt-2">
        <input id="response<?= $i ?>" class="wordAudio recive" required type="text"
            placeholder="type option 1 here..">
    </div>
</div>
<?php } ?>
<?= $this->Form->control('conversation', ['type' => 'hidden', 'class' => 'd-none', 'id' => 'conversationInput']) ?>
<?= $this->Form->control('quiz_type', ['type' => 'hidden','value' => '8','id' => 'quiz_type']) ?>
<style>
.send {
    background: #C0D3F9 !important;

}
.recive {
    background: #DEE4ED !important;
}
.browseBtn {
    padding: 10px;
    border-radius: 9.117px;
    background: #5C17E5;
    color: white;
    border: none;
    font-size: 16px;


}
.wordAudio {
    text-align: center;
    /* gap: 12px; */
    color: black;
    /* Label/Large */
    /* font-size: 16px; */
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    border-radius: 16px;
    border: 1px solid #9AA8BC;

    /* Elevation/Small */
    box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
}
</style>