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
        'default-layout/vendor/css/theme-default',
        'default-layout/css/demo',
        'default-layout/vendor/libs/perfect-scrollbar/perfect-scrollbar',
        'default-layout/vendor/libs/apex-charts/apex-charts',

        ]   ) ?>
    <?= $this->Html->script([
    'default-layout/vendor/js/helpers',
    'default-layout/js/config',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
    .poppins-medium {
        font-family: "Poppins", sans-serif !important;
        font-weight: 700;
        font-style: normal !important;
        color: #27313F !important;
    }
    </style>
</head>

<body class="poppins-medium ">
    <div id="app" class="">

        <?= $this->fetch('content') ?>

    </div>
    <?= $this->Html->script([

    'default-layout/vendor/libs/jquery/jquery',
    'default-layout/vendor/libs/popper/popper',
    'default-layout/vendor/js/bootstrap',
    'default-layout/vendor/libs/perfect-scrollbar/perfect-scrollbar',
    'default-layout/vendor/js/menu',
    'default-layout/vendor/libs/apex-charts/apexcharts',
    'default-layout/js/main',
    'default-layout/js/dashboards-analytics'
    ]) ?>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>