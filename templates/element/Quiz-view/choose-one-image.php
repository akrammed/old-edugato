<div class="quiz-body">

    <div class="container">

        <div class="row">

            <div class="content" style="margin-top: 1%;">
                <div class="conversation">
                    <div class="avatar-container">
                        <?php echo $this->element('icons/monkey'); ?>
                        <?php echo $this->element('icons/talikng-bubbls'); ?>
                        <h2 class="avatar-question avatar-question-image"><?= $questions[0]['question'] ?> </h2>
                    </div>
                </div>
            </div>
            <div class="options">
                <div class="container image-groupe">
                    <div class="row images-quiz-row">
                        <?php
                            $i = 0;
                            foreach ($options as $key => $value) {
                                if ($value->is_correct == 1) {
                                    $correctImg = $i;
                                    $correct = 'Option-' . $key;
                                }
                                echo '<div class="col-sm-4  image-card" >';
                                echo  $this->Html->image('/img/uploads/picture/' . $value->qoption, ['alt' => 'Option ' . $key, 'id' => 'Option-' . $key, 'class' => 'Option-' . $key . ' image-view clickable img-custom img-option']);
                                echo '</div>';
                                $i++;
                            };
                            ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </section>
</div>
