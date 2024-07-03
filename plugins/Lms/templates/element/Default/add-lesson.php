
<div class="">
    <div class="bg-gray200 p-3">
        <h3>Section edit</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 p-3" style="background-color:#F9F9F9;">
                <div class="mb-3">
                    <p style="font-weight:bold !important;"><strong>Section title</strong></p>
                    <small>Keep it short, informative and interesting!</small>
                </div>
                <div class="mb-3">
                    <p style="font-weight:bold !important;"><strong>Section description</strong></p>
                    <small>
                        Provide a concise description for the section. Not all content templates present this
                        description, so you may select not to provide it. It depends on the template you have selected
                        for presenting your course contents.</small>
                </div>
                <div class="mb-3">
                    <p style="font-weight:bold !important;"><strong>Access</strong></p>
                    <small>
                        Set the accessibility of this section. Draft is the default mode (unpublished and invisible) for
                        having time to develop your contents.</small>
                </div>

            </div>
            <div class="col-8 p-3">
           <form action="/add-lesson" method="post" class="needId">
           <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                    <div class="mb-3" style="margin-bottom:30px;">
                    <?=   $this->Form->control('lesson',[
                                   'class'=>'form-control',
                                   'lable'=>__('Lesson'),
                                   'type'=>'text',
                                   'placeholder' => "Title"

                            ]);
                            ?>

                    </div>
                    <div class="mb-3">
                        <textarea type="text" rows="15" class="form-control" name="description" id="" aria-describedby="helpId"
                            placeholder="Description" ></textarea>
                    </div>
                    <div class="form-check mt-3 mb-3">
                        <input class="form-check-input" type="radio" name="is_paid" id="exampleRadios1" value="0"
                            checked>

                        <h6 class="form-check-label" for="exampleRadios1">
                            Free
                        </h6>
                        <small>The course will be accessible to all for free.</small>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="is_paid" id="exampleRadios2" value="1"
                            checked>
                        <h6 class="form-check-label" for="exampleRadios2">
                            Paid
                        </h6>

                        <small>The course will be available only to users who have purchased it.</small>
                    </div>
                    <div id="" class="d-flex justify-content-start">
                        <button type="button" class="btn cntrl" id=""
                            style="height:30px !important;border-color: #DB5461 !important; margin-right:10px;">
                            Cancel
                        </button>
                        <?= $this->Form->button(__('Add'),['id'=>'save','class'=>'btn  btn-primary','style'=>"height:30px !important;"]); ?>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>
