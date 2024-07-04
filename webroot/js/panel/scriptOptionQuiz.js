function textOption(url) {
    var correctValue = '';

    $("#section-2").hide();
    $("#add-option").hide();
    $("#prev-button").hide();
    $("#sub-test-text").hide();
    $("#remove-option").hide();
    $("#correct-input").hide();

    $("#next-button").click(function () {
        event.preventDefault();
        $("#section-1").hide();
        $("#section-2").show();
        $("#add-option").show();
        $("#prev-button").show();
        $("#next-button").hide();
        $("#sub-test-text").show();
        $("#correct-input").show();
    });

    $("#prev-button").click(function () {
        event.preventDefault();
        $("#section-2").hide();
        $("#add-option").hide();
        $("#section-1").show();
        $("#prev-button").hide();
        $("#next-button").show();
        $("#sub-test-text").hide();
        $("#correct-input").hide();
    })

    var optionCounttext = 4;
    console.log(optionCounttext);

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#option_' + index + '-text').val();
            optionsObject[element] = false;
        }
        return optionsObject;
    }


    $("#add-option").click(function () {
        $("#remove-option").show();
        event.preventDefault();
        console.log(getAnswers(optionCounttext));
        optionCounttext++;
        var newOption = $(`<div class="option-container-text" id="op${optionCounttext}">`);
        newOption.append(`<div class="row">`)
        newOption.append('<div class="col-sm-12">');
        newOption.append($(
            '<input type="text" style="margin-left: 0%;" class="desc-input" value ="Option ' +
            optionCounttext + '"  id="option_' + optionCounttext + '-text" name="option_' + optionCounttext +
            '">'));
        newOption.append('</div>');
        newOption.append('</div>');
        newOption.append('</div>');
        $("#conter").append(newOption);

    });
    function normalizeColor(color) {
        return color.replace(/\s/g, '');
    }


    var correctData = {};

    $(document).on('dblclick', '[id^=option_]', function () {

        var optionValue = $(this).val();

        if ($(this).css('background-color') === 'rgb(0, 63, 145)') {
            $(this).css('background-color', 'white');
            $(this).css('color', '#003F91');
            correctData[optionValue] = false;
        } else {
            $(this).css('background-color', '#003F91');
            $(this).css('color', 'white');
            correctData[optionValue] = true;
        }


        console.log(correctData);
        console.log(test);
    });



    $("#remove-option").click(function () {
        event.preventDefault();
        if (optionCounttext > 1) {
            $(`#op${optionCounttext}`).remove();
            optionCounttext--;
            $("#optionCounttext").val(optionCounttext);




            if (optionCounttext === 1) {
                $(this).addClass("disabled");
            }
        }
    });

    function updateObjct(obj1, obj2) {
        $.each(obj2, function (key, value) {
            if (value === true) {
                obj1[key] = true;
            }
        });
    }

    $('#sub-test-text').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test input[name="_csrfToken"]').val();
        textQuestions = {};
        textQuestions[$("#question-text").val()] = false;
        var textData = getAnswers(optionCounttext);
        console.log(textData);
        updateObjct(textData, correctData);
        console.log(textData);
        var formData = {
            title: $("#title-text").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#description-text").val(),
            question: textQuestions,
            options: textData,
            optionCount: optionCounttext,
            questionCount: 1,
            type: 1,

        };
        console.log('formData', formData)
        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) {
                $('#popupContainer-white').css('display', 'none');
                console.log(response);
                if (response.result) {
                    $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();

                    })
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Quiz has been saved",
                        showConfirmButton: false,
                        timer: 3000,

                    }).then(() => {
                        location.reload();
                    });




                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });
}
function audioOption(url) {
    var correctValue = '';

    $("#section-2").hide();
    $("#add-option").hide();
    $("#prev-button").hide();
    $("#sub-test-text").hide();
    $("#remove-option").hide();
    $("#correct-input").hide();

    $("#next-button").click(function () {
        event.preventDefault();
        $("#section-1").hide();
        $("#section-2").show();
        $("#add-option").show();
        $("#prev-button").show();
        $("#next-button").hide();
        $("#sub-test-text").show();
        $("#correct-input").show();
    });

    $("#prev-button").click(function () {
        event.preventDefault();
        $("#section-2").hide();
        $("#add-option").hide();
        $("#section-1").show();
        $("#prev-button").hide();
        $("#next-button").show();
        $("#sub-test-text").hide();
        $("#correct-input").hide();
    })

    var optionCounttext = 4;
    console.log(optionCounttext);

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#option_' + index + '-text').val();
            optionsObject[element] = false;
        }
        return optionsObject;
    }


    $("#add-option").click(function () {
        $("#remove-option").show();
        event.preventDefault();
        console.log(getAnswers(optionCounttext));
        optionCounttext++;
        var newOption = $(`<div class="option-container-text" id="op${optionCounttext}">`);
        newOption.append(`<div class="row">`)
        newOption.append('<div class="col-sm-12">');
        newOption.append($(
            '<input type="text" style="margin-left: 0%;" class="desc-input" value ="Option ' +
            optionCounttext + '"  id="option_' + optionCounttext + '-text" name="option_' + optionCounttext +
            '">'));
        newOption.append('</div>');
        newOption.append('</div>');
        newOption.append('</div>');
        $("#conter").append(newOption);

    });
    function normalizeColor(color) {
        return color.replace(/\s/g, '');
    }


    var correctData = {};

    $(document).on('dblclick', '[id^=option_]', function () {

        var optionValue = $(this).val();

        if ($(this).css('background-color') === 'rgb(0, 63, 145)') {
            $(this).css('background-color', 'white');
            $(this).css('color', '#003F91');
            correctData[optionValue] = false;
        } else {
            $(this).css('background-color', '#003F91');
            $(this).css('color', 'white');
            correctData[optionValue] = true;
        }


        console.log(correctData);
        console.log(test);
    });



    $("#remove-option").click(function () {
        event.preventDefault();
        if (optionCounttext > 1) {
            $(`#op${optionCounttext}`).remove();
            optionCounttext--;
            $("#optionCounttext").val(optionCounttext);




            if (optionCounttext === 1) {
                $(this).addClass("disabled");
            }
        }
    });

    function updateObjct(obj1, obj2) {
        $.each(obj2, function (key, value) {
            if (value === true) {
                obj1[key] = true;
            }
        });
    }

    $('#sub-test-text').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test input[name="_csrfToken"]').val();
        textQuestions = {};
        textQuestions[$("#question-text").val()] = false;
        var textData = getAnswers(optionCounttext);
        console.log(textData);
        updateObjct(textData, correctData);
        console.log(textData);
        var formData = {
            title: $("#title-text").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#description-text").val(),
            question: textQuestions,
            options: textData,
            optionCount: optionCounttext,
            questionCount: 1,
            type: 1,

        };
        console.log('formData', formData)
        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) {
                $('#popupContainer-white').css('display', 'none');
                console.log(response);
                if (response.result) {
                    $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();

                    })
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Quiz has been saved",
                        showConfirmButton: false,
                        timer: 3000,

                    }).then(() => {
                        location.reload();
                    });




                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });
}
function imageOption(url) {
    var csrfToken = $('#myForm-test input[name="_csrfToken"]').val();
    var option1 = '';
    var option2 = '';
    var option3 = '';
    var option4 = '';
    $('#show-icon-1').hide();
    $('#option-picture-1').hover(function () {
        $('#show-icon-1').show();
    });
    $('#show-icon-1').click(function () {
        $('#option-picture-1-js').hide();
        $('#show-icon-1').hide();
        $('#option-picture-1').show();
    });

    $('#show-icon-2').hide();
    $('#option-picture-2').hover(function () {
        $('#show-icon-2').show();
    });
    $('#show-icon-2').click(function () {
        $('#option-picture-2-js').hide();
        $('#show-icon-2').hide();
        $('#option-picture-2').show();
    });

    $('#show-icon-3').hide();
    $('#option-picture-3').hover(function () {
        $('#show-icon-3').show();
    });
    $('#show-icon-3').click(function () {
        $('#option-picture-3-js').hide();
        $('#show-icon-3').hide();
        $('#option-picture-3').show();
    });
    $('#show-icon-4').hide();
    $('#option-picture-4').hover(function () {
        $('#show-icon-4').show();
    });
    $('#show-icon-4').click(function () {
        $('#option-picture-4-js').hide();
        $('#show-icon-4').hide();
        $('#option-picture-4').show();
    });


    $(function () {
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(`#${id}`).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(`#show-icon-1`).click(function () {
            $(`#option-picture-1`).attr('src', '/default-image.jpg');
            $(`#Option_1-image`).val("");
        })
        $(`#show-icon-2`).click(function () {
            $(`#option-picture-2`).attr('src', '/default-image.jpg');
            $(`#Option_1-image`).val("");
        })
        $(`#show-icon-3`).click(function () {
            $(`#option-picture-3`).attr('src', '/default-image.jpg');
            $(`#Option_1-image`).val("");
        })
        $(`#show-icon-4`).click(function () {
            $(`#option-picture-4`).attr('src', '/default-image.jpg');
            $(`#Option_1-image`).val("");
        })
        $('#option-picture-1').click(function () {
            $('#Option_1-image').click();
        });
        $('#option-picture-2').click(function () {
            $('#Option_2-image').click();
        });
        $('#option-picture-3').click(function () {
            $('#Option_3-image').click();
        });
        $('#option-picture-4').click(function () {
            $('#Option_4-image').click();
        });
        $("#Option_1-image").change(function () {
            readURL(this, "option-picture-1");
        });
        $("#Option_2-image").change(function () {
            readURL(this, "option-picture-2");
        });
        $("#Option_3-image").change(function () {
            readURL(this, "option-picture-3");
        });
        $("#Option_4-image").change(function () {
            readURL(this, "option-picture-4");
        });
    });
    var correct = null;
    $(document).on('dblclick', '[id^=Option-]', function () {
        $('[id^=Option-]').css('border', 'none');
        var imageId = $(this).attr('id').split('-')[1];
        $(this).css('border', '9px solid greenyellow');
        correctA = imageId;

    });
    $(document).on('dblclick', '[id^=plus-]', function () {
        $('[id^=plus-]').css('color', 'black');
        var id = $(this).attr('id').split('-')[1];
        $(this).css('color', 'greenyellow');
        correct = id
        console.log("Correct answers:", id);
    });

    $("#section-2-image").hide();
    $("#prev-button-image").hide();
    $("#sub-test-image").hide();
    $("#remove-option-image").hide();
    $("#correct-input-image").hide();

    $("#next-button-image").click(function () {
        event.preventDefault();
        $("#section-1-image").hide();
        $("#section-2-image").show();
        $("#prev-button-image").show();
        $("#next-button-image").hide();
        $("#sub-test-image").show();
        $("#correct-input-image").show();

    });

    $("#prev-button-image").click(function () {
        event.preventDefault();
        $("#section-2-image").hide();
        $("#section-1-image").show();
        $("#prev-button-image").hide();
        $("#next-button-image").show();
        $("#sub-test-image").hide();
        $("#correct-input-image").hide();
    })


    $('#sub-test-image').on('click', function (event) {
        event.preventDefault();
        var file1 = $(`#Option_1-image`)[0].files[0];
        var file2 = $(`#Option_2-image`)[0].files[0];
        var file3 = $(`#Option_3-image`)[0].files[0];
        var file4 = $(`#Option_4-image`)[0].files[0];
        var lessonId = $(`input[name="lesson_id"]`).attr('value');
        var formData = new FormData();
        formData.append('option_1', file1);
        formData.append('option_2', file2);
        formData.append('option_3', file3);
        formData.append('option_4', file4);
        formData.append('title', $("#title-image").val());
        formData.append('description', $("#description-image").val());
        formData.append('question', $("#question-image").val());
        formData.append('correct', correct);
        formData.append('type', 2);
        formData.append('lesson_id', lessonId);


        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) {
                console.log(response);
                if (response.result) {
                    $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();

                    })
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Quiz has been saved",
                        showConfirmButton: false,
                        timer: 3000,

                    }).then(() => {
                        location.reload();
                    });


                }
            },
            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });

}
function trueFalseOption(url) {
    var correctValue = '';
    $("#section-2-tf").hide();
    $("#prev-button-tf").hide();
    $("#sub-test-tf").hide();
    $("#remove-option-tf").hide();
    $("#correct-input-tf").hide();

    $("#next-button-tf").click(function () {
        event.preventDefault();
        $("#section-1-tf").hide();
        $("#section-2-tf").show();
        $("#prev-button-tf").show();
        $("#next-button-tf").hide();
        $("#sub-test-tf").show();
        $("#correct-input-tf").show();
    });

    $("#prev-button-tf").click(function () {
        event.preventDefault();
        $("#section-2-tf").hide();
        $("#section-1-tf").show();
        $("#prev-button-tf").hide();
        $("#next-button-tf").show();
        $("#sub-test-tf").hide();
        $("#correct-input-tf").hide();
    })

    var optionCount = 2;
    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#question_' + index + '-tf').val();
            optionsObject[element] = false;
        }
        return optionsObject;
    }


    $("#add-option-tf").click(function () {
        $("#remove-option-tf").show();
        event.preventDefault();
        optionCount++;

        var newOption = $('<div class="option-container"></div>');
        newOption.append('<div class="row"')
        newOption.append('<div class="col-sm-12">');
        newOption.append($(
            '<label>Enter Question</label><input type="text" style="margin-left:0% !important;" class="title-input-question" value ="Add your true / false question here ' + optionCount + '"  id="question_' +
            optionCount + '-tf" name="question_' + optionCount +
            '">'));
        newOption.append('</div>');
        newOption.append('</div>');
        $("#options-container-tf").append(newOption);

    });
    $("#remove-option-tf").click(function () {
        event.preventDefault();

        if (optionCount > 1) {
            optionCount--;
            $("#optionCount").val(optionCount);


            $(".option-container:last").remove();

            if (optionCount === 1) {
                $(this).addClass("disabled");
            }
        }
    });



    var correctData = {};

    $(document).on('dblclick', '[id^=question_]', function () {

        var optionValue = $(this).val();

        if ($(this).css('background-color') === 'rgb(0, 63, 145)') {
            $(this).css('background-color', 'white');
            $(this).css('color', '#003F91');
            correctData[optionValue] = false;
        } else {
            $(this).css('background-color', '#003F91');
            $(this).css('color', 'white');
            correctData[optionValue] = true;
        }

        console.log(correctData);



    });

    function updateObjct(obj1, obj2) {
        $.each(obj2, function (key, value) {
            if (value === true) {
                obj1[key] = true;
            }
        });
    }


    $('#sub-test-tf').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test input[name="_csrfToken"]').val();
        var textData = getAnswers(optionCount);
        console.log(textData);
        updateObjct(textData, correctData);
        console.log(textData);
        var formData = {
            title: $("#title-tf").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#description-tf").val(),
            question: textData,
            options: null,
            optionCount: 0,
            questionCount: optionCount,
            type: 3,

        };
        console.log('formData', formData)
        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) {
                console.log(response);
                if (response.result) {
                    $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();

                    })
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Quiz has been saved",
                        showConfirmButton: false,
                        timer: 3000,

                    }).then(() => {
                        location.reload();
                    });


                }
            },
            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });


}
function matchOption(url) {
    var correctValue = '';

    $("#section-2-match").hide();
    $("#prev-button-match").hide();
    $("#sub-test-text-match").hide();
    $("#remove-option-match").hide();
    $("#correct-input-match").hide();
    $("#add-option-match").hide();
    $("#remove-option-match").hide();

    $("#next-button-match").click(function () {
        event.preventDefault();
        $("#section-1-match").hide();
        $("#section-2-match").show();
        $("#prev-button-match").show();
        $("#next-button-match").hide();
        $("#sub-test-text-match").show();
        $("#correct-input-match").show();
        $("#add-option-match").show();
    });

    $("#prev-button-match").click(function () {
        event.preventDefault();
        $("#section-2-match").hide();
        $("#section-1-match").show();
        $("#prev-button-match").hide();
        $("#next-button-match").show();
        $("#sub-test-text-match").hide();
        $("#correct-input-match").hide();
        $("#add-option-match").hide();
        $("#remove-option-match").hide();
    })



    var optionCount = 4;

    function getAnswers(optionCount, type) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#' + type + '_' + index + '-match').val();
            optionsObject[index] = element;
        }
        return optionsObject;
    }


    $("#add-option-match").click(function () {
        event.preventDefault();
        $("#remove-option-match").show();
        optionCount++;

        var newOption = '<div class="option-container-match">' +
            '<div class="row">' +
            '<div class="col-sm-6">' +
            '<div class="form-group">' +
            '<label for="' + optionCount + '">Item ' + optionCount + '</label>' +
            '<input type="text" id="option_' + optionCount + '-match" class="form-control" name="option_' + optionCount + '" value="Option ' + optionCount + '">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="form-group">' +
            '<label for="' + optionCount + '">Match item ' + optionCount + '</label>' +
            '<input type="text" id="question_' + optionCount + '-match" class="form-control" name="question_' + optionCount + '" value="Question ' + optionCount + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $("#options-container-match").append(newOption);

    });

    $("#remove-option-match").click(function () {
        event.preventDefault();
        if (optionCount > 1) {
            optionCount--;
            $("#optionCount-match").val(optionCount);


            $(".option-container-match:last").remove();

            if (optionCount === 4) {
                $(this).addClass("disabled");
            }
        }
    });




    $('#sub-test-text-match').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test-match input[name="_csrfToken"]').val();
        var optionsList = getAnswers(optionCount, 'option');
        var questionsList = getAnswers(optionCount, 'question');
        var formData = {
            title: $("#title-match").val(),
            description: $("#description-match").val(),
            question: questionsList,
            options: optionsList,
            optionCount: optionCount,
            questionCount: optionCount,
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            type: 4,

        };
        
        console.log('formData', formData)
        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) {
                console.log(response);
                if (response.result) {
                    $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();

                    })
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Quiz has been saved",
                        showConfirmButton: false,
                        timer: 3000,

                    }).then(() => {
                        location.reload();
                    });


                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });

}
function orderingOption(url) {
    var correctValue = '';

    $("#section-2-ordering").hide();
    $("#prev-button-ordering").hide();
    $("#sub-test-text-ordering").hide();
    $("#remove-option-ordering").hide();
    $("#correct-input-ordering").hide();

    $("#next-button-ordering").click(function () {
        event.preventDefault();
        $("#section-1-ordering").hide();
        $("#section-2-ordering").show();
        $("#prev-button-ordering").show();
        $("#next-button-ordering").hide();
        $("#sub-test-text-ordering").show();
        $("#correct-input-ordering").show();
    });

    $("#prev-button-ordering").click(function () {
        event.preventDefault();
        $("#section-2-ordering").hide();
        $("#section-1-ordering").show();
        $("#prev-button-ordering").hide();
        $("#next-button-ordering").show();
        $("#sub-test-text-ordering").hide();
        $("#correct-input-ordering").hide();
    })

    var optionCount = 2;

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#option_' + index + '-ordering').val();
            optionsObject[index] = element;
        }
        return optionsObject;
    }

    $("#add-option-ordering").click(function () {
        $("#remove-option-ordering").show();
        event.preventDefault();
        optionCount++;


        var newOption = $('<div class="option-container-ordering"></div>');
        newOption.append('<div class="row"')
        newOption.append('<div class="col-sm-12">');
        newOption.append('<label for="">Item order ' + optionCount + '</label>');
        newOption.append($(
            '<input type="text" style="margin-left: 0%;" class="desc-input" value ="Option ' +
            optionCount + '"  id="option_' + optionCount + '-ordering" name="option_' + optionCount +
            '">'));
        newOption.append('</div>');
        newOption.append('</div>');
        $("#options-container-ordering").append(newOption);

    });

    $("#remove-option-ordering").click(function () {
        event.preventDefault();
        if (optionCount > 1) {
            optionCount--;
            $("#optionCount-ordering").val(optionCount);


            $(".option-container-ordering:last").remove();

            if (optionCount === 1) {
                $(this).addClass("disabled");
            }
        }
    });

    $('#sub-test-text-ordering').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test-ordering input[name="_csrfToken"]').val();
        var textData = getAnswers(optionCount);
        textQuestions = {};
        textQuestions[$("#question-ordering").val()] = false;
        var formData = {
            title: $("#title-ordering").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#description-ordering").val(),
            question: textQuestions,
            options: textData,
            optionCount: optionCount,
            questionCount: 1,
            type: 5,
        };
        console.log('formData', formData)
        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) {
                console.log(response);
                if (response.result) {
                    $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();

                    })
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Quiz has been saved",
                        showConfirmButton: false,
                        timer: 3000,

                    })
                    location.reload();



                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });

}

function gapsOption(url) {
    var correctValue = '';

    $("#gaps-section-2").hide();
    $("#gaps-add-option").hide();
    $("#gaps-prev-button").hide();
    $("#gaps-sub-test-text").hide();
    $("#gaps-remove-option").hide();
    $("#gaps-correct-input").hide();

    $("#gaps-next-button").click(function () {
        event.preventDefault();
        $("#gaps-section-1").hide();
        $("#gaps-section-2").show();
        $("#gaps-add-option").show();
        $("#gaps-prev-button").show();
        $("#gaps-next-button").hide();
        $("#gaps-sub-test-text").show();
        $("#gaps-correct-input").show();
    });

    $("#gaps-prev-button").click(function () {
        event.preventDefault();
        $("#gaps-section-2").hide();
        $("#gaps-add-option").hide();
        $("#gaps-section-1").show();
        $("#gaps-prev-button").hide();
        $("#gaps-next-button").show();
        $("#gaps-sub-test-text").hide();
        $("#gaps-correct-input").hide();
    })

    var optionCounttext = 3;
    console.log(optionCounttext);

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#gaps-option_' + index + '-text').val();
            optionsObject[element] = index;
        }
        return optionsObject;
    }


    $("#gaps-add-option").click(function () {
        $("#gaps-remove-option").show();
        event.preventDefault();
        console.log(getAnswers(optionCounttext));
        optionCounttext++;
        var newOption = $(`<div class="option-container-text" id="gaps-op${optionCounttext}">`);
        newOption.append(`<div class="row">`)
        newOption.append('<div class="col-sm-12">');
        newOption.append('<label for="gaps-option_' + optionCounttext +'">Option '+ optionCounttext +'</label>');
        newOption.append($(
            '<input type="text" style="margin-left: 0%;" class="desc-input" value ="Option ' +
            optionCounttext + '"  id="gaps-option_' + optionCounttext + '-text" name="gaps-option_' + optionCounttext +
            '">'));
        newOption.append('</div>');
        newOption.append('</div>');
        newOption.append('</div>');
        $("#gaps-conter").append(newOption);

    });
    function normalizeColor(color) {
        return color.replace(/\s/g, '');
    }


    var correctData = {};




    $("#gaps-remove-option").click(function () {
        event.preventDefault();
        if (optionCounttext > 1) {
            $(`#gaps-op${optionCounttext}`).remove();
            optionCounttext--;
            $("#gaps-optionCounttext").val(optionCounttext);




            if (optionCounttext === 1) {
                $(this).addClass("disabled");
            }
            if (optionCount < 1) {
                optionCount = 1;
            }
        }
    });

    function updateObjct(obj1, obj2) {
        $.each(obj2, function (key, value) {
            if (value === true) {
                obj1[key] = true;
            }
        });
    }

    $('#gaps-sub-test-text').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#gaps-myForm-test input[name="_csrfToken"]').val();
        textQuestions = {};
        textQuestions[0] = $("#gaps-question-text").val();
        var textData = getAnswers(optionCounttext);
        console.log(textData);
        updateObjct(textData, correctData);
        console.log(textData);
        var formData = {
            title: $("#gaps-title-text").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#gaps-description-text").val(),
            question: textQuestions,
            options: textData,
            optionCount: optionCounttext,
            questionCount: 1,
            type: 6,

        };
        console.log('formData', formData)
        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) {
                $('#popupContainer-white').css('display', 'none');
                console.log(response);
                if (response.result) {
                    $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();

                    })
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Quiz has been saved",
                        showConfirmButton: false,
                        timer: 3000,

                    }).then(() => {
                        location.reload();
                    });




                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });
}
