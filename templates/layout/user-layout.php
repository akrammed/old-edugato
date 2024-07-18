<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Edugato';
?>
<!DOCTYPE html>
<html>



<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_csrfToken" content="<?= $this->request->getAttribute('csrfToken') ?>">
    <title>
        <?= $cakeDescription  ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <?= $this->Html->css([
        'default-layout/vendor/fonts/boxicons',
        'default-layout/vendor/css/core',
        'default-layout/vendor/css/pages/page-auth',
        'default-layout/css/demo',

    ]) ?>
    <?= $this->Html->script([
        'default-layout/vendor/js/helpers',
        'default-layout/js/config',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script>
        const formDataQuiz = new FormData();
    </script>
    <style>
        .poppins-medium {
            font-family: "Poppins", sans-serif !important;
            font-weight: 700;
            font-style: normal !important;
            color: #27313F !important;
        }

        .btn-primary {
            color: #fff;
            background-color: #696cff;
            border-color: #696cff;
            box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
        }
    </style>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js') ?>

</head>

<body class="poppins-medium ">

    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <?php echo $this->element('Quiz-view/Elements/sounds-effects'); ?>
    <div class="layout-overlay layout-menu-toggle"></div>
    <?= $this->Html->script([
        'default-layout/vendor/libs/jquery/jquery',
        'default-layout/vendor/libs/popper/popper',
        'default-layout/vendor/js/bootstrap',
        'default-layout/vendor/js/menu',
        'default-layout/js/main',
    ]) ?>



</body>

</html>