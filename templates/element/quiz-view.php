<iframe id="iframe" src="" style="width: 100%; height: 497px;" frameborder="0"></iframe>

<script>
$(document).ready(function() {
    function getLastNumberFromUrl() {
        var currentUrl = window.location.href;
        var regex = /\/quiz-id=\d+/;
        var match = currentUrl.match(regex);
        if (match) {
            return parseInt(match[0]);
        } else {
            return null;
        }
    }


    $(window).on('popstate', function() {
        var lastNumber = $('#hidden-short-title').attr('data-quiz-id');
        if (lastNumber !== null) {
            $('#iframe').attr('src', `https://www.edugato.net/quizs/view/${lastNumber}`);
        }

    });
});
</script>