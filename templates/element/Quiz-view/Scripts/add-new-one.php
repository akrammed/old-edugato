<script>
    (function($) {
        let i = 4;
        let isInitialized = false;
        let imageWithCorrectWord = [];
        let arrayToSendCraousel = [];
        let arrayToSendChooseOneOption = [];
        let arrayTosendChooseOneImage = [];
        let wordInchooseOption = []
        $(document).on('click', '#cancel-quiz-create', function() {
            arrayToSendCraousel = [];
        });

        const Craousel = {

            init() {
                $(document).on('click', '.addNewImage', this.handleClick.bind(this));
                $(document).on('click', '[id^="browseBtn"]', this.uploadImages.bind(this));
                $(document).on('change', '[id^="image"]', this.placeImage.bind(this));
                $(document).on('input', '[id^="wordInput"]', this.handleWordInput.bind(this));
                $(document).on('click', '#save-quiz-create', this.sendToBackEnd.bind(this));
                $(document).on('click', '[id^="delteCardBtn"]', this.deleteCard.bind(this));
                $(document).on('click', '[id^="replaceBtn"]', this.replaceImage.bind(this));
            },

            deleteCard(event) {
                event.preventDefault();
                const buttonId = $(event.target).attr('id');
                const numberMatch = buttonId.match(/delteCardBtn(\d+)/);
                if (numberMatch) {
                    const number = numberMatch[1];
                    $(`#imageCard${number}`).remove();
                    delete imageWithCorrectWord[number];
                } else {
                    console.error("Error: Invalid button ID format.");
                }
            },

            handleClick(event) {
                event.preventDefault();
                i++;

                const newElement = $(`<?= $this->element('Quiz-view/Elements/card-upload-image', ['id' => '${i}']) ?>`);

                $('.addNewImage').before(newElement);
                $(`#browseBtn${i}`).on('click', this.uploadImages.bind(this));
                $(`#image${i}`).on('change', this.placeImage.bind(this));
                $(`#brd${i}`).on('dragover drop', this.dragAndDrop.bind(this));
            },

            uploadImages(event) {
                const buttonId = $(event.target).attr('id');
                const numberMatch = buttonId.match(/browseBtn(\d+)/);
                if (numberMatch) {
                    const number = numberMatch[1];
                    $(`#image${number}`).click();
                } else {
                    console.error("Error: Invalid button ID format.");
                }
            },

            replaceImage(event) {
                const buttonId = $(event.target).attr('id');
                const numberMatch = buttonId.match(/replaceBtn(\d+)/);
                if (numberMatch) {
                    const number = numberMatch[1];
                    $(`#image${number}`).click();
                } else {
                    console.error("Error: Invalid button ID format.");
                }
            },
            placeImage(event) {
                let input = $(event.target);
                const numberMatch = input.attr('id').match(/image(\d+)/);

                if (numberMatch) {
                    const number = numberMatch[1];

                    $(`#brd${number}`).hide();
                    $(`#imageUploadedDiv${number}`).removeClass('d-none');

                    if (input[0].files && input[0].files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            $(`#imageUploadedDiv${number}`).html(`
                                <div class="d-flex position-absolute" style="z-index: 999999;">
                                    <button type="button" class="browseBtn" id="replaceBtn${number}">Replace</button>
                                </div>
                                <img id="imageUploaded${number}" class="img-fluid" style="border-radius: 8px 8px 0px 0px; width: 100%; height: 100%;" src="${e.target.result}" alt="Uploaded Image">
                            `);
                            imageWithCorrectWord[number] = {
                                image: e.target.result,
                                word: $(`#wordInput${number}`).val() || ""
                            };
                        };

                        reader.readAsDataURL(input[0].files[0]);
                    }
                } else {
                    console.error("Error: Invalid image ID format.");
                }
            },

            handleWordInput(event) {
                const inputId = $(event.target).attr('id');
                const numberMatch = inputId.match(/wordInput(\d+)/);
                if (numberMatch) {
                    const number = numberMatch[1];
                    const word = $(event.target).val();
                    if (imageWithCorrectWord[number]) {
                        imageWithCorrectWord[number].word = word;
                    }
                }
                arrayToSendCraousel = imageWithCorrectWord.filter(item => item !== undefined);
            },

            sendToBackEnd(event) {
                if (arrayToSendCraousel.length > 0) {
                    const formData = new FormData();
                    arrayToSendCraousel.forEach((item, index) => {
                        formData.append(`image${index}`, item.image);
                        formData.append(`word${index}`, item.word);
                    });
                    $.ajax({
                        url: 'https://httpbin.org/post',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Upload failed:', textStatus, errorThrown);
                        }
                    });
                } else {
                    if (arrayToSendChooseOneOption.length > 0) {
                        const formData = new FormData();
                        arrayToSendChooseOneOption.forEach((item, index) => {
                            formData.append(`${index}`, item);
                        });
                        $.ajax({
                            url: 'https://httpbin.org/post',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log(response)
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('Upload failed:', textStatus, errorThrown);
                            }
                        });

                    } else
                    if (arrayTosendChooseOneImage.length > 0) {
                    const formData = new FormData();
                    arrayTosendChooseOneImage.forEach((item, index) => {
                        formData.append(`${index}`, item);
                    });
                    $.ajax({
                        url: 'https://httpbin.org/post',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Upload failed:', textStatus, errorThrown);
                        }
                    });
                } else {

                    alert("Array empty");
                }                }
            }
        };
        const ChooseoOneOption = {
            init() {
                $(document).on('input', '[id^="chooseOption"]', this.inputDynamically.bind(this));
                $(document).on('input', '[id^="chooseOption"]', this.handleWordInput1.bind(this));
            },
            inputDynamically(event) {
                const input = $(event.target);
                var minWidth = 50;
                var maxWidth = 300;
                var newWidth = (input.val().length + 1) * 16;
                if (newWidth < minWidth) {
                    newWidth = minWidth;
                } else if (newWidth > maxWidth) {
                    newWidth = maxWidth;
                }
                input.css('width', newWidth + 'px');
            },
            handleWordInput1(event) {
                const inputId = $(event.target).attr('id');
                const numberMatch = inputId.match(/chooseOption(\d+)/);
                if (numberMatch) {
                    const number = parseInt(numberMatch[1], 10);
                    const word = $(event.target).val();
                    arrayToSendChooseOneOption[number - 1] = word;
                }
            }
        };
        const chooseOneImage = {

            init() {
                $(document).on('click', '[id^="option-image-"]', this.uploadImage.bind(this));
                $(document).on('change', '[id^="image"]', this.placeImage.bind(this));
                $(document).on('click', '[id^="imageUploaded"]', this.replaceImage.bind(this));
                $(document).on('click', '#save-quiz-create', this.sendToBackEnd.bind(this));

            },
            uploadImage(event) {
                const imageId = $(event.target).attr('id');
                const numberMatch = imageId.match(/option-image-(\d+)/);
                if (numberMatch) {
                    const number = numberMatch[1];
                    $(`#image${number}`).click();
                } else {
                    console.error("Error: Invalid button ID format.");
                }
            },
            placeImage(event) {
                let input = $(event.target);
                const numberMatch = input.attr('id').match(/image(\d+)/);
                const number = numberMatch[1];
                $(`#option-image-${number}`).hide();
                $(`#show-image-${number}`).removeClass('d-none');

                if (input[0].files && input[0].files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {

                        $(`#show-image-${number}`).html(`
                                <img id="imageUploaded${number}" class="img-fluid" style=" height: 135px; border-radius: 14px; width:100%" src="${e.target.result}" alt="Uploaded Image">
                            `);
                        arrayTosendChooseOneImage[number] = e.target.result;

                    };

                    reader.readAsDataURL(input[0].files[0]);
                }

                console.error("Error: Invalid image ID format.");
            },
            replaceImage(event) {
                const buttonId = $(event.target).attr('id');
                const numberMatch = buttonId.match(/imageUploaded(\d+)/);
                if (numberMatch) {
                    const number = numberMatch[1];
                    $(`#image${number}`).click();
                } else {
                    console.error("Error: Invalid button ID format.");
                }
            },



        };
        $(document).ready(Craousel.init.bind(Craousel));
        $(document).ready(ChooseoOneOption.init.bind(ChooseoOneOption));
        $(document).ready(chooseOneImage.init.bind(chooseOneImage));

    })(jQuery);
</script>