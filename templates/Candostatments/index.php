<div class="flex-grow-1 d-flex flex-column" id="scContent">
    <div class="flex-grow-1 d-flex flex-column flex-xl-row gap-4">
        <div class="flex-grow-1 card overflow-hidden d-flex flex-column">
            <section class="flex-grow-1 p-8" id="section">
                <div id="take-quiz-2">
                    <h3 class="text-xl mb-8">Manage Can Do Statemnts For : <?= $learningpath->path ?> <span></span></h3>
                    <div class="d-flex align-items-center text-lg gap-2 mb-8">
                        <?= $this->element('icons/plus', ['class' => 'w-12 h-12 color-primary']) ?>
                        <button class="btn-reset color-primary" data-bs-toggle="modal" data-bs-target="#modalAddCanDo">
                           Add can do statment
                        </button>
                        <p> Or </p>
                        <button class="btn-reset color-primary">Preview path</button>
                    </div>
                    <div class="d-flex flex-column gap-4">
                        <?php
                        $i = 1;
                        foreach ($candostatments as $cd) {
                            echo $this->element('candostatment-line', ['type' => "candostatments", 'cd' => $cd, 'i' => $i]);
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <div class="min-w-20 flex-shrink-0 d-flex flex-xl-column" style="min-height: 220px;">
            <div class="card rounded-rem-1" style="flex-basis: 70%;">
            </div>
        </div>
    </div>
</div>
<?= $this->element('modals/add-cando', ['candostatment' => $candostatment, 'id' => $learningpath->id]) ?>