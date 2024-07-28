<div class="d-flex flex-column justify-content-center gap-8 w-100 max-w-xl flex-grow-1">
    <p class="text-xl">Let's have a conversation</p>
    <div class="d-flex flex-column gap-4 w-100 overflow-auto px-4 custom-scrollbar" style="max-height: 224px;">
        <?= $this->element('Quiz-view/Elements/chat-message'); ?>
        <?= $this->element('Quiz-view/Elements/chat-message' , ['dir' => 'r', 'avatar' => '../uploads/pictures/50955.jpg']); ?>
        <?= $this->element('Quiz-view/Elements/chat-message'); ?>
        <?= $this->element('Quiz-view/Elements/chat-message' , ['dir' => 'r', 'avatar' => '../uploads/pictures/50955.jpg']); ?>
        <?= $this->element('Quiz-view/Elements/chat-message'); ?>
    </div>
</div>
<div class="d-flex justify-content-between align-items-center gap-6 p-6 border shadow-md w-100 rounded-lg flex-shrink-0">
    <p class="color-primary text-base fw-semibold flex-shrink-0">Your Turn: </p>
    <p class="py-2 px-4 rounded-2xl bg-accent text-base border text-center">I'm just fine, thank you!</p>
    <button class="btn btn-primary p-0 flex-shrink-0" style="height: 3rem; width: 3rem;">
        <?= $this->element('icons/start-record', ['class' => 'h-6 w-6']); ?>
    </button>
</div>