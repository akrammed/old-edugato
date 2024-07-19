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
                    template = `<?=  $this->element('Quiz-view/choose-one-option')?>`;
                    break;
                case 2:
                    template = `<?=  $this->element('Quiz-view/choose-one-image')?>`;
                    break;
                case 3:
                    template = `<?=  $this->element('Quiz-view/order-the-words')?>`;
                    break;
                case 4:
                    template = `<?=  $this->element('Quiz-view/match')?>`;
                    break;
                case 5:
                    template = `<?=  $this->element('Quiz-view/carusel')?>`;
                    break;
                case 6:
                    template = `<?=  $this->element('Quiz-view/listen-order')?>`;
                    break;
                case 7:
                    template = `<?=  $this->element('Quiz-view/read-repeat')?>`;
                    break;
                case 8:
                    template = `<?=  $this->element('Quiz-view/conversation-speaking')?>`;
                    break;
                case 9:
                    template = `<?=  $this->element('Quiz-view/conversation-ordering')?>`;
                    break;
                default:
                    template = '<p class="prg">Option non reconnue.</p>';
                    break;
            }
            $('.prg').remove();
            $('#quiz-creation-container').append(template);

        });
    
        $('#cancel-quiz-create').on('click',function(e){
                e.preventDefault();
                console.log(1)
                for (let index = 1; index < 9; index++) {
                    $('#'+index).hide();
                }
                $('#quiz-type-section').show();

        })
    
    });
</script>
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
        margin-bottom: 0.9rem !important;
    }

    .main-title {
        font-size: 18px;
        font-weight: 600 !important;
    }
    #quiz-type-creation-section {
        position: relative;
        min-height: 200px;
    }
</style>