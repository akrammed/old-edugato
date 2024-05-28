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

$cakeDescription = 'EduGato';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_csrfToken" content="<?= $this->request->getAttribute('csrfToken') ?>">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    
    <?= $this->Html->meta('icon') ?>
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999998;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
    </style>

    <?= $this->Html->css([
        'default/app',
        'default/flash',
        'panel/sweetalert2/dist/sweetalert2.min',
        'panel/toast/jquery.toast.min',
        'panel/simplebar/simplebar',
        'panel/swiper/swiper-bundle.min',
        'panel/owl-carousel2/owl.carousel.min',

    ]) ?>
    <?= $this->Html->script([
        'panel/pace-loading/pace.min',
    ]) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->element('Script/jQuery') ?>
    <style>
        .montserrat-body {
            font-family: "Montserrat", sans-serif !important;
            font-optical-sizing: auto !important;
            font-weight: 300 !important;
            font-style: normal !important;
        }
    </style>
</head>

<body class="montserrat-body" style="color: #003F91 !important">
    <div id="app" class="" style="background-color:#fdf0f0 ">>
        <div id="overlay"></div>
        <?= $this->element('Lms.Default/navbar-main', [
            'currentSessionUser' => $currentSessionUser
        ]) ?>
        <?= $this->Flash->render() ?>
        <?php echo $this->element('popup'); ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('Lms.Default/footer') ?>
    </div>
    <?= $this->Html->script([

        'panel/sweetalert2/dist/sweetalert2.min',
        'panel/toast/jquery.toast.min',
        'panel/simplebar/simplebar.min',
        'panel/swiper/swiper-bundle.min',
        'panel/owl-carousel2/owl.carousel.min',
        'default/app',
        'panel/moment.min',
        'panel/parallax/parallax.min',
        'panel/flagstrap/js/jquery.flagstrap.min',
        'panel/lottie/lottie-player',
        'default/parts/home.min',
        'default/parts/main.min',
        'default/parts/navbar.min',
        'default/parts/top_nav_flags.min',
    ]) ?>
    <script>
        $(document).ready(function () {
            var popUpName = ""
            $(".show-popup").click(function () {
                popUpName = $(this).attr('data-popup');
                popUpToHide = $(this).attr('data-popupToHide');
                if ($('#popupContainer').is(":visible")) {
                    $(`#${popUpToHide}`).css('display', 'none');
                    $(`#${popUpName}`).css('display', 'block');
                    if(popUpName === "register-pop-up"){
                        $(`#popupContainer`).css('height', '700px');
                    }else{
                        $(`#popupContainer`).css('height', '500px');
                    }
                } else {
                    $('#popupContainer, #overlay').show().animate({ opacity: 1 }, 200);
                    $(`#${popUpName}`).css('display', 'block');
                }

            });
            $(document).mouseup(function (e) {
                var container = $('#popupContainer');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    if ($('#popupContainer').is(":visible")) {
                        $('#popupContainer, #overlay').animate({ opacity: 0 }, 200, function () {
                            $(this).hide();
                            $(`#${popUpName}`).css('display', 'none');
                        });
                    }
                }
            });

            $(".show-popup-white").click(function () {
                popUpName = $(this).attr('data-popup');
                popUpToHide = $(this).attr('data-popupToHide');
                if ($('#popupContainer-white').is(":visible")) {
                    $(`#${popUpToHide}`).css('display', 'none');
                    $(`#${popUpName}`).css('display', 'block');
                    if(popUpName === "register-pop-up"){
                        $(`#popupContainer-white`).css('height', '700px');
                    }else{
                        $(`#popupContainer-white`).css('height', '500px');
                    }
                } else {
                    $('#popupContainer-white, #overlay').show().animate({ opacity: 1 }, 200);
                    $(`#${popUpName}`).css('display', 'block');
                }

            });
            $(document).mouseup(function (e) {
                var container = $('#popupContainer-white');
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    if ($('#popupContainer-white').is(":visible")) {
                        $('#popupContainer-white, #overlay').animate({ opacity: 0 }, 200, function () {
                            $(this).hide();
                            $(`#${popUpName}`).css('display', 'none');
                        });
                    }
                }
            });
        });

    </script>
</body>

</html>
