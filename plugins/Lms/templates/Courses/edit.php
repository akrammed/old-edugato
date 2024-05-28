<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $course
 * @var \Cake\Collection\CollectionInterface|string[] $lessons
 * @var \Cake\Collection\CollectionInterface|string[] $ratings
 * @var \Cake\Collection\CollectionInterface|string[] $levels
 */
?>
<style>
::file-selector-button {
  display: none;
}
.tox .tox-promotion {
    display: none !important;
}
</style>




<div class="panel-content">
    <div class="">

    <?= $this->Form->create($course, ['class' => 'webinar-form', 'id' => 'webinarForm','type'=>'file']) ?>





        <div class="webinar-progress d-block d-lg-flex align-items-center p-15 panel-shadow bg-white rounded-sm" style="margin-top:20px;">
            <div class="col-12 col-md-12 mt-15">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-15">
                            <?=   $this->Form->control('title',[
                                   'class'=>'form-control',
                                   'lable'=>__('Title'),
                                   'type'=>'text'

                            ]);
                            ?>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-15">
                        <label class="input-label"><?=  __('Background Picture') ?></label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text panel-file-manager" data-input="cover_image" data-preview="holder" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-arrow-up text-white">
                                        <line x1="12" y1="19" x2="12" y2="5"></line>
                                        <polyline points="5 12 12 5 19 12"></polyline>
                                    </svg>
                                </button>
                            </div>
                            <?= $this->Form->control('background_picture', ['id' => 'background_picture', 'class' => 'form-control','type'=>'file','label'=>false,'style'=>'width:100%;']); ?>
                        </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                    <div class="form-group mt-15">


                    <label class="input-label"><?=  __('Picture') ?></label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text panel-file-manager" data-input="cover_image" data-preview="holder" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-arrow-up text-white">
                                    <line x1="12" y1="19" x2="12" y2="5"></line>
                                    <polyline points="5 12 12 5 19 12"></polyline>
                                </svg>
                            </button>
                        </div>
                        <?= $this->Form->control('picture', ['id' => 'picture', 'class' => 'form-control','type'=>'file','label'=>false,'style'=>'width:100%;']); ?>
                    </div>
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                        <label class="input-label"></label>
                        <?=   $this->Form->control('exams_number',[
                                    'class'=>'form-control',
                                    'lable'=>__('Exams Number '),
                                    'type'=>'number'


                                ]);
                                ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                    <?=   $this->Form->control('category_id',[
                                    'class'=>'form-control',
                                    'lable'=>__('Category'),
                                    'options' => $categories,
                                    'empty' => true,


                                        ]);
                                ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?=   $this->Form->control('level_id',[
                                        'class'=>'form-control',
                                        'lable'=>__('Level'),
                                        'options' => $levels,
                                        'empty' => true,



                                            ]);
                                    ?>
                                    </div>
                                </div>
                </div>









                <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                    <?=   $this->Form->control('video_time',[
                                    'class'=>'form-control',
                                    'lable'=>__('Vedio Time '),
                                    'type'=>'number'


                                        ]);
                                ?>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="form-group ">
                                        <?=   $this->Form->control('study_time',[
                                        'class'=>'form-control',
                                        'lable'=>__('Study Time'),
                                        'type'=>'number'


                                                ]);
                                        ?>
                                    </div>
                                </div>
                </div>


                    <div class="form-group mt-15">
                        <label for="">Description</label>
                                        <?=   $this->Form->textarea('description',[
                                        'class'=>'form-control',
                                        'lable'=>__('Description'),
                                        'rows' => '20'



                                            ]);
                                    ?>
                    </div>
                    <div class="form-group mt-15">
                    <label for="">Content</label>
                                        <?=   $this->Form->textarea('content',[
                                        'class'=>'form-control',
                                        'lable'=>__('Content'),
                                        'rows' => '20',
                                        'value'=>'.'
                                            ]);
                                    ?>
                    </div>






                <div
                    class="create-webinar-footer d-flex flex-column flex-md-row align-items-center justify-content-between mt-20 pt-15 border-top">
                    <div class="d-flex align-items-center">

                    </div>
                        <div class="mt-20 mt-md-0">

                        <?= $this->Form->button(__('Save'), ['id' => 'save', 'class' => 'btn btn-sm btn-primary', 'type' => 'submit']); ?>



                        </div>


                </div>

            </div>
        </div>









    </div>
    <?= $this->Form->end(['id' => 'webinarForm']); ?>
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
