<div class="">
    <div class="bg-gray200 p-3">
        <h3>Update video</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 p-3" style="background-color:#F9F9F9; height:100%;">
                <div class="mb-3">
                    <p style="font-weight:bold !important;"><strong>Course player details</strong></p>
                    <small>Set how this learning activity will show in the course player (title, short type description,
                        icon).</small>
                </div>
                <div class="mb-3">
                    <p style="font-weight:bold !important;"><strong>Choose video file</strong></p>
                    <small>You can either select a video from this course's video library (tab Video) or just add the
                        video's vimeo Id (if you have your own Vimeo.com account with all your videos).</small>
                </div>
                <br><br><br><br>

            </div>
            <div class="col-8 p-3">
                <form action="<?= $this->Url->build([
            'plugin'=> 'Lms',
            'controller' => 'Chapters',
            'action' => 'edit']) ?>" class="needId" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                    <div class="mb-3" style="margin-bottom:30px;">
                        <?= $this->Form->control('chapter', [
                            'class' => 'form-control',
                            'label' => __('Activity name'),
                            'id' => 'chapterTitle',
                            'type' => 'text',
                            'placeholder' => "Title"

                        ]);
                        ?>

                    </div>
                    <div class="mb-3" style="margin-bottom:30px;">
                    <label for="selectForVideo">Video</label>
                    <select name="vedio" id="selectForVideo" class="form-control">

                    </select>
                    </div>

                    <div id="" class="d-flex justify-content-start mt-3">
                        <button type="button" class="btn cntrl closePopUp"  id=""
                            style="height:30px !important;border-color: #DB5461 !important; margin-right:10px;">
                            Cancel
                        </button>
                        <?= $this->Form->button(__('Edit'),['id'=>'save','class'=>'btn  btn-primary','style'=>"height:30px !important;"]); ?>
                    </div>


                </form>
            </div>
        </div>

    </div>

</div>

