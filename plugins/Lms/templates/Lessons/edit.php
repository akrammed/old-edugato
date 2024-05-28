<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $lesson
 * @var string[]|\Cake\Collection\CollectionInterface $chapters
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
<?= $this->Form->create($lesson,['class'=>'webinar-form','id'=>'webinarForm']) ?>
<?= $this->Form->hidden('_csrfToken', ['value' => $this->request->getAttribute('csrfToken')]); ?>
<div class="webinar-progress d-block d-lg-flex align-items-center p-15 panel-shadow bg-white rounded-sm" style="margin-top:20px;">
            <div class="col-12 col-md-12 mt-15">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-15">
                            <?=   $this->Form->control('lesson',[
                                   'class'=>'form-control',
                                   'lable'=>__('Lesson'),
                                   'type'=>'text'

                            ]);
                            ?>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-15">
                        <?= $this->Form->control('course_id', [
                                    'label' => __('Course'),
                                    'options' => $courses,
                                    'empty' => true,
                                    'class' => 'form-control'
                                ]); ?>

                        </div>
                    </div>

                </div>

                <div class="form-group mt-15">
                    <label class="input-label"></label>
                    <?=   $this->Form->control('description',[
                                   'class'=>'form-control ',
                                   'lable'=>__('Description '),
                                   'type'=>'text'


                            ]);
                            ?>
                </div>
               <div class="card p-4">
                <div class="card-header" id="chapterRecords" >
                <table class="table" >
                            <thead>
                                <th>Id</th>
                                <th>Chapter</th>
                                <th>Video</th>
                                <th>Quizz Title</th>
                                <th>Actions</th>

                            </thead>
                            <tbody id="attribute-sets">
                                <?php
                                $id = 1;
                                    foreach($chapters as $chap) {
                                        ?>
                                            <tr>
                                                <td><?= $id; ?></td>
                                                <td><?= $chap->chapter; ?></td>
                                                <td><?= $chap->vedio; ?></td>
                                                <td><?= $chap->quizz_title; ?></td>

                                                <td><button type='button' data-id="<?=$chap->id?>" class="btn btn-sm btn-danger delete-btn">Remove</button></td>
                                            </tr>

                                        <?php
                                        $id++;
                                    }

                                ?>
                                <tr>

                                </tr>

                            </tbody>
                </table>
                </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-15">
                            <?=   $this->Form->control('chapter',[
                                   'class'=>'form-control',
                                   'lable'=>__('Chapter'),
                                   'type'=>'text',
                                   'id'=>'chapterName'

                            ]);
                            ?>

                        </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group mt-15">
                            <?= $this->Form->control('vedio', [
                                'class' => 'form-control',
                                'options' =>$vedios,
                                'type' => 'select',
                                'id' => 'video'

                            ]);
                            ?>


                </div>
                    </div>
                </div>
                <div class="form-group mt-15">
                            <?= $this->Form->control('quizz_title', [
                                'class' => 'form-control',
                                'lable' => __('Quizz Title'),
                                'type' => 'text',
                                'id'=>'quizz_title'

                            ]);
                            ?>

                </div>
                        <div class="form-group mt-15">
                            <?=   $this->Form->control('quizz',[
                                   'class'=>'form-control',
                                   'lable'=>__('Quizz'),
                                   'type'=>'text',
                                   'id'=>'quizz'

                            ]);
                            ?>


                        </div>



                    <div class="form-group mt-15">
                            <?=   $this->Form->control('description',[
                                   'class'=>'form-control ',
                                   'lable'=>__('Description'),
                                   'type'=>'text',
                                   'id'=>'chapterDescription'

                            ]);
                            ?>



                        </div>
                    <div class="form-group mt-15">
                            <?=   $this->Form->control('content',[
                                   'class'=>'form-control ',
                                   'lable'=>__('Content'),
                                   'type'=>'text',
                                   'id'=>'chapterContent'

                            ]);
                            ?>

                        </div>
                    </div>
                <div class="card-footer ">
                    <button type="button" class="btn btn-sm btn-primary add-row">Add</button>
                </div>

                <?=   $this->Form->control('json_data',[
                                   'class'=>'form-control',
                                   'type'=>'hidden',
                                   'id'=>'json-data'


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
<script>
  $(document).ready(function() {
    let setId = <?= $id++ ?>;
    const newSetsData = [];

    function createAttributeSet() {
        return {
            chapter: $("#chapterName").val(),
            video: $("#video").val(),
            quizz: $("#quizz").val(),
            chapterDescription: $("#chapterDescription").val(),
            chapterContent: $("#chapterContent").val(),
            quizz_title: $("#quizz_title").val(),
        };
    }

    function updateJsonData() {
        const setsData = newSetsData.slice();
        const existingSets = $('#attribute-sets .attribute-set').map(function() {
            return createAttributeSet.call($(this));
        }).get();
        setsData.push(...existingSets);

        const jsonData = JSON.stringify(setsData);
        $('#json-data').val(jsonData);
    }


    $('.add-row').click(function() {
        const newSet = createAttributeSet();
        newSetsData.push(newSet);
        $('#chapterRecords').css('display', 'block');
        const newSetHtml = `
        <tr class="attribute-set" data-set-id="${setId}">
                <td>${setId}</td>
                <td>${newSet.chapter}</td>
                <td>${newSet.video}</td>
                <td>${newSet.quizz_title}</td>

                <td><button type='button' class="btn btn-sm btn-danger remove-row" data-set-id="${setId}">Remove</button></td>
            </tr>
        `;
        $('#attribute-sets').append(newSetHtml);
        setId++;

        updateJsonData();
    });


    $('#attribute-sets').on('click', '.remove-row', function() {
        const setToRemoveId = $(this).data('set-id');
        $(`.attribute-set[data-set-id=${setToRemoveId}]`).remove();
        newSetsData.splice(setToRemoveId - 1, 1);


        $('#attribute-sets .attribute-set').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });

        updateJsonData();
    });
});

    $(document).ready(function() {
    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        var chapterId = $(this).data('id');
        var csrfToken = $('[name="_csrfToken"]').val();

        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(['controller' => 'Chapters', 'action' => 'delete']) ?>/' + chapterId,
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function(response) {
                alert("The chapter is delted seccessufly");


            },
            error: function(xhr, status, error) {
                var errorMessage = 'Error deleting chapter.';
                if (xhr.responseText) {
                    errorMessage += '\nDetails: ' + xhr.responseText;
                }

                alert(errorMessage);
            }
        });
    });
});

</script>
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
