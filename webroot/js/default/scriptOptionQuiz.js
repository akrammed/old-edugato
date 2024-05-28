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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
                    });




                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });
}
function recordToAnswer(url) {
    var correctValue = '';

    $("#section-2-record").hide();
    $("#add-option-record").hide();
    $("#prev-button-record").hide();
    $("#sub-test-text-record").hide();
    $("#remove-option-record").hide();
    $("#correct-input-record").hide();

    $("#next-button-record").click(function () {
        event.preventDefault();
        $("#section-1-record").hide();
        $("#section-2-record").show();
        $("#add-option-record").show();
        $("#prev-button-record").show();
        $("#next-button-record").hide();
        $("#sub-test-text-record").show();
        $("#correct-input-record").show();
    });

    $("#prev-button-record").click(function () {
        event.preventDefault();
        $("#section-2-record").hide();
        $("#add-option-record").hide();
        $("#section-1-record").show();
        $("#prev-button-record").hide();
        $("#next-button-record").show();
        $("#sub-test-text-record").hide();
        $("#correct-input-record").hide();
    })

    var optionCounttext = 4;
    console.log(optionCounttext);

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#option_' + index + '-text-record').val();
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
            optionCounttext + '"  id="option_' + optionCounttext + '-text-record" name="option_' + optionCounttext +
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



    $("#remove-option-record").click(function () {
        event.preventDefault();
        if (optionCounttext > 1) {
            $(`#op${optionCounttext}`).remove();
            optionCounttext--;
            $("#optionCounttext").val(optionCounttext);




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

    $('#sub-test-text-record').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test-record input[name="_csrfToken"]').val();
        textQuestions = {};
        textQuestions[$("#question-text-record").val()] = false;
        var textData = getAnswers(optionCounttext);
        console.log(textData);
        updateObjct(textData, correctData);
        console.log(textData);
        var formData = {
            title: $("#title-text-record").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#description-text-record").val(),
            question: textQuestions,
            optionCount: 0,
            questionCount: 1,
            type: 10,

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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
                    });




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
        newOption.append('<label for="gaps-option_' + optionCounttext + '">Option ' + optionCounttext + '</label>');
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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
                    });




                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });
}
function dropDownOption(url) {
    var correctValue = '';

    $("#drop-section-2").hide();
    $("#drop-add-option").hide();
    $("#drop-prev-button").hide();
    $("#drop-sub-test-text").hide();
    $("#drop-remove-option").hide();
    $("#drop-correct-input").hide();

    $("#drop-next-button").click(function () {
        event.preventDefault();
        $("#drop-section-1").hide();
        $("#drop-section-2").show();
        $("#drop-add-option").show();
        $("#drop-prev-button").show();
        $("#drop-next-button").hide();
        $("#drop-sub-test-text").show();
        $("#drop-correct-input").show();
    });

    $("#drop-prev-button").click(function () {
        event.preventDefault();
        $("#drop-section-2").hide();
        $("#drop-add-option").hide();
        $("#drop-section-1").show();
        $("#drop-prev-button").hide();
        $("#drop-next-button").show();
        $("#drop-sub-test-text").hide();
        $("#drop-correct-input").hide();
    })

    var optionCounttext = 4;
    console.log(optionCounttext);

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#drop-option_' + index + '-text').val();
            optionsObject[element] = false;
        }
        return optionsObject;
    }


    $("#drop-add-option").click(function () {
        $("#drop-remove-option").show();
        event.preventDefault();
        console.log(getAnswers(optionCounttext));
        optionCounttext++;
        var newOption = $(`<div class="option-container-text" id="drop-op${optionCounttext}">`);
        newOption.append(`<div class="row">`)
        newOption.append('<div class="col-sm-12">');
        newOption.append($(
            '<input type="text" style="margin-left: 0%;" class="desc-input" value ="Option ' +
            optionCounttext + '"  id="drop-option_' + optionCounttext + '-text" name="option_' + optionCounttext +
            '">'));
        newOption.append('</div>');
        newOption.append('</div>');
        newOption.append('</div>');
        $("#drop-conter").append(newOption);

    });
    function normalizeColor(color) {
        return color.replace(/\s/g, '');
    }


    var correctData = {};

    $(document).on('dblclick', '[id^=drop-option_]', function () {

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



    $("#drop-remove-option").click(function () {
        event.preventDefault();
        if (optionCounttext > 1) {
            $(`#drop-op${optionCounttext}`).remove();
            optionCounttext--;
            $("#drop-optionCounttext").val(optionCounttext);

            if (optionCounttext === 1) {
                $(this).addClass("disabled");
            }
            if (optionCounttext < 1) {
                optionCounttext = 1;
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

    $('#drop-sub-test-text').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#drop-myForm-test input[name="_csrfToken"]').val();
        textQuestions = {};
        textQuestions[$("#drop-question-text").val()] = false;
        var textData = getAnswers(optionCounttext);
        console.log(textData);
        updateObjct(textData, correctData);
        console.log(textData);
        var formData = {
            title: $("#drop-title-text").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#drop-description-text").val(),
            question: textQuestions,
            options: textData,
            optionCount: optionCounttext,
            questionCount: 1,
            type: 7,

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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
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


    $("#add-option-image").click(function () {
        event.preventDefault();
        $("#drop-remove-option").show();
        var newOption = '<div class="option-container-image">' +
            '<div class="row" style="margin-left: 2%;">' +
            '<div class="col-sm-6">' +
            '<div class="row">' +
            '<div class="col-sm-6" style="margin-bottom: -11%;"> <a href="#" id="plus-1"style="font-size:30px">+</a></div>' +
            '<div class="col-sm-6" style="margin-left: -39%;">' +
            '<img id="show-icon-1" width="24"' +
            'style="margin-bottom: -20%;" height="24"' +
            'src="https://img.icons8.com/material-outlined/24/filled-trash.png" alt="filled-trash" />' +
            '</div></div>'
        $("#options-container-image").append(newOption);

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

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#Option_' + index + '-image')[0].files[0];
            console.log(element);
            optionsObject[element['name']] = element;
        }
        return optionsObject;
    }


    $('#sub-test-image').on('click', function (event) {
        event.preventDefault();
        imageQuestions = {};
        imageQuestions[$("#question-image").val()] = false;
        var file1 = $(`#Option_1-image`)[0].files[0];
        var file2 = $(`#Option_2-image`)[0].files[0];
        var file3 = $(`#Option_3-image`)[0].files[0];
        var file4 = $(`#Option_4-image`)[0].files[0];
        var imgData = getAnswers(4);
        console.log(imgData);
        var lessonId = $(`input[name="lesson_id"]`).attr('value');
        var formData = new FormData();
        formData.append('title', $("#title-image").val());
        formData.append('description', $("#description-image").val());
        formData.append('questions', $("#question-image").val());
        formData.append('option1', file1);
        formData.append('option2', file2);
        formData.append('option3', file3);
        formData.append('option4', file4);
        formData.append('correctImg', correct);
        formData.append('optionCount', 4);
        formData.append('questionCount', 1);
        formData.append('type', 2);
        formData.append('lesson_id', lessonId);


        console.log(formData);
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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
                    });


                }
            },
            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });

}
function vedioOption(url) {
    var csrfToken = $('#vedio-myForm-test input[name="_csrfToken"]').val();
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


    $("#add-option-image").click(function () {
        event.preventDefault();
        $("#drop-remove-option").show();
        var newOption = '<div class="option-container-image">' +
            '<div class="row" style="margin-left: 2%;">' +
            '<div class="col-sm-6">' +
            '<div class="row">' +
            '<div class="col-sm-6" style="margin-bottom: -11%;"> <a href="#" id="plus-1"style="font-size:30px">+</a></div>' +
            '<div class="col-sm-6" style="margin-left: -39%;">' +
            '<img id="show-icon-1" width="24"' +
            'style="margin-bottom: -20%;" height="24"' +
            'src="https://img.icons8.com/material-outlined/24/filled-trash.png" alt="filled-trash" />' +
            '</div></div>'
        $("#options-container-image").append(newOption);

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

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#Option_' + index + '-image')[0].files[0];
            console.log(element);
            optionsObject[element['name']] = element;
        }
        return optionsObject;
    }


    $('#sub-test-image').on('click', function (event) {
        event.preventDefault();
        imageQuestions = {};
        imageQuestions[$("#question-image").val()] = false;
        var file1 = $(`#Option_1-image`)[0].files[0];
        var file2 = $(`#Option_2-image`)[0].files[0];
        var file3 = $(`#Option_3-image`)[0].files[0];
        var file4 = $(`#Option_4-image`)[0].files[0];
        var imgData = getAnswers(4);
        console.log(imgData);
        var lessonId = $(`input[name="lesson_id"]`).attr('value');
        var formData = new FormData();
        formData.append('title', $("#title-image").val());
        formData.append('description', $("#description-image").val());
        formData.append('questions', $("#question-image").val());
        formData.append('option1', file1);
        formData.append('option2', file2);
        formData.append('option3', file3);
        formData.append('option4', file4);
        formData.append('correctImg', correct);
        formData.append('optionCount', 4);
        formData.append('questionCount', 1);
        formData.append('type', 2);
        formData.append('lesson_id', lessonId);


        console.log(formData);
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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
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
            if (optionCount < 1) {
                optionCount = 1;
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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
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

    $('input[type="color"]').change(function () {
        var colorValue = $(this).val();
        var optionIndex = $(this).attr('id').replace('option_', '').replace('_color', '');
        $('#option_' + optionIndex).val(colorValue).change();
    });

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
            var color = $('#color_' + index).val();
            optionsObject[color] = element;
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
            '<label for="option_' + optionCount + '_color">Item ' + optionCount + '</label>' +
            '<div class="input-group">' +
            '<input type="color" id="color_' + optionCount + '" name="option_' + optionCount + '_color" class="form-control">' +
            '<input type="text" id="option_' + optionCount + '-match" class="form-control minicolors-input" style="border-left: none; padding-left: 0.5rem;margin-left: -188px;" value="Option ' + optionCount + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="form-group">' +
            '<label for="question_' + (optionCount + 1) + '-match">Match item ' + optionCount + '</label>' +
            '<input type="text" id="question_' + optionCount + '-match" class="form-control" value="Question ' + optionCount + '">' +
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
            if (optionCount < 4) {
                optionCount = 4;
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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
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

            if (optionCount === 4) {
                $(this).addClass("disabled");
            }
            if (optionCount < 4) {
                optionCount = 4;
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

                    }).then(() => {
                    if (response.source === 'short') {
                        $('#popupContainer').css('display', 'block');
                        $('#popupContainer').css('opacity', '1');
                        $('#add-short-pop-up').css('display', 'block');
                         $('#quiz-short').val(response.quiz);
                         $('#quiz-id').val(response.id);
                      } else {
                        location.reload();
                      }
                    });



                }
            },

            fail: function (xhr, status, error) {
                console.error('AJAX error:', status, error);

            }
        });
    });

}

function baseMatchOption(url) {
    var correctValue = '';

    $('input[type="color"]').change(function () {
        var colorValue = $(this).val();
        var optionIndex = $(this).attr('id').replace('option_', '').replace('_color', '');
        $('#base-option_' + optionIndex).val(colorValue).change();
    });

    $("#base-section-2-match").hide();
    $("#base-prev-button-match").hide();
    $("#base-sub-test-text-match").hide();
    $("#base-remove-option-match").hide();
    $("#base-correct-input-match").hide();
    $("#base-add-option-match").hide();
    $("#base-remove-option-match").hide();

    $("#base-next-button-match").click(function () {
        event.preventDefault();
        $("#base-section-1-match").hide();
        $("#base-section-2-match").show();
        $("#base-prev-button-match").show();
        $("#base-next-button-match").hide();
        $("#base-sub-test-text-match").show();
        $("#base-correct-input-match").show();
        $("#base-add-option-match").show();
    });

    $("#base-prev-button-match").click(function () {
        event.preventDefault();
        $("#base-section-2-match").hide();
        $("#base-section-1-match").show();
        $("#base-prev-button-match").hide();
        $("#base-next-button-match").show();
        $("#base-sub-test-text-match").hide();
        $("#base-correct-input-match").hide();
        $("#base-add-option-match").hide();
        $("#base-remove-option-match").hide();
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



    $("#base-add-option-match").click(function () {
        event.preventDefault();
        $("#base-remove-option-match").show();
        optionCount++;

        var newOption = '<div class="base-option-container-match">' +
            '<div class="row">' +
            '<div class="col-sm-6">' +
            '<div class="form-group">' +
            '<label for="base-option_' + (optionCount + 1) + '-match">Item ' + optionCount + '</label>' +
            '<input type="text" id="base-option_' + optionCount + '-match" class="form-control minicolors-input";" value="Option ' + optionCount + '">' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="form-group">' +
            '<label for="base-question_' + (optionCount + 1) + '-match">Match item ' + optionCount + '</label>' +
            '<input type="text" id="base-question_' + optionCount + '-match" class="form-control" value="Question ' + optionCount + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $("#base-options-container-match").append(newOption);
    });


    $("#base-remove-option-match").click(function () {
        event.preventDefault();
        if (optionCount > 1) {
            optionCount--;
            $("#base-optionCount-match").val(optionCount);


            $(".base-option-container-match:last").remove();

            if (optionCount === 4) {
                $(this).addClass("disabled");
            } if (optionCount < 4) {
                optionCount = 4;
            }
        }
    });




    $('#base-sub-test-text-match').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test-match-base input[name="_csrfToken"]').val();
        var optionsList = getAnswers(optionCount, 'base-option');
        var questionsList = getAnswers(optionCount, 'base-question');
        var formData = {
            title: $("#base-title-match").val(),
            description: $("#base-description-match").val(),
            question: questionsList,
            options: optionsList,
            optionCount: optionCount,
            questionCount: optionCount,
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            type: 8,
        };

        console.log('formData', formData)
        $.ajax({
            url: url,
            data: formData,
            method: 'GET',
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
                        if (response.source === 'short') {
                            $('#popupContainer').css('display', 'block');
                            $('#popupContainer').css('opacity', '1');
                            $('#add-short-pop-up').css('display', 'block');
                             $('#quiz-short').val(response.quiz);
                             $('#quiz-id').val(response.id);

                      } else {
                        location.reload();
                      }
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

    $("#section-2-audio").hide();
    $("#add-option-audio").hide();
    $("#record-display").hide();
    $("#prev-button-audio").hide();
    $("#sub-test-audio").hide();
    $("#remove-option-audio").hide();
    $("#correct-input-audio").hide();

    $("#next-button-audio").click(function () {
        event.preventDefault();
        $("#record-display").show();
        $("#section-1-audio").hide();
        $("#section-2-audio").show();
        $("#add-option-audio").show();
        $("#prev-button-audio").show();
        $("#next-button-audio").hide();
        $("#sub-test-audio").show();
        $("#correct-input-audio").show();
    });

    $("#prev-button-audio").click(function () {
        event.preventDefault();
        $("#record-display").hide();
        $("#section-2-audio").hide();
        $("#add-option-audio").hide();
        $("#section-1-audio").show();
        $("#prev-button-audio").hide();
        $("#next-button-audio").show();
        $("#sub-test-audio").hide();
        $("#correct-input-audio").hide();
    })

    var optionCountaudio = 4;

    function getAnswers(optionCount) {
        var optionsObject = {};
        for (let index = 1; index <= optionCount; index++) {
            var element = $('#option_' + index + '-audio').val();
            optionsObject[element] = false;
        }
        return optionsObject;
    }


    $("#add-option").click(function () {
        $("#remove-option").show();
        event.preventDefault();
        console.log(getAnswers(optionCountaudio));
        optionCountaudio++;
        var newOption = $(`<div class="option-container-audio" id="op${optionCountaudio}">`);
        newOption.append(`<div class="row">`)
        newOption.append('<div class="col-sm-12">');
        newOption.append($(
            '<input type="text" style="margin-left: 0%;" class="desc-input" value ="Option ' +
            optionCountaudio + '"  id="option_' + optionCountaudio + '-audio" name="option_' + optionCountaudio +
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
        if (optionCountaudio > 1) {
            $(`#op${optionCountaudio}`).remove();
            optionCountaudio--;
            $("#optionCountaudio").val(optionCountaudio);




            if (optionCountaudio === 1) {
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

    $('#sub-test-audio').on('click', function (event) {
        event.preventDefault();
        var csrfToken = $('#myForm-test input[name="_csrfToken"]').val();
        audioQuestions = {};
        audioQuestions[$("#question-audio").val()] = false;
        var audioData = getAnswers(optionCountaudio);
        console.log(audioData);
        updateObjct(audioData, correctData);
        console.log(audioData);
        var formData = {
            title: $("#title-audio").val(),
            lesson_id: $('input[name="lesson_id"]').attr('value'),
            description: $("#description-audio").val(),
            question: audioQuestions,
            options: audioData,
            optionCount: optionCountaudio,
            questionCount: 1,
            type: 1,
            audio: $('#audioInput').val() // Accessing the recorded audio URL
        };
        console.log('formData', formData)
        // $.ajax({
        //     url: url,
        //     data: formData,
        //     method: 'POST',
        //     dataType: 'json',
        //     headers: {
        //         'X-CSRF-Token': csrfToken
        //     },
        //     success: function (response) {
        //         $('#popupContainer-white').css('display', 'none');
        //         console.log(response);
        //         if (response.result) {
        //             $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
        //                 $(this).hide();
        //                 $(`#${popUpName}`).css('display', 'none');
        //                 $('#cId').remove();
        //                 $('#lId').remove();
        //                 $('#chaId').remove();

        //             })
        //             Swal.fire({
        //                 position: "center",
        //                 icon: "success",
        //                 title: "Quiz has been saved",
        //                 showConfirmButton: false,
        //                 timer: 3000,

        //             }).then(() => {
        //                 location.reload();
        //             });




        //         }
        //     },

        //     fail: function (xhr, status, error) {
        //         console.error('AJAX error:', status, error);

        //     }
        // });
    });
}