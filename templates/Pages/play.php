<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y content-container">
        <div class="row" id="section-1">
            <div class="card ai-chat-card">
                <div class="card-body">
                    
                </div>


                <div class="input-container">
                    <input class="ai-input-chat" type="text" placeholder="Type a message or use the microphone...">
                    <svg class="input-icon" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="12.75" fill="#B3BEFF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M25.4375 17.4174C25.4365 17.0277 25.1234 16.7133 24.7364 16.7133H24.7346C24.3476 16.7142 24.0345 17.0305 24.0354 17.4212C24.0429 20.7802 21.336 23.5198 18.0047 23.5301C18.0028 23.5301 18.0019 23.5292 18 23.5292H17.9972C16.382 23.5236 14.8659 22.8871 13.7265 21.7339C12.5862 20.5806 11.9608 19.048 11.9646 17.4212C11.9655 17.0315 11.6524 16.7142 11.2654 16.7133H11.2636C10.8775 16.7133 10.5635 17.0277 10.5625 17.4174C10.5578 19.4217 11.328 21.3093 12.7329 22.7309C13.9714 23.9839 15.5716 24.7399 17.299 24.9056V26.9165C17.299 27.3062 17.613 27.6225 18 27.6225C18.3879 27.6225 18.701 27.3062 18.701 26.9165V24.9046C22.4829 24.5384 25.4468 21.3187 25.4375 17.4174Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.9983 21.3215H18.003C20.1491 21.3159 21.8923 19.5526 21.8877 17.3911V13.4154C21.8877 11.2567 20.1435 9.5 17.9993 9.5C15.856 9.5 14.1118 11.2567 14.1118 13.4154V17.3901C14.11 18.4379 14.5128 19.4236 15.2466 20.1664C15.9803 20.9092 16.958 21.3196 17.9983 21.3215Z"
                            fill="white" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
.ai-chat-card {
    width: 98%;
    margin-left: 1%;
    height: 600px;
}

.input-container {
    position: absolute;
    width: 80%;
    left: 10%;
    top: 80%;
    display: flex;
    align-items: center;
    background-color: #F6F8FB;
    border-radius: 16px;
    padding: 0 12px; /* Padding for some spacing between input and icon */
}

.ai-input-chat {
    flex: 1;
    border: none;
    border-radius: 16px;
    height: 60px;
    background-color: #F6F8FB;
    padding-left: 10px;
    outline: none;
}

.input-icon {
    cursor: pointer;
}

</style>