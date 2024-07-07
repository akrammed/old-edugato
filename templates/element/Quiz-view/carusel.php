<div class="container">
    <?= $this->element('avatar-with-bubbel', ['text' => "Can you name this images"]) ?>

    <div class="row row-cols-1 row-cols-md-3 g-2 mb-2" style="padding:5% 10% 10% 10%;" id="imageCards">
    
        <?php
        
        for ($i=0; $i < 5; $i++) { 
            echo $this->element('Quiz-view/Elements/card-upload-image',['id' => $i]);
        }

        ?>
      

        <?= $this->element('Quiz-view/Elements/add-new') ?>


    </div>

</div>
