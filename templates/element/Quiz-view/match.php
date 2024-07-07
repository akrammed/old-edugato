<div class="container" id="4">
<?= $this->element('avatar-with-bubbel', ['text' => "Tap the words to order"]) ?>
    <div class="row" id="fields">
        <div class="col" id="options">
            <?php for ($i = 1; $i < 4; $i++) { ?>
            <input id="type-option-<?= $i ?>" class="option" type="text" placeholder="type option 1 here..">
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
            <input type="text" class="type-match" id="type-match-1" placeholder="type match 1 here..">
            <input type="text" class="type-match" id="type-match-2" placeholder="type match 2 here..">
        </div>
        <div class="col" id="match" style="align-items: flex-start !important; margin-right: 7%;">
            <input type="text" class="type-match" id="type-match-3" placeholder="type match 3 here..">
        </div>
    </div>
   
</div>