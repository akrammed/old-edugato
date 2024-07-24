<div class="flex-grow-1 d-flex flex-column" id="scContent">
    <div class="flex-grow-1 d-flex flex-column flex-lg-row gap-4">
        <div class="flex-grow-1 card d-flex flex-col flex-lg-row overflow-hidden">
            <div class="d-flex align-items-center justify-content-center bg-foreground position-relative">
                <button id="scrollToBottom" class="z-3 btn btn-primary btn-icon position-absolute rounded-lg d-lg-none" style="right: 1rem; top: 1rem; font-size: 1.25rem;"><i class="fa-solid fa-angle-down"></i></button>
                <div class="bg-foreground flex-grow-1 overflow-hidden" id="scrolledDiv" style="max-width: 447.2px; aspect-ratio: 9 / 16; height: fit-content;"></div>
            </div>
            <section class="flex-grow-1 py-12 px-4 py-4" id="section">
                <div id="take-quiz-2" class="h-100 d-flex justify-content-center align-items-center" style="min-height: 360px;">
                    <div>
                        <p class="text-xl" style="transform: translateX(2.5rem);">Focus ! a quiz is coming !</p>
                        <div style="transform: translateX(-2.5rem); width: fit-content;"><?php echo $this->element('icons/avatar'); ?></div>
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
        const shortsArray = <?= json_encode($shortsList) ?>;
        console.log(shortsArray);
        var i = 0;
        var firstShortId = shortsArray[i];
        var ajaxSent = false;
        var lastScrollTop = 0;
        debounceLog(firstShortId);
        verifyI(i);
        $(document).keydown(function(event) {
            if (event.key === 'ArrowUp') {
                scroll("up");
            } else if (event.key === 'ArrowDown') {
                scroll("down");
            }
        });
        $('#btnScrollUp').click(function() {
            scroll("up");
        });
        $('#btnScrollDown').click(function() {
            scroll("down");
        });
        var timeout;
        function scroll(type) {
            if (type === "down") {
                i++;
                if (i < shortsArray.length) {
                    shortId = shortsArray[i];
                    debounceLog(shortId);
                    verifyI(i);
                }
            } else {
                i--;
                if (i < shortsArray.length) {
                    shortId = shortsArray[i];
                    debounceLog(shortId);
                    verifyI(i);
                }
            }
        }
        function debounceLog(shortId) {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                ajaxSent = true;
                $.ajax({
                    url: "<?= $this->Url->build(['plugin' => null, 'controller' => 'Shorts', 'action' => 'getShortAjax']); ?>",
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': '<?= $this->request->getAttribute('csrfToken') ?>'
                    },
                    data: {
                        shortId: shortId
                    },
                    success: function(response) {
                        ajaxSent = false;
                        var short = JSON.stringify(response);
                        console.log('Quiz ID:', response.quiz_id);

                        // var newTakeQuiz = '<h1 id="hidden-short-title" data-quiz-id="' + response.quiz_id + '"></h1>';
                        // $('#take-quiz-2').html(newTakeQuiz);

                        var currentUrl = window.location.href;
                        var regex = /\/quiz-id=\d+/;
                        var updatedUrl = currentUrl.replace(regex, '') + '/quiz-id=' +
                            response.quiz_id;
                        window.history.replaceState({
                            path: updatedUrl
                        }, '', updatedUrl);
                        var videoElement =
                            '<video style="width: 100%; height: 100%; object-fit: cover;"' +
                            ' id="' + response.id + '"' +
                            ' src="https://www.edugato.net/img/uploads/video/' + response
                            .video + '"' +
                            ' controls autoplay loop disablePictureInPicture controlslist="nodownload noplaybackrate">' +
                            '</video>';
                        $('#scrolledDiv').html(videoElement);
                    },
                    error: function(xhr, status, error) {
                        ajaxSent = false;
                        console.error('Error sending short ID via AJAX: ' + error);
                    }
                });
            }, 150);
        }
        function verifyI(i) {
            if (i == 0) {
                $('#btnScrollUp').prop('disabled', true);
            } else {
                $('#btnScrollUp').prop('disabled', false);
            }
            if (i == shortsArray.length - 1) {
                $('#btnScrollDown').prop('disabled', true);
            } else {
                $('#btnScrollDown').prop('disabled', false);
            }
        }
        $('#scrollToBottom').click(function() {
            $('html, body').animate({
                scrollTop: $('#section').offset().top
            }, 0);
        });
    });
</script>