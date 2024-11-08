<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y content-container">

        <div class="row" id="section-2">
            <div class="card ai-chat-card">
                <div class="card-body">
                    <div class="row">
                        <h1 class="play-with-gato-title">Play with Gato</h1>
                    </div>
                    <div class="row select-bot-user-row">
                        <div class="col-sm-6">
                            <h1 class="sub-play-with-gato-title">Play against <br> AI bot</h1>
                            <button id="play-bot" class="select-bot">Select</button>
                        </div>
                        <div class="col-sm-6">
                            <h1 class="sub-play-with-gato-title">Play against <br> another user</h1>
                            <button class="select-user">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="section-1" style="display: none;">


            <div class="card ai-chat-card">
                <div class="row">
                    <h1 class="play-with-gato-title">Play with Gato</h1>
                </div>
                <div id="topics-container" style="display: none;">
                    <h2>Select a Topic:</h2>
                    <div id="topics-list"></div>
                </div>
                <div class="card-body chat-body" id="chat1">
                    <div id="chat-container">
                        <div id="chat-content">
                            <div id="user"></div>
                            <div id="bot"></div>
                        </div>
                    </div>
                </div>
                <div class="input-container">
                    <input class="ai-input-chat" id="textAreaExample" type="text" placeholder="Type a message or use the microphone...">
                    <svg class="input-icon" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="12.75" fill="#B3BEFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4375 17.4174C25.4365 17.0277 25.1234 16.7133 24.7364 16.7133H24.7346C24.3476 16.7142 24.0345 17.0305 24.0354 17.4212C24.0429 20.7802 21.336 23.5198 18.0047 23.5301C18.0028 23.5301 18.0019 23.5292 18 23.5292H17.9972C16.382 23.5236 14.8659 22.8871 13.7265 21.7339C12.5862 20.5806 11.9608 19.048 11.9646 17.4212C11.9655 17.0315 11.6524 16.7142 11.2654 16.7133H11.2636C10.8775 16.7133 10.5635 17.0277 10.5625 17.4174C10.5578 19.4217 11.328 21.3093 12.7329 22.7309C13.9714 23.9839 15.5716 24.7399 17.299 24.9056V26.9165C17.299 27.3062 17.613 27.6225 18 27.6225C18.3879 27.6225 18.701 27.3062 18.701 26.9165V24.9046C22.4829 24.5384 25.4468 21.3187 25.4375 17.4174Z" fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9983 21.3215H18.003C20.1491 21.3159 21.8923 19.5526 21.8877 17.3911V13.4154C21.8877 11.2567 20.1435 9.5 17.9993 9.5C15.856 9.5 14.1118 11.2567 14.1118 13.4154V17.3901C14.11 18.4379 14.5128 19.4236 15.2466 20.1664C15.9803 20.9092 16.958 21.3196 17.9983 21.3215Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .play-with-gato-title {
        text-align: center;
        color: black;
        margin-top: 5%;
    }

    .ai-chat-card {
        width: 98%;
        margin-left: 1%;
        height: 600px;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .chat-body {
        flex: 1;
        overflow-y: auto;
        padding: 10%;
        padding-bottom: 80px;
        margin-bottom: 10%;
    }

    .input-container {
        display: flex;
        align-items: center;
        background-color: #F6F8FB;
        border-radius: 16px;
        padding: 0 12px;
        height: 60px;
        position: absolute;
        bottom: 10px;
        left: 10%;
        width: 80%;
    }

    .ai-input-chat {
        flex: 1;
        border: none;
        border-radius: 16px;
        background-color: #F6F8FB;
        padding-left: 10px;
        outline: none;
    }

    .input-icon {
        cursor: pointer;
    }

    .chat-avatar {
        width: 45px;
        height: 100%;
    }

    .chat-message {
        border-radius: 15px;
    }

    .user-message {
        background-color: #e0e0e0;
    }

    .bot-message {
        background-color: rgba(57, 192, 237, 0.2);
    }

    .select-bot-user-row {
        display: flex;
        align-content: center;
        align-items: center;
        height: 50%;
    }

    .sub-play-with-gato-title {
        color: black;
        text-align: center;
        width: 50%;
        background-color: #E4E4E4;
        padding: 4%;
        margin: 25%;
        font-size: 24px;
        margin-bottom: 5%;
        margin-top: 0%;
    }

    .select-user {
        width: 12%;
        height: 40px;
        color: white;
        background-color: black;
        position: absolute;
        left: 68%;
    }

    .select-bot {
        width: 12%;
        height: 40px;
        color: white;
        background-color: black;
        position: absolute;
        left: 20%;
    }
    .topic-select-item{
        cursor: pointer;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/markdown@0.5.0/lib/markdown.min.js"></script>
<script>
    $(document).ready(function() {
        $('#section-1').hide();
        $('#section-2').show();

        var currentSection = 1;

        $('#play-bot').on('click', function() {
            $('#section-2').hide();
            $('#section-1').show();

            axios.post('http://127.0.0.1:8000/generate', {
                    user_prompt: "Please suggest 4 topics for a quiz game."
                })
                .then(function(response) {
                    var responseData = response.data.response;
                    if (responseData.hasOwnProperty('content')) {
                        var content = responseData['content'];
                        if (typeof content === 'string') {

                            $('#topics-list').html(`<ul>${topicsHtml}</ul>`);
                            var topics = content.split('\n');
                            var topicsHtml = topics.filter(function(topic) {
                                return /^\d/.test(
                                    topic);
                            }).map(function(topic) {
                                return `<li class="topic-select-item">${topic}</li>`;
                            }).join('');
                            $('#topics-container').show();

                            $('#topics-container').show();
                            console.log('Generated topics HTML:', topicsHtml);
                            $('#topics-list').html(`<ul>${topicsHtml}</ul>`);
                            console.log('Generated topics HTML:', topicsHtml);





                            console.log('Content of #topics-list:', $('#topics-list').html());
                            $('.topic-select-item').on('click', function() {
                                var selectedTopic = $(this).text();
                                $('#topics-container').hide();
                                startGame(selectedTopic);
                            });
                        } else {
                            console.error("Unexpected 'content' type:", typeof content);
                        }
                    } else {
                        console.error("Response data format unexpected:", responseData);
                    }
                })
                .catch(function(error) {
                    console.error("API error:", error);
                });
        });

        function startGame(topic) {
            console.log(topic)
            axios.post('http://127.0.0.1:8000/select_topic', {
                    topic: topic
                })
                .then(function(response) {
                    var question = response.data.question;
                    showQuestion(question);
                })
                .catch(function(error) {
                    console.error("API error:", error);
                });
        }

        function showQuestion(question) {
            console.log(question)
            var botMessageTemplate = `
            <div class="d-flex flex-row justify-content-start mb-4">
                <div class="p-3 ms-3 border chat-message bot-message">
                    <p class="small mb-0">${question}</p>
                </div>
            </div>`;
            $('#chat-content').append(botMessageTemplate);
            $("#chat1").scrollTop($("#chat1")[0].scrollHeight);
        }

        $('#textAreaExample').keypress(function(event) {
            if (event.which == 13 && !event.shiftKey) {
                event.preventDefault();
                var message = $(this).val().trim();
                if (message) {
                    var userMessageTemplate = `
                    <div class="d-flex flex-row justify-content-end mb-4">
                        <div class="p-3 me-3 border bg-body-tertiary chat-message user-message">
                            <p class="small mb-0">${message}</p>
                        </div>
                    </div>`;
                    $('#chat-content').append(userMessageTemplate);
                    $(this).val('');

                    if (currentSection === 1) {
                        console.log(message);
                        axios.post('http://127.0.0.1:8000/next_question', {
                                user_answer: message
                            })
                            .then(function(response) {
                                var question = response.data.question ? response.data.question :
                                    response.data.response;
                                showQuestion(question);
                                if (response.data.response ===
                                    "Game over. You have answered all the questions.") {
                                    currentSection = 2;
                                    $('#section-1').hide();
                                    $('#section-2').show();
                                }
                            })
                            .catch(function(error) {
                                console.error("API error:", error);
                            });
                    }
                }
            }
        });
    });
</script>