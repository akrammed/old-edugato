<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGato English Assistant</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
    <style>
    #chat1 .form-outline .form-control~.form-notch div {
        pointer-events: none;
        border: 1px solid;
        border-color: #eee;
        box-sizing: border-box;
        background: transparent;
    }

    #chat1 .form-outline .form-control~.form-notch .form-notch-leading {
        left: 0;
        top: 0;
        height: 100%;
        border-right: none;
        border-radius: .65rem 0 0 .65rem;
    }

    #chat1 .form-outline .form-control~.form-notch .form-notch-middle {
        flex: 0 0 auto;
        max-width: calc(100% - 1rem);
        height: 100%;
        border-right: none;
        border-left: none;
    }

    #chat1 .form-outline .form-control~.form-notch .form-notch-trailing {
        flex-grow: 1;
        height: 100%;
        border-left: none;
        border-radius: 0 .65rem .65rem 0;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading {
        border-top: 0.125rem solid #39c0ed;
        border-bottom: 0.125rem solid #39c0ed;
        border-left: 0.125rem solid #39c0ed;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading,
    #chat1 .form-outline .form-control.active~.form-notch .form-notch-leading {
        border-right: none;
        transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle {
        border-bottom: 0.125rem solid;
        border-color: #39c0ed;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle,
    #chat1 .form-outline .form-control.active~.form-notch .form-notch-middle {
        border-top: none;
        border-right: none;
        border-left: none;
        transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing {
        border-top: 0.125rem solid #39c0ed;
        border-bottom: 0.125rem solid #39c0ed;
        border-right: 0.125rem solid #39c0ed;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing,
    #chat1 .form-outline .form-control.active~.form-notch .form-notch-trailing {
        border-left: none;
        transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus~.form-label {
        color: #39c0ed;
    }

    #chat1 .form-outline .form-control~.form-label {
        color: #bfbfbf;
    }

    .chat-message {
        border-radius: 15px;
    }

    .chat-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .user-message {
        background-color: #e0e0e0;
    }

    .bot-message {
        background-color: rgba(57, 192, 237, 0.2);
    }

    .chat-avatar {
        width: 45px;
        height: 100%;
    }
    </style>
</head>

<body>
    <section>
        <div class="container py-5">

            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">

                    <div class="card" id="chat1" style="border-radius: 15px;">
                        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="fas fa-angle-left"></i>
                            <p class="mb-0 fw-bold">Live chat</p>
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="card-body">


                            <div id="chat-container">
                                <div id="chat-content">
                                    <div id="user"></div>
                                    <div id="bot"></div>
                                </div>
                            </div>


                            <div data-mdb-input-init class="form-outline">
                                <textarea class="form-control bg-body-tertiary" id="textAreaExample"
                                    rows="4"></textarea>
                                <label id="submitchat" class="form-label" for="textAreaExample"></label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>



    <script>
    $(document).ready(function() {
        $('#textAreaExample').keypress(function(event) {
            if (event.which == 13 && !event.shiftKey) {
                event.preventDefault();
                var message = $(this).val().trim();
                if (message) {
                    const prompt = $(this).val();
                    var userMessageTemplate = `
                        <div class="d-flex flex-row justify-content-end mb-4">
                            <div class="p-3 me-3 border bg-body-tertiary chat-message user-message">
                                <p class="small mb-0">${message}</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp" alt="avatar 1" class="chat-avatar">
                        </div>`;

                    $('#chat-content').append(userMessageTemplate);
                    $(this).val('');
                    axios.post('http://localhost:8000/generate', {
                            user_prompt: prompt
                        })
                        .then(function(response) {
                            var botMessageTemplate = `
                            <div class="d-flex flex-row justify-content-start mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" class="chat-avatar">
                                <div class="p-3 ms-3 border chat-message bot-message">
                                    <p class="small mb-0">${response.data.response.content}</p>
                                </div>
                            </div>`;
                            $('#chat-content').append(botMessageTemplate);
                        })
                        .catch(function(error) {
                            var errorMessageTemplate = `
                            <div class="d-flex flex-row justify-content-start mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" class="chat-avatar">
                                <div class="p-3 ms-3 border chat-message bot-message">
                                    <p class="small mb-0">Error: ${error.response.data.detail}</p>
                                </div>
                            </div>`;
                            $('#chat-content').append(errorMessageTemplate);
                        });
                }
            }
        });
    });
    </script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js">
    </script>
</body>

</html>