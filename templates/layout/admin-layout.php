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
    </style>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js') ?>

    <?php echo $this->element('Quiz-view/Styles/progress-bar'); ?>
    <?php echo $this->element('Quiz-view/Styles/quiz-view-style'); ?>
    <?php echo $this->element('Shorts/Styles/short-view-style'); ?>
    <?php echo $this->element('Quiz-create/Styles/quiz-create-style'); ?>
    <?php echo $this->element('Shorts/Styles/short-create-style'); ?>
</head>

<body class="poppins-medium ">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php echo $this->element('admin/aside'); ?>
            <div class="layout-page">
                <?php echo $this->element('admin/nav'); ?>
                <div class="content-wrapper">

                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                    <?php echo $this->element('admin/add-course'); ?>
                    <?php echo $this->element('admin/add-short'); ?>
                    <?php echo $this->element('admin/add-quiz'); ?>
                    <?php echo $this->element('admin/add-user'); ?>
                    <?php echo $this->element('admin/add-canvas', ['name' => "Learning Path", 'url' => "/learningpaths/add", "id" => "offcanvasEndAddLearningPath"]) ?>
                    <?php echo $this->element('admin/add-canvas', ['name' => "Learning Path", 'url' => "/learningpaths/add", "id" => "offcanvasEndEditLearningPath"]) ?>
                    <?php echo $this->element('admin/add-canvas', ['name' => "Learning Path", 'url' => "/users/add", "id" => "offcanvasEndCanDoS"]) ?>
                </div>

                <?php echo $this->element('Quiz-view/Elements/sounds-effects'); ?>
                <div class="layout-overlay layout-menu-toggle"></div>
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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <?php echo $this->element('Quiz-view/Scripts/globalFunctionQuizView'); ?>
                <script async defer src="https://buttons.github.io/buttons.js"></script>
                <?php echo $this->element('Quiz-create/Scripts/add-new-one'); ?>
                <?php echo $this->element('Shorts/Scripts/short-create-script'); ?>



</body>

</html>