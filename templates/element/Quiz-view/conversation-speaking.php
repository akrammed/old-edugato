<div class="container">
    <?= $this->element('avatar-with-bubbel', ['text' => "Listen and order the words"]) ?>
    <div class="row d-flex  mt-5 conversationsContainer">
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <div class="d-flex justify-content-between mt-2" id="conversation<?=$i?>">
                <div class="d-flex ">
                    <button class="position-absolute left-0" id="deleteConversation<?=$i?>" style="background:none; border:none;"><?= $this->element('icons/delete', ['color' => "red"]); ?></button>
                    <input id="qustion<?= $i ?>" class="wordAudio send" type="text" placeholder="type option 1 here..">
                </div>
                <div class="">
                    <input id="response<?= $i ?>" class="wordAudio recive" type="text" placeholder="type option 1 here..">
                </div>
            </div>

        <?php  } ?>


    </div>
    <?= $this->Form->control('conversation', ['label' => false, 'class' => 'd-none', 'id' => 'conversationInput']) ?>

    <div class="d-flex justify-content-end mt-5">
        <button class="browseBtn" id="addConvBtn">Add Conversation</button>
    </div>
    <?= $this->Form->control('quiz_type', [
                'type' => 'hidden',
                'value' => '8',
                'id' => 'quiz_type',
            ]) ?>
    <style>
        .send {
            background: #C0D3F9 !important;

        }

        .recive {
            background: #DEE4ED !important;
        }

        .browseBtn {
            padding: 10px;
            border-radius: 9.117px;
            background: #5C17E5;
            color: white;
            border: none;
            font-size: 16px;


        }

        .wordAudio {
            text-align: center;
            /* gap: 12px; */
            color: black;
            /* Label/Large */
            /* font-size: 16px; */
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            /* 150% */
            border-radius: 16px;
            border: 1px solid #9AA8BC;

            /* Elevation/Small */
            box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.16);
        }
    </style>