<?php dd($shorts) ?>
<div class="flex-grow-1 d-flex flex-column" id="scContent">
    <div class="flex-grow-1 d-flex flex-column flex-lg-row gap-4">
        <div class="flex-grow-1 card d-flex flex-col flex-lg-row overflow-hidden">
            <div class="d-flex align-items-center justify-content-center bg-foreground position-relative">
                <button id="scrollToBottom" class="z-3 btn btn-primary btn-icon position-absolute rounded-lg d-lg-none"
                    style="right: 1rem; top: 1rem; font-size: 1.25rem;"><i class="fa-solid fa-angle-down"></i></button>
                <div class="bg-foreground flex-grow-1"
                    style="aspect-ratio: 9 / 16; height: calc(100dvh - 102px - 2rem); width: fit-content; max-width: 500px;">
                    <video id="short-vid-display" class="w-100 h-100" style="object-fit: cover; object-position: center;" controls autoplay loop disablePictureInPicture controlslist="nodownload noplaybackrate" src="<?php echo $this->Url->build('/uploads/videos/' . $shorts[0]->video) ?>"></video>
                </div>
            </div>
            <section class="flex-grow-1 py-8 px-4" id="section">
                <div id="take-quiz-2" class="h-100 d-flex flex-column gap-4 justify-content-between align-items-center" style="min-height: 360px;">
                    <?= $this->element('Quiz-view/Elements/header') ?>
                    <div class="d-flex flex-column gap-6 justify-content-center align-items-center flex-grow-1 w-100">
                        <?= $this->element('Quiz-view/conversation-speaking') ?>
                    </div>
                </div>
            </section>
        </div>
        <div class="flex-shrink-0 d-flex flex-lg-column justify-content-center gap-1">
            <button id="btnScrollUp" class="btn-reset">
                <?php echo $this->element('icons/arrow-top'); ?>
            </button>
            <button id="btnScrollDown" class="btn-reset">
                <?php echo $this->element('icons/arrow-down'); ?>
            </button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        const shortsArray = <?= json_encode($shorts) ?>;
        console.log('shortsArray:', shortsArray);

        let currentIndex = 0;

        function updateVideo(index) {
            console.log('Updating to video index:', index);
            const videoElement = $('#short-vid-display');
            const newSrc = "<?php echo $this->Url->build('/uploads/video/') ?>" + shortsArray[index].video;
            console.log('New video source:', newSrc);
            videoElement.attr('src', newSrc);
            videoElement[0].load();
        }

        $('#arrow-top').on('click', function() {
            console.log('Up button clicked');
            if (currentIndex > 0) {
                currentIndex--;
                console.log('Up clicked, currentIndex:', currentIndex);
                updateVideo(currentIndex);
            } else {
                console.log('Up clicked, but already at the first video');
            }
        });

        $('#arrow-down').on('click', function() {
            if (currentIndex < shortsArray.length - 1) {
                currentIndex++;
                console.log('Down clicked, currentIndex:', currentIndex);
                updateVideo(currentIndex);
            } else {
                console.log('Down clicked, but already at the last video');
            }
        });

        $('#scrollToBottom').click(function() {
            $('html, body').animate({
                scrollTop: $('#section').offset().top
            }, 0);
        });

        function fetchQuiz(id) {
            $.ajax({
                url: '/shorts/getQuizAjax',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Quiz:', response.quiz);
                    console.log('Options:', response.options);
                    console.log('Questions:', response.questions);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching quiz:', error);
                }
            });
        }

        fetchQuiz(shortsArray[currentIndex].quiz_id);

    });
</script>