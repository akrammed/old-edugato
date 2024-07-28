<?php $cakeDescription = 'Edugato'; ?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_csrfToken" content="<?= $this->request->getAttribute('csrfToken') ?>">
        <title><?= $cakeDescription  ?></title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css([
            'normalize.min',
            'bootstrap.min',
            'fontawesome.min',
            'custom',
            'globals',
        ]) ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php if ($this->fetch('sidebar')): ?>
            <div class="d-flex <?= isset($altBackground) && $altBackground ? 'bg-background-alt' : '';?>">
                <?= $this->fetch('sidebar') ?>
                <div class="d-flex flex-column min-h-screen flex-grow-1 pl-xl-60">
                    <?= $this->fetch('navbar') ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        <?php else: ?>
        <div class="d-flex flex-column min-h-screen <?= isset($altBackground) && $altBackground ? 'bg-background-alt' : '';?> ">
            <?= $this->fetch('navbar') ?>
            <?= $this->fetch('content') ?>
        </div>
        <?php endif; ?>
        <?= $this->Html->script([
            'bootstrap.bundle.min',
            'fontawesome.min'
        ]) ?>
        <?= $this->fetch('script') ?>
    </body>
</html>