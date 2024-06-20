
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Side bar -->
            <?php echo $this->element('aside'); ?>
            <!-- Container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php echo $this->element('nav'); ?>

                <!-- Content -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
                        <div class="row">
                            <div class="col-md-9 w" style="min-height:619px!important; border-radius: 16px ">
                                <div class="card mb-3">
                                    <div class="row ">
                                        <div class="col-md-4" id="scrolledDiv">
                                        </div>
                                        <div class="col-md-8" id="main">
                                            <?php foreach ($shorts as $short): ?>
                                            <section class="hidden-section sec" id="section-<?= $short->id ?>">
                                                <div class="card-body h-100" id="take-quiz-2">
                                                    <div
                                                        class="conversation h-100 w-100 d-flex justify-content-center align-items-center">
                                                        <div
                                                            class="avatar-container d-flex flex-row align-items-center">
                                                            <?php echo $this->element('icons/avatar'); ?>
                                                            <?php echo $this->element('icons/talikng-bubbls'); ?>

                                                            <h2 class="avatar-question">Focus ! a quiz is coming !</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <?php endforeach; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card mb-3" style="min-height: 499px !important; border-radius: 16px; ">
                                    <div class="row g-0">

                                    </div>
                                </div>
                                <div class="d-block">
                                    <button class="mb-1" style="background-color: #F6F8FB; border:none;">
                                        <?php echo $this->element('icons/arrow-top'); ?>
                                    </button><br>
                                    <button style="background-color: #F6F8FB; border:none;">
                                        <?php echo $this->element('icons/arrow-down'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        var firstShortId = $('section:first').attr('id').split('-')[1];
        var ajaxSent = false;
        var shortId = firstShortId;

        console.log("First Short ID: " + firstShortId);
        debounceLog(firstShortId);
        $(`#section-${firstShortId}`).removeClass('hidden-section');

        $('#scContent').on('scroll', function() {
            var viewportTop = $(this).scrollTop();
            var viewportBottom = viewportTop + $(this).height();

            $('section').each(function() {
                var sectionTop = $(this).offset().top - $('#scContent').offset().top;
                var sectionBottom = sectionTop + $(this).outerHeight();

                if (sectionTop < viewportBottom && sectionBottom > viewportTop) {
                    shortId = $(this).attr('id').split('-')[1];
                    return false;
                }
            });

            if (shortId && !ajaxSent) {
                $('section').addClass('hidden-section');
                $(`#section-${shortId}`).removeClass('hidden-section');
                console.log("Short ID: " + shortId);
                debounceLog(shortId);
            }
        });

        $('#btn').click(function() {
            $('#scContent').scroll();
        });

        var timeout;

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
                            '<video style="border-radius: 10px 0px 0px 16px; width: 100%; height: 100%; object-fit: cover;"' +
                            ' id="' + response.id + '"' +
                            ' class="s courseImage course-img img-fluid"' +
                            ' src="https://www.edugato.net/img/uploads/video/' + response
                            .video + '"' +
                            ' controls autoplay loop disablePictureInPicture controlslist="nodownload noplaybackrate">' +
                            '</video>';


                        $('#scrolledDiv').html(
                            '<div class="video-container custom-video-container">' +
                            videoElement + '</div>');
                    },
                    error: function(xhr, status, error) {
                        ajaxSent = false;
                        console.error('Error sending short ID via AJAX: ' + error);
                    }
                });
            }, 150);
        }
    });
    </script>
    <style>
.hidden-section {
    display: none;
}

#scrolledDiv {
    scroll-behavior: smooth;
}

#scContent {
    overflow-y: scroll;
}

.sec {
    height: 619px;
}

.avatar-question {
    display: flex;
    width: 290px;
    padding: 16px 20px;
    align-items: center;
    border-radius: 60px;
    border: 1px solid var(--Outline-Container, rgba(154, 168, 188, 0.20));
    background: var(--Background-Primary, #FFF);
    box-shadow: 0px 2px 8px 0px rgba(0, 0, 0, 0.04);
    color: black !important;
    font-family: Poppins;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 18px;
}

.custom-video-container {
    padding: 0%;
    padding-left: 0%;
    height: 620px;
}
</style>