<script>
(function($) {
    let i = 4;
    let wordIndex = 0;
    let conversationIndex = 3;
    let isInitialized = false;
    let imageWithCorrectWord = [];
    let arrayToSendCraousel = [];
    let arrayCorrectWords = [];
    let arrayExtraWords = [];
    let wordLr = null;
    let conversationSpeackingArray = [];


    $(document).on('click', '#cancel-quiz-create', function() {
        arrayToSendCraousel = [];
        arrayCorrectWords = [];
        arrayExtraWords = [];
        wordLr = null;
    });
    $(document).on('change', '#upload-short', function() {
        const shortId = $("#shortId").val();
        const short = $('#upload-short')[0].files[0];
        formDataQuiz.append('short', short);
        formDataQuiz.append('shortId', shortId);

    })

    const Craousel = {

        init() {
            $(document).on('click', '.addNewImage', this.handleClick.bind(this));
            $(document).on('click', '[id^="browseBtn"]', this.uploadImages.bind(this));
            $(document).on('change', '[id^="image"]', this.placeImage.bind(this));
            $(document).on('input', '[id^="wordInput"]', this.handleWordInput.bind(this));
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

            const newElement = $(
                `<?= $this->element('Quiz-view/Elements/card-upload-image', ['id' => '${i}']) ?>`);

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

        },

    };
    const ChooseoOneOption = {
        
        init() {
            $(document).on('input', '[id^="chooseOption"]', this.inputDynamically.bind(this));
            $(document).on('input', '[id^="chooseOption"]', this.handleWordInput1.bind(this));
           
        },
        inputDynamically(event) {
            const input = $(event.target);
            var minWidth = 80;
            var maxWidth = 300;
            var newWidth = (input.val().length + 1) * 9
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
    const listAndOrder = {
        init() {
            $(document).on('click', '#addCorrectWord', this.addNewWordCorrect.bind(this));
            $(document).on('click', '#addExtraWord', this.addNewExtraWord.bind(this));
            $(document).on('click', '[id^="deleteWord"]', this.deleteWord.bind(this));
            $(document).on('click', '#clearInput', this.clearInput.bind(this));
            $(document).on('click', '#browseAudioLO', this.uploadAudio.bind(this));
            $(document).on('change', '#audioQuizListenOrder', this.addAudioToForm.bind(this));
            //browseAudioLO

        },
        uploadAudio(event) {

            $(`#audioQuizListenOrder`).click();

        },
        addAudioToForm(event) {
            const audio = $('#audioQuizListenOrder')[0].files[0];
            formDataQuiz.append('audio', audio);
            $('#upContainerLO').removeClass('d-flex').addClass('d-none');
            // $('.borderContour').css('width','fit-content !important');
            // Use a FileReader to create a temporary URL
            const reader = new FileReader();
            reader.onload = function(e) {
                $("#audioLO").attr('src', e.target.result);

                // Play the audio
                $('#audioLO')[0].play().catch(error => {
                    console.error('Error playing audio:', error);
                    // Potentially provide user feedback (e.g., "Audio playback failed")
                });

                $('#AudioContainerLO').removeClass('d-none').addClass('d-flex');
            };
            reader.readAsDataURL(audio);
        },

        clearInput(event) {
            $('#newWord').val('');
        },
        addNewWordCorrect(event) {
            event.preventDefault();
            const newWord = $('#newWord').val();
            if (newWord) {
                const newElement = $(`<div class="word m-1 position-relative" style="background:  #17BF33;" id=word${wordIndex}>
                    <button id="deleteWord${wordIndex}" z-index:9999999; style="border:none; margin-top:-18px; background:none;font-style: bold; font-weight:600;"  class="position-absolute  top-0 end-0 text-danger"><?= $this->element('icons/delete', ['color' => 'red']); ?></button>
                    <h5 class="wordText" id="h5Word${wordIndex}">${newWord}</h5>
                
                    </div>`);
                wordIndex++;
                arrayCorrectWords.push(newWord);
                $('.correctWordDiv').append(newElement);
                $('#newWord').val('');
            }
        },
        addNewExtraWord(event) {
            event.preventDefault();
            const newWord = $('#newWord').val();
            if (newWord) {
                const newElement = $(`<div class="word m-1 position-relative" style="background:  #F14A58;" id=word${wordIndex}>
                    <button id="deleteWord${wordIndex}" style="border:none; z-index:999999; margin-top:-18px; background:none;font-style: bold; font-weight:600;"  class="position-absolute  top-0 end-0 text-danger"><?= $this->element('icons/delete', ['color' => 'red']); ?></button>
                    <h5 class="wordText" id="h5Word${wordIndex}">${newWord}</h5>
                
                    </div>`);
                wordIndex++;
                arrayExtraWords.push(newWord);
                $('.extraWordsDiv').append(newElement);
                $('#newWord').val('');
            }
        },

        deleteWord(event) {
            const button = $(event.target).closest('button'); // Find the closest parent button
            const buttonId = button.attr('id');

            // 2. Check if the button is found and matches the pattern
            if (buttonId && buttonId.match(/deleteWord(\d+)/)) {
                const number = buttonId.match(/deleteWord(\d+)/)[1];
                const word = $(`#h5Word${number}`).text();
                const index = arrayExtraWords.indexOf(word);
                if (index > -1) {
                    arrayExtraWords.splice(index, 1);
                } else {
                    const index = arrayCorrectWords.indexOf(word);
                    if (index > -1) {
                        arrayCorrectWords.splice(index, 1);
                    }
                }
                $(`#word${number}`).remove();
            }

        },
   

    };

    const listAndRepeat = {
        init() {
            
            $(document).on('click', '#browseAudioLR', this.uploadAudio.bind(this));
            $(document).on('change', '#audioQuizLR', this.addAudioToForm.bind(this));
            $(document).on('click', '#wordLR', this.addInputValueToForm.bind(this));
            //browseAudioLO

        },
        uploadAudio(event) {
            $(`#audioQuizLR`).click();
        },
        addAudioToForm(event) {
            const audio = $('#audioQuizRP')[0].files[0];
            formDataQuiz.append('audio', audio);
            $('#upContainerRP').removeClass('d-flex').addClass('d-none');

            const reader = new FileReader();
            reader.onload = function(e) {
                $("#audioRP").attr('src', e.target.result);

                $('#audioRP')[0].play().catch(error => {
                    console.error('Error playing audio:', error);

                });

                $('#AudioContainerRP').removeClass('d-none').addClass('d-flex');
            };
            reader.readAsDataURL(audio);
        },
        addInputValueToForm(event) {
            const newWord = $('#wordLR').val();
            if (newWord) {
                wordLr = newWord;
            }
        },

       };

    const conversationSpeacking = {
        init() {
            
            $(document).on('click', '#addConvBtn', this.addConversation.bind(this));
            $(document).on('click', '[id^="deleteConversation"]', this.deleteConversation.bind(this));
            $(document).on('change', '[id^="response"]', this.storeConversation.bind(this));
            //browseAudioLO
        },

        addConversation(event) {
            const newElement = `<div class="d-flex justify-content-between mt-2" id="conversation${conversationIndex}">
                <div class="d-flex " >
                    <button id="deleteConversation${conversationIndex}" class="position-absolute left-0" style="background:none; border:none;"><?= $this->element('icons/delete', ['color' => "red"]); ?></button>
                    <input id="qustion${conversationIndex}" class="wordAudio send" type="text" placeholder="type option 1 here..">
                </div>
                <div class="">
                    <input id="response${conversationIndex}" class="wordAudio recive" type="text" placeholder="type option 1 here..">
                </div>
            </div>`;
            conversationIndex++;
            $(`.conversationsContainer`).append(newElement);

        },

        storeConversation(event) {
            const inputId = $(event.target).closest('input').attr('id');
            const number = inputId.match(/response(\d+)/)[1];
            const question = $(`#qustion${number}`).val();
            const response = $(`#response${number}`).val();
            if (question && response) {
                conversationSpeackingArray[number] = {
                    question,
                    response
                };
            }

        },

        deleteConversation(event) {
            const button = $(event.target).closest('button');
            const buttonId = button.attr('id');


            if (buttonId && buttonId.match(/deleteConversation(\d+)/)) {
                const number = buttonId.match(/deleteConversation(\d+)/)[1];
                conversationSpeackingArray[number] = undefined;
                $(`#conversation${number}`).remove();
            }

        },
    }

    $(document).ready(Craousel.init.bind(Craousel));
    $(document).ready(ChooseoOneOption.init.bind(ChooseoOneOption));
    $(document).ready(chooseOneImage.init.bind(chooseOneImage));
    $(document).ready(listAndOrder.init.bind(listAndOrder));
    $(document).ready(listAndRepeat.init.bind(listAndRepeat));
    $(document).ready(conversationSpeacking.init.bind(conversationSpeacking));
})(jQuery);
</script>