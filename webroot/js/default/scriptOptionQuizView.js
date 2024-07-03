
    
    
    let timerInterval;
    var attempts = 0;
    var count = 0;
    var timer;
    var checkedOptionIds = [];
    var trueChecked = [];
    var falseChecked = [];
   
    


    Swal.fire({
        title: "Welcome !",
        html: "The quiz will start soon",
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false, // Hide the OK button
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
        }
    });

    $("#section-2").hide();
    $("#section-3").hide();
    $("#prev-button").hide();
    $("#remove-option").hide();
    $("#correct-input").hide();

    $("#next-button").click(function () {
        event.preventDefault();
        $("#section-1").hide();
        $("#section-2").show();
        $("#prev-button").show();
        $("#next-button").hide();
        $("#save-text-try").show();
        $("#correct-input").show();

        timer = setInterval(function () {
            count++;
        }, 200000);
    });

    $("#prev-button").click(function () {
        event.preventDefault();
        $("#section-2").hide();
        $("#section-1").show();
        $("#prev-button").hide();
        $("#next-button").show();
        $("#save-text-try").hide();
        $("#correct-input").hide();
    })

    $('#retake').click(function (event) {
        event.preventDefault();
        $("#section-3").hide();
        $("#section-2").show();
        $("#prev-button").show();
        $("#next-button").hide();
        $("#save-text-try").show();
        $('input[type="checkbox"][name="option"]').prop('checked', false);
        $('[id^="false_"]').prop('checked', false);
        $('[id^=Option-]').css('border', 'none');
        $('[id^="true_"]').prop('checked', false);
        $('[id^="input-"]').val(1);
        checkedOptionIds = [];
        trueChecked = [];
        falseChecked = [];
        clearInterval(timer);
        timer = setInterval(function () {
            count++;
        }, 200000);
    });


    function getCorrectOptions(option, correctOptions) {
        if ($.inArray(option.id, correctOptions) !== -1) {
            $('#' + option.id).addClass('correct-option');
        }
    }

    function arraysAreEqual(arr1, arr2) {
        if (arr1.length !== arr2.length) {
            return false;
        }
        console.log(arr1,arr2);
        arr1.sort();
        arr2.sort();
        for (var i = 0; i < arr1.length; i++) {
            if (arr1[i] !== arr2[i]) {
                return false;
            }
        }
        return true;
    }

    function showFeedback(correctAnswers, total, timeSpent, attempts) {

        var currentDate = new Date();

        var day = currentDate.getDate();
        var month = currentDate.getMonth() + 1;
        var year = currentDate.getFullYear();
        var newOption = '<ul>' +
            '<li class="feedback-element" > <span>Correct answers:</span> <span class="content-feedback" > ' + correctAnswers + ' / ' + total +
            '</span> </li>' +
            '<li class="feedback-element" ><span>Time spent:</span><span class="content-feedback" > ' + timeSpent + '</span></li>' +
            ' <li class="feedback-element" ><span>Date submitted:</span><span class="content-feedback" >' + day + '/' + month + '/' + year +
            '</span></li>' +
            '<li class="feedback-element" ><span>Attempt#:</span><span class="content-feedback" >' + attempts + '</li>' +
            '</span></ul>';

        $("#feedbackresult").empty().append(newOption);
    }

    function showNext() {
        $("#section-2").hide();
        $("#section-3").show();
        $("#prev-button").hide();
        $("#next-button").hide();
        $("#retry").show();
    }

    function formatTime(seconds) {
        // Calculate hours, minutes, and remaining seconds
        var hours = Math.floor(seconds / 3600);
        var minutes = Math.floor((seconds % 3600) / 60);
        var remainingSeconds = seconds % 60;

        // Add leading zeros if necessary
        var formattedHours = hours < 10 ? "0" + hours : hours;
        var formattedMinutes = minutes < 10 ? "0" + minutes : minutes;
        var formattedSeconds = remainingSeconds < 10 ? "0" + remainingSeconds : remainingSeconds;

        // Return the formatted time as a string
        return formattedHours + ":" + formattedMinutes + ":" + formattedSeconds;
    }


   



    

    $('input[type="checkbox"][name="option"]').change(function () {
        var selectedId = $(this).attr('id');
        console.log(selectedId);
        if ($(this).is(':checked')) {
            checkedOptionIds.push(selectedId);
        } else {
            var index = checkedOptionIds.indexOf(selectedId);
            if (index !== -1) {
                checkedOptionIds.splice(index, 1);
            }
        }
    });


  

    
    $('[id^="true_"]').click(function() {

        var questionId = $(this).attr('id');
        if ($(this).is(':checked')) {
            trueChecked.push(questionId);
            questionId = questionId.replace('true_', 'false_')
            console.log(questionId)
            var index = falseChecked.indexOf(questionId);
            if (index !== -1) {
                falseChecked.splice(index, 1);
            }
        }

    });

    $('[id^="false_"]').click(function() {
        var questionId = $(this).attr('id');
        if ($(this).is(':checked')) {
            falseChecked.push(questionId);
            questionId = questionId.replace('false_', 'true_')
            var index = trueChecked.indexOf(questionId);
            if (index !== -1) {
                trueChecked.splice(index, 1);
            }
        }

    });

    function correctAlert(total){
        Swal.fire({
            title: "Good job !",
            text: "That was the correct answer",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "OK",
        }).then(() => {
            showFeedback(total, total, formatTime(timer), attempts);
            
        });

    }

    function wrongAlert(total) {
        Swal.fire({
            icon: "error",
            title: "Oops... ",
            text: "That was not correct !",
        }).then(() => {
            showFeedback(0, total, formatTime(timer), attempts);
        });
    }

    function checkCorrectAnswer(currentAnswer, correctOptions) {
        return correctOptions.includes(currentAnswer);
    }


   
    
    

