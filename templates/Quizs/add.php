<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 * @var \Cake\Collection\CollectionInterface|string[] $quiztypes
 */
?>

<div class="container" id="quiz-type-section">
    <h3 class="pb-1 mb-4 mt-4 text-dark fw-normal main-title">Add a Quiz Type</h3>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="row ">
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/text-option-icon'); ?>
                </div>
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/image-option-icon'); ?>
                </div>
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/order-the-words-icon'); ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="row">
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/match-icon'); ?>
                </div>
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/carusel-icon'); ?>
                </div>
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/listen-order-icon'); ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="row">
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/read-repeat-icon'); ?>
                </div>
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/conversation-speaking-icon'); ?>
                </div>
                <div class="col-4 mb-4 quiz-type-col">
                    <?php echo $this->element('icons/conversation-ordering-icon'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="quiz-type-creation-section" style="display: none;">
    <div id="quiz-creation-container">
        <button class="upload-short-video" id="return">Retour</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.quiz-icon').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#quiz-type-section').hide();
            $('#quiz-type-creation-section').show();
            var template = '';
            switch (id) {
                case 1:
                    template = '<p class="prg">Vous avez sélectionné l\'option 1.</p>';
                    break;
                case 2:
                    template = '<p class="prg">Vous avez sélectionné l\'option 2.</p>';
                    break;
                case 3:
                    template = '<p class="prg">Vous avez sélectionné l\'option 3.</p>';
                    break;
                case 4:
                    template = '<p class="prg">Vous avez sélectionné l\'option 4.</p>';
                    break;
                case 5:
                    template = '<p class="prg">Vous avez sélectionné l\'option 5.</p>';
                    break;
                case 6:
                    template = '<p class="prg">Vous avez sélectionné l\'option 6.</p>';
                    break;
                case 7:
                    template = '<p class="prg">Vous avez sélectionné l\'option 7.</p>';
                    break;
                case 8:
                    template = '<p class="prg">Vous avez sélectionné l\'option 8.</p>';
                    break;
                case 9:
                    template = '<p class="prg">Vous avez sélectionné l\'option 9.</p>';
                    break;
                default:
                    template = '<p class="prg">Option non reconnue.</p>';
                    break;
            }
            $('.prg').remove();
            $('#quiz-creation-container').append(template);

        });
        $('#return').on('click', function(e) {
            e.preventDefault();
            $('#quiz-type-creation-section').hide();
            $('#quiz-type-section').show();
        });
    });
</script>
<style>
    .upload-short-video {
        background-color: #5C17E5;
        color: white;
        border: none;
        width: 108px;
        height: 39px;
        border-radius: 16px;
        margin-left: 6%;
    }

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
        margin-bottom: 0.9rem !important;
    }

    .main-title {
        font-size: 18px;
        font-weight: 600 !important;
    }
    #return {
        position: absolute;
        bottom: 20px;
        left: 20px;
    }

    #quiz-type-creation-section {
        position: relative;
        min-height: 200px;
    }
</style>