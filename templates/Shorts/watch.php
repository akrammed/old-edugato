<div class="layout-wrapper layout-content-navbar" id="main">
    <div class="layout-container">
        <!-- Side bar -->
        <?php echo $this->element('aside'); ?>
        <!-- Container -->
        <div class="layout-page">
            <!-- Navbar I-->
            <?php echo $this->element('nav'); ?>

            <!-- Content -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 mt-3 content-container" id="scContent">
                    <div class="row">
                        <div class="col-md-10 w" style="min-height:619px!important; border-radius: 16px ">
                            <div class="card mb-3">
                                <div class="row ">
                                    <div class="col-md-4" id="scrolledDiv">
                                    </div>
                                    <div class="col-md-8">
                                        <section class="sec" id="section">
                                            <div class="card-body h-100" id="take-quiz-2">
                                                <div class="conversation h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <div class="avatar-container d-flex flex-row align-items-center">
                                                        <?php echo $this->element('icons/avatar'); ?>
                                                        <?php echo $this->element('icons/talikng-bubbls'); ?>

                                                        <h2 class="avatar-question">Focus ! a quiz is coming !</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card mb-3" style="min-height: 499px !important; border-radius: 16px; ">
                                <div class="row g-0">

                                </div>
                            </div>
                            <div class="d-block">
                                <button id="btnScrollUp" class="mb-1" style="background-color: #F6F8FB; border:none;">
                                    <?php echo $this->element('icons/arrow-top'); ?>
                                </button><br>
                                <button id="btnScrollDown" style="background-color: #F6F8FB; border:none;">
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
    });
</script>
<style>
    #main {

        overflow: hidden;
        /* Prevents scrolling in both directions */

    }

    .hidden-section {
        display: none;
    }

    #scrolledDiv {
        scroll-behavior: smooth;
    }

    #scrolledDiv {
        overflow-y: scroll;
        scrollbar-width: none;
        overflow: hidden;
    }

    #scrolledDiv::-webkit-scrollbar {
        display: none;
        /* Hide scrollbar for Chrome, Safari, and Opera */
    }

    .sec {
        height: 619px;
    }

    .avatar-question {
        display: flex;
        width: 245px;
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
        height: 625px;
    }
</style>