<div class="container" id="4">
    <p class="part-2"><strong>Quiz question goes here:</strong> Click on bubble to edit</p>

    <div class="title">
        <?= $this->element('icons/avatar') ?>
        <?= $this->element('icons/talikng-bubbls') ?>
        <input type="text" class="text" value="Tap the words to match">
    </div>
    <div class="row" id="fields">
        <div class="col" id="options">
            <?php for ($i = 1; $i < 4; $i++) { ?>
            <input id="<?= $i ?>" class="option" type="text" placeholder="type option 1 here..">
            <?php  } ?>
        </div>
        <div class="col" id="empties">
            <?php for ($i = 1; $i < 4; $i++) { ?>
            <div class="empty"></div>
            <?php  } ?>
        </div>
    </div>
    <div class="row" id="matches">
        <div class="col" id="match">
            <input type="text" class="type-match" placeholder="type match 1 here..">
            <input type="text" class="type-match" placeholder="type match 2 here..">
        </div>
        <div class="col" id="match" style="align-items: flex-start !important; margin-right: 7%;">
            <input type="text" class="type-match" placeholder="type match 3 here..">
        </div>
    </div>
   
</div>