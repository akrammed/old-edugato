<section class="d-flex flex-column bg-light">
    <div class="container-xl position-relative flex-grow-1 d-flex flex-column justify-content-center align-items-center text-center" style="min-height: 100dvh">
        <?= $this->Html->image('hero-bg.png', ['class' => 'h-auto w-100 position-absolute z-0', 'style' => 'max-height: calc(100dvh - 120px); object-fit: contain']) ?>
        <div class="position-relative z-1 d-flex flex-column align-items-center gap-4">
            <?= $this->Html->image('cat.png', ['class' => 'w-auto', 'height' => '280px']) ?>
            <h1 class="text-6xl">Learn English Differently!</h1>
            <p class="color-muted max-w-xl text-lg">Watch engaging video lessons and take interactive quizzes for an immersive and fun learning experience.</p>
            <a href="<?= $this->Url->build('/login') ?>" class="btn btn-secondary btn-lg mt-4">Start Learning</a>
        </div>
    </div>
</section>