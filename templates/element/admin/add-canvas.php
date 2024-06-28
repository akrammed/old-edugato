<div class="offcanvas offcanvas-end" tabindex="-1" id=<?=$id?> aria-labelledby="offcanvasEndLabel" style="width:60%">
    <div class="offcanvas-header">
        <h5 id="offcanvasEndLabel" class="offcanvas-title text-dark" style="font-weight: 600;">Add <?= $name ?></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body ">
      
    <iframe src="<?php echo $this->Url->build("$url"); ?>" width="100%" height="90%" frameborder="0"></iframe>

    </div>
</div>