<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $chapter
 */
?>
<style>
.tox .tox-promotion {
    display: none !important;
}
</style>
<div class="panel-content">
         <div class="">
<?= $this->Form->create($chapter,['class'=>'webinar-form','id'=>'webinarForm','enctype' => 'multipart/form-data']) ?>
<div class="webinar-progress d-block d-lg-flex align-items-center p-15 panel-shadow bg-white rounded-sm" style="margin-top:20px;">
            <div class="col-12 col-md-12 mt-15">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-15">
                            <?=   $this->Form->control('chapter',[
                                   'class'=>'form-control',
                                   'lable'=>__('Chapter'),
                                   'type'=>'text'

                            ]);
                            ?>

                        </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group mt-15">
                            <?= $this->Form->control('vedio', [
                                'class' => 'form-control',
                                'options' =>$vedios,
                                'type' => 'select'

                            ]);
                            ?>


                </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-6">
                        <div class="form-group mt-15">
                            <?=   $this->Form->control('quizz',[
                                   'class'=>'form-control',
                                   'lable'=>__('Quizz'),
                                   'type'=>'text'

                            ]);
                            ?>

                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group mt-15">
                        <?= $this->Form->control('lesson_id', [
                                    'label' => __('Lesson'),
                                    'options' => $lessons,
                                    'empty' => true,
                                    'class' => 'form-control'
                                ]); ?>

                        </div>
                        </div>
                    </div>

                    <div class="form-group mt-15">
                            <?=   $this->Form->control('description',[
                                   'class'=>'form-control ',
                                   'lable'=>__('Description'),
                                   'type'=>'text'

                            ]);
                            ?>

                        </div>
                    <div class="form-group mt-15">
                            <?=   $this->Form->control('content',[
                                   'class'=>'form-control ',
                                   'lable'=>__('Content'),
                                   'type'=>'text'

                            ]);
                            ?>

                        </div>









                <div
            class="create-webinar-footer d-flex flex-column flex-md-row align-items-center justify-content-between mt-20 pt-15 border-top">
            <div class="d-flex align-items-center">




            </div>

            <div class="mt-20 mt-md-0">

            <?= $this->Form->button(__('Save'),['id'=>'save','class'=>'btn btn-sm btn-primary']); ?>


            </div>



            </div>
        </div>
    </div>
<?= $this->Form->end(); ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '.editTesxt',
    plugins: 'textcolor colorpicker lists link image imagetools media table',
    toolbar: 'formatselect | bold italic underline strikethrough forecolor backcolor | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link image media table',
    menubar: 'file edit view insert format tools table help',
    toolbar_mode: 'floating'
  });
</script>
