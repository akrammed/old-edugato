<div class="container" id="2">
    <?= $this->element('avatar-with-bubbel', ['text' => "Choose the correct image"]) ?>
    <p style="margin-top:9% !important;">Upload correct image first</p>
    <div class="row row-cols-1 row-cols-md-2 g-2 mb-2" style="margin-bottom:22% !important;padding-right: 26%;
    padding-left: 26%;">
        <?php for ($i = 1; $i <= 4; $i++) : ?>
            <div class="col d-flex justify-content-center">
            <div id="correct-frame" <?php if ($i != 1) echo 'style="border: 4px solid var(--Outline-Decorative, #CBD4E1);"'; ?>>
            <svg xmlns="http://www.w3.org/2000/svg" id="option-image-<?= $i ?>" width="78" height="77" viewBox="0 0 78 77" fill="none">
                        <path d="M25.4922 50.7689L29.4335 46.669C30.1263 45.9475 31.2903 45.9632 31.9609 46.7033L35.2222 50.288C35.918 51.0532 37.1391 51.0343 37.816 50.2476L44.563 42.3846C45.2208 41.6165 46.4071 41.579 47.1126 42.3034L52.4995 47.815" stroke="#728197" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M44.8035 9.62511C46.616 9.62511 48.3525 10.3527 49.6083 11.6454L61.9288 24.3171C63.1215 25.5411 63.7858 27.1743 63.7858 28.873V55.0656C63.8332 61.6638 58.576 67.1064 51.9015 67.375L26.1438 67.3718C19.4062 67.2252 14.0667 61.7168 14.2154 55.0656V21.3568C14.3736 14.8149 19.8048 9.59701 26.4348 9.62511H44.8035Z" stroke="#728197" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M46.376 9.82544V19.1059C46.3731 23.6337 50.0865 27.3122 54.6762 27.3215H63.5776" stroke="#728197" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M30.0787 35.9077H29.8708M30.034 36.7393C29.566 36.7393 29.1865 36.3646 29.1865 35.9026C29.1865 35.4406 29.566 35.0662 30.034 35.0662C30.5021 35.0662 30.8815 35.4406 30.8815 35.9026C30.8815 36.3646 30.5021 36.7393 30.034 36.7393Z" stroke="#728197" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <div id="show-image-<?= $i ?>" class="d-none"></div>
                    <div class="d-none">
                        <?= $this->Form->control('image', [
                            'type' => 'file',
                            'label' => false,
                            'class' => 'd-none',
                            'id' => 'image' . $i
                        ]) ?>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>