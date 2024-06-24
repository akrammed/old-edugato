<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 * @var \Cake\Collection\CollectionInterface|string[] $quiztypes
 */
?>

<div class="container" id="quiz-type-section-1" style="width: 95%;">
    <h3 class="pb-1 mb-4 mt-4 text-dark fw-normal main-title">Add a quiz type</h3>
    <div class="row ">
        <div class="col-sm-4 mb-4 quiz-type-col">
            <?php echo $this->element('icons/text-option-icon'); ?>
        </div>
        <div class="col-sm-4 mb-4 quiz-type-col">
            <?php echo $this->element('icons/image-option-icon'); ?>
        </div>
        <div class="col-sm-4 mb-4 quiz-type-col ">
            <?php echo $this->element('icons/order-the-words-icon'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-4 quiz-type-col">
            <?php echo $this->element('icons/match-icon'); ?>
        </div>
        <div class="col-sm-4 mb-4 quiz-type-col">
            <?php echo $this->element('icons/carusel-icon'); ?>
        </div>
        <div class="col-sm-4 mb-4 quiz-type-col">
            <?php echo $this->element('icons/listen-order-icon'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-4 quiz-type-col">
            <?php echo $this->element('icons/read-repeat-icon'); ?>
        </div>
        <div class="col-sm-4 mb-4 quiz-type-col ">
            <?php echo $this->element('icons/conversation-speaking-icon'); ?>
        </div>
        <div class="col-sm-4 mb-4 quiz-type-col">
            <?php echo $this->element('icons/conversation-ordering-icon'); ?>
        </div>
    </div>

</div>

<style>
.quiz-card-type {
    box-shadow: none;
    background-color: #F6F8FB;
}

.quiz-card-title {
    font-size: 14px;
    font-weight: 600;
    text-align: center;
}

.quiz-icon {
    cursor: pointer;
}

.quiz-type-col {
    display: flex;
    justify-content: center;
}

.main-title {
    font-size: 18px;
    font-weight: 600 !important;
}
</style>