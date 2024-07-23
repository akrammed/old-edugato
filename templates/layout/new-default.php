<?php $cakeDescription = 'CakePHP: the rapid development php framework'; ?>
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
            'globals',
            'custom',
        ]) ?>
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <?= $this->Html->script('jquery') ?>
    </head>
    <body>
        <div class="d-flex flex-column min-h-screen">
            <?= $this->fetch('navbar') ?>
            <?= $this->fetch('content') ?>
        </div>
        <?= $this->Html->script([
            'bootstrap.bundle.min',
            'fontawesome.min'
        ]) ?>
        <?= $this->fetch('script') ?>
    </body>
</html>