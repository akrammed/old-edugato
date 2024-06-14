<style>
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

main {
    height: 100vh;
    overflow-y: scroll;
    scroll-snap-type: y mandatory;
    /* scroll-snap-type: y proximity; */
}

main>section {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fdf0f0;
    scroll-snap-align: start;
    scroll-snap-stop: always;
}

main>section:nth-child(odd) {
    background: #fdf0f0;
}

main>section>div {
    font-size: 80px;
    font-weight: 700;
    color: white;
}

.descshort {
    position: relative;
    top: 24%;
    text-align: left;
    color: white;
    font-size: 24px;

}

.short-quiz {
    position: absolute;
    bottom: 0px;
    left: 36%;
    height: 87%;
    width: 26%;
    border-radius: 10px 10px 0px 0px;
    padding: 10px;
    background-color: rgb(255, 255, 255);
    z-index: 5;
    transition: all 0.5s ease 0s;
}

.right-btn {
    position: absolute;
    top: 10px;
    right: 38%;
}

.left-btn {
    position: absolute;
    top: 10px;
    left: 30%;
}

.logo-short {
    position: fixed;
    top: 0;
        left: 0%;

    z-index: 999;
    padding: 10px;
}



.edugato-btn-light {
    background-color: #003F91 !important;
    color: white !important;
    border: 3px solid #003F91;
    font-size: 18px;
    margin: 5px;
    border-radius: 0px;
    height: 41px;
    width: 146px;
}

.edugato-btn-light:hover {
    cursor: pointer;
}



.footer-element {
    color: white;
}

.take-quiz {
    color: white;
    text-decoration: none;
    font-weight: 600;
}



.short-render {
    height: 750px;
    width: 32%;
    margin-top: -3%;
    margin-left: 35%;
    position: fixed;
    z-index: 999;

}

.buttons-container {
    position: fixed;
    top: 85%;
    left: 60%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 999;
}

.button1,
.button2 {
    border: none;
    height: 58px;
    width: 53px;
    background-color: transparent;
    color: white;
    margin: 18px;
    margin-top: -4%;
    margin-bottom: -14%;
    margin-left: 17%;
}


@media (max-width: 450px) {
    .short-render {
        height: 715px;
        width: 100%;
        margin-top: -2%;
        margin-left: 0%;
        position: fixed;
        z-index: 999;
    }

    .buttons-container {
        position: fixed;
        top: 85%;
        left: 78%;
        transform: translate(-50%, -50%);
        text-align: center;
        z-index: 999;
    }

    .logo-short {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
        padding: 10px;
    }


}
</style>

<main>

    <div class="short-video-render "></div>
    <?php 
foreach ($shortsList as $short):
?>


    <section id="section-<?= $short->id ?>" class="autoplay-section" style="position: relative;">
        <!-- Logo -->
        <div id="take-quiz-2"></div>
        <?= $this->Html->link(
            $this->Html->image('logo.png', ['style'=>'width: 100px ; margin: 2%;']),
            '/home',
            ['escape' => false, 'class' => 'logo-short']
        ) ?>

        <!-- Buttons -->
        <div class="buttons-container">


            <button class="button1">
                <a id="quiz-short-1" class="show-popup" data-popup="quiz-view-pop-up" href="#"><img width="60" height="60" src="https://img.icons8.com/officel/60/test-passed.png" alt="test-passed"/></a>
            </button>
        </div>
    </section>
    <?php 
    endforeach;
?>


</main>


<script>
$(document).ready(function() {
    var firstShortId;
    var ajaxSent = false;
    var shortId;
    firstShortId = $('section:first').attr('id').split('-')[1];
    console.log("First Short ID: " + firstShortId);
    debounceLog(firstShortId);

    $('main').scroll(function() {

        ajaxSent = false;

        var viewportTop = $('main').scrollTop();
        var viewportBottom = $('main').height();

        $('section').each(function() {
            var sectionTop = $(this).offset().top;
            var sectionBottom = sectionTop + $(this).outerHeight();
            var section = $(this).offset();
            if (sectionTop <= viewportTop && sectionBottom >= viewportBottom) {
                shortId = $(this).attr('id').split('-')[1];
                return false;
            }
        });


        debounceLog(shortId);
    });


    var timeout;

    function debounceLog(shortId) {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            $.ajax({
                url: "<?= $this->Url->build([
                            'plugin' => null,
                            'controller' => 'Shorts',
                            'action' => 'getShortAjax'
                        ]) ?>",
                type: 'POST',
                headers: {
                    'X-CSRF-Token': '<?= $this->request->getAttribute('csrfToken') ?>'
                },
                data: {
                    shortId: shortId
                },
                success: function(response) {
                    var short = JSON.stringify(response);
                    console.log('Quiz ID:', response.quiz_id);
                    var newTkaeQuiz =
                        '<h1 id="hidden-short-title" data-quiz-id="' + response.quiz_id + '"></h1>';
                        console.log('Response Quiz ID:', response.quiz_id);

                    var $takeQuiz2 = $('#take-quiz-2');

                    if ($takeQuiz2.length) {
                        $takeQuiz2.html(newTkaeQuiz);
                    } else {
                        console.error('take-quiz-2 div not found');
                    }

                    var currentUrl = window.location.href;
                    var regex =
                        /\/quiz-id=\d+/;
                    var updatedUrl = currentUrl.replace(regex,
                        '');
                    updatedUrl += '/quiz-id=' + response.quiz_id;
                    window.history.replaceState({
                        path: updatedUrl
                    }, '', updatedUrl);
                    console.log(response.id);
                    var videoElement =
                        '<video id="' + response.id + '"' +
                        ' class="short-render courseImage course-img img-fluid"' +
                        ' src="https://www.edugato.net/webroot/img/uploads/video/' +
                        response.video + '"' +
                        ' controls autoplay loop disablePictureInPicture controlslist="nodownload noplaybackrate"' +
                        '></video>';

                    $('.short-video-render').html('<div class="video-container">' +
                        videoElement + '</div>');




                },
                error: function(xhr, status, error) {
                    console.error('Error sending short ID via AJAX: ' + error);
                }

            });
        }, 150);
    }
});
</script>