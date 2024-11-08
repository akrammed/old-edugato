<div class="col">
    <div class="card overflow-hidden h-100 shadow-md" data-bs-toggle="modal" data-bs-target="#add-new-learningpath">
        <div class="d-flex flex-column h-100">
            <div class="w-100 d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                <?= $this->element('icons/add-new', ['class' => 'w-20 h-20']) ?> 
            </div>
            <span class="text-center text-base py-4">Card title</span>
        </div>
    </div>
</div>

<div class="modal fade" id="add-new-learningpath" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="width: 100%; max-width: 44rem;">
    <div class="modal-content overflow-hidden">
        <div class="d-flex flex-row h-100" style="min-height: 511px;">
            <div class="bg-light px-4 flex-1 w-50 d-flex align-items-center pt-16 pb-22">
                <div class="px-4 w-100">
                    <div class="card w-100 bg-background-alt overflow-hidden shadow-md">
                        <div class="d-flex flex-column">
                            <div id="pathname-image-container" class="d-flex align-items-center justify-content-center bg-background" style="height: 261px;">
                                <?= $this->element('icons/image-icon', ['class' => 'w-20 h-20']) ?> 
                            </div>
                            <div class="text-center text-base d-flex align-items-center p-4 text-center justify-content-center"><p id="path-name-title" class="h-10 d-flex align-items-center">Path Name</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->create(null, [
                'id' => 'add-learningpath-form',
                'class' => 'px-4 flex-1 w-50 d-flex flex-column',
                'url' => ['controller' => 'Learningpaths', 'action' => 'createLearningPathsAjax'],
                'type' => 'file',
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            ]) ?>
                <div class="h-16 d-flex align-items-center flex-shrink-0">
                    <p class="text-lg">Path Settings</p>
                </div>
                <div class="px-4 flex-1 d-flex align-items-center">
                    <div class="card w-100 bg-light overflow-hidden shadow-md" id="step1">
                        <div class="d-flex flex-column pb-4">
                            <div class="d-flex align-items-center justify-content-center p-4" id="learningpath-image-drop-zone">
                                <div class="flex-grow-1 d-flex flex-column align-items-center border-dashed rounded-lg p-4 pb-8">
                                    <?php echo $this->element('icons/drop-element'); ?>
                                    <p class="text-lg lh-1 mt-2">Drop Image here</p>
                                    <div class="divider divider--sm my-2">
                                        <span class="divider__line"></span>
                                        <span class="divider__text">OR</span>
                                        <span class="divider__line"></span>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm btn-sm--fix" id="upload-learningpath-image-btn">Browse</button>
                                    <?= $this->Form->control('picture', ['type' => 'file', 'class' => 'd-none', 'label' => false, 'id' => 'file-upload']) ?>
                                </div> 
                            </div>
                            <div class="px-4">
                                <?= $this->Form->control('path', [
                                    'type' => 'text',
                                    'class' => 'w-100 border text-base',
                                    'placeholder' => 'Enter path name...',
                                    'label' => false
                                ]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-none flex-column gap-8" id="step2">
                        <div class="d-flex flex-column gap-2">
                            <p class="text-lg">Visibility</p>
                            <div class="form-group mt-1">
                                <?= $this->Form->control('visibility', [
                                    'type' => 'radio',
                                    'options' => [
                                        '0' => 'Draft',
                                        '1' => 'Published'
                                    ],
                                    'class' => 'h-fit me-2',
                                    'label' => false,
                                    'legend' => false
                                ]); ?>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <p class="text-lg">Pricing</p>
                            <div class="form-group mt-1">
                                <?= $this->Form->control('is_free', [
                                    'type' => 'radio',
                                    'options' => [
                                        '1' => 'Free',
                                        '0' => 'Paid'
                                    ],
                                    'class' => 'h-fit me-2',
                                    'label' => false,
                                    'legend' => false
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-end gap-2 flex-shrink-0 h-20 mt-2">
                    <button type="button" id="cancel-btn" class="btn color-primary bg-primary/10" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="to-step2-btn" class="btn btn-primary">Next</button>
                    <button type="button" id="to-step1-btn" class="btn color-primary bg-primary/10 d-none">Previous</button>
                    <button type="submit" class="btn btn-primary d-none" id="save-btn">Save</button>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        let imageUploaded = false;
        let titleValue = '', visibilityChecked, pricingChecked;

        $("#to-step2-btn").click(function() {
            $("#step1").removeClass("d-flex").addClass("d-none");
            $("#step2").removeClass("d-none").addClass("d-flex");
            $("#to-step2-btn, #cancel-btn").removeClass("d-flex").addClass("d-none");
            $("#to-step1-btn, #save-btn").removeClass("d-none").addClass("d-flex");
            // checkSaveButtonState();
        });

        $("#to-step1-btn").click(function() {
            $("#step2").removeClass("d-flex").addClass("d-none");
            $("#step1").removeClass("d-none").addClass("d-flex");
            $("#to-step1-btn, #save-btn").removeClass("d-flex").addClass("d-none");
            $("#to-step2-btn, #cancel-btn").removeClass("d-none").addClass("d-flex");
        });

        $('#add-learningpath-form').on('submit', function(e) {
            e.preventDefault();
            if ($('#save-btn').prop('disabled')) {
                return;
            }

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Learning path created successfully!',
                            showConfirmButton: false,
                            timer: 1500,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        $('#add-new-learningpath').modal('hide');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to create learning path. Please try again.',
                            showConfirmButton: false,
                            timer: 1500,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'An error occurred. Please try again.',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                }
            });
        });

        function handleFileSelect(e) {
            e.preventDefault();
            let file;
            if (e.dataTransfer) {
                file = e.dataTransfer.files[0];
            } else if (e.target.files) {
                file = e.target.files[0];
            }
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#pathname-image-container').html(`<img src="${e.target.result}" alt="Uploaded image" style="width: 100%; height: 100%; object-fit: cover;">`);
                    imageUploaded = true;
                    checkNextButtonState();
                };
                reader.readAsDataURL(file);
            }
        }

        // Drag and drop
        const dropZone = document.getElementById('learningpath-image-drop-zone');
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
        dropZone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.style.background = '';
        });
        dropZone.addEventListener('drop', handleFileSelect);

        // File input change
        $('#upload-learningpath-image-btn').click(function() {
            $('#file-upload').click();
        });
        $('#file-upload').change(handleFileSelect);

        // Update inputes when they changes
        $('input[name="path"]').on('input', function() {
            titleValue = $(this).val();
            $('#path-name-title').text(!titleValue.trim() ? 'Path Name' : titleValue);
            checkNextButtonState();
        });

        $('input[name="visibility"]').on('change', function() {
            visibilityChecked = $(this).is(':checked');
            checkSaveButtonState();
        });

        $('input[name="is_free"]').on('change', function() {
            pricingChecked = $(this).is(':checked');
            checkSaveButtonState();
        });

        function checkNextButtonState() {
            if (imageUploaded && !!titleValue.trim()) {
                $('#to-step2-btn').prop('disabled', false);
            } else {
                $('#to-step2-btn').prop('disabled', true);
            }
        }

        function checkSaveButtonState() {
            $('#save-btn').prop('disabled', !(visibilityChecked && pricingChecked));
        }

        // Initial state
        $('#to-step2-btn').prop('disabled', true);
        $('#save-btn').prop('disabled', true);
});
</script>