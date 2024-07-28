<script>
$(document).ready(function() {
    $('#save-short-btn').click(function(event) {
        var fileInput = $('#upload-short')[0].files.length;
        if (fileInput === 0) {
            Swal.fire({
                icon: "error",
                title: "Wait...",
                text: "The video file is required"
            });
            return false;
        } else {
            var file = $('#upload-short')[0].files[0];
            Swal.fire({
                title: "Uploading!",
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }
    });

    const $dropZone = $('#dropZone'),
        $uploadShort = $('#upload-short'),
        $shortVid = $('#short-video'),
        $shortUploadContainer = $('#short-upload-container'),
        $replaceBtn = $('#replace-btn'),
        $uploadShortVideo = $('#upload-short-video');

    function showVideo(file) {
        $shortUploadContainer.hide();
        $shortVid.show();
        $('#video-container').css({
            'background-color': 'hsl(var(--foreground-color))'
        });
        $replaceBtn.show();
        $('.svideo-container').css('padding', '0%');
        $shortVid.attr('src', URL.createObjectURL(file)).show();
    }

    function handleFileSelect(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $shortVid.attr('src', e.target.result);
                showVideo(file); // Display the video immediately
            };
            reader.readAsDataURL(file);
        }
    }
    $dropZone.on({
        dragover: (e) => {
            e.preventDefault();
            e.stopPropagation();
            $dropZone.addClass('dragover');
        },
        dragleave: (e) => {
            e.preventDefault();
            e.stopPropagation();
            $dropZone.removeClass('dragover');
        },
        drop: (e) => {
            e.preventDefault();
            e.stopPropagation();
            $dropZone.removeClass('dragover');
            const files = e.originalEvent.dataTransfer.files;
            console.log(files);

            if (files.length > 0) {
                handleFileSelect(files[0]);

                // Update hidden input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(files[0]);
                $uploadShort[0].files = dataTransfer.files;
                console.log(dataTransfer.files)
                $('#videoData').val(dataTransfer.files);
            }
        }
    });
    $uploadShortVideo.click(function(e) {
        e.preventDefault();
        $uploadShort.click();

    });
    $uploadShort.change(function(e) {
        e.preventDefault();
        handleFileSelect(this.files[0]);
    });


    var template = '';
    $('.quiz-icon').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#quiz-type-section').hide();
        $('#quiz-type-creation-section').removeClass('d-none').addClass('d-flex');
        $('#actions').show();
        formDataQuiz.append('type', id);
        switch (id) {
            case 1:
                template = `<?= $this->element('Quiz-create/choose-one-option') ?>`;
                break;
            case 2:
                template = `<?= $this->element('Quiz-create/choose-one-image') ?>`;
                break;
            case 3:
                template = `<?= $this->element('Quiz-create/order-the-words') ?>`;
                break;
            case 4:
                template = `<?= $this->element('Quiz-create/match') ?>`;
                break;
            case 5:
                template = `<?= $this->element('Quiz-create/carusel') ?>`;
                break;
            case 6:
                template = `<?= $this->element('Quiz-create/listen-order') ?>`;
                break;
            case 7:
                template = `<?= $this->element('Quiz-create/read-repeat') ?>`;
                break;
            case 8:
                template = `<?= $this->element('Quiz-create/conversation-speaking') ?>`;
                break;
            case 9:
                template = `<?= $this->element('Quiz-create/conversation-ordering') ?>`;
                break;
            default:
                template = '<p class="prg">Option non reconnue.</p>';
                break;
        }
        $('.prg').remove();
        $('#quiz-creation-container').append(template);

    });

    $('#cancel-quiz-create').on('click', function(e) {
        e.preventDefault();
        for (let index = 1; index < 10; index++) {
            $('#' + index).hide();
        }
        template = ``;
        $('#quiz-creation-container').html('');
        $('#quiz-type-section').show();
        $('#actions').hide();
        $('#quiz-type-creation-section').removeClass('d-flex').addClass('d-none');

    });

    $('#save-quiz-create').on('click', function(e) {
        e.preventDefault();
    });

});
</script>