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

$cakeDescription = 'Lms';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'panel/app', 'panel/font', 'panel/panel',
        'panel/apexcharts/apexcharts',
        'panel/chartjs/chart.min',
        'panel/sweetalert2/dist/sweetalert2.min',
        'panel/toast/jquery.toast.min',
        'panel/jquery.minicolors'
        ]   ) ?>
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

<body class="montserrat-body">
    <div id="panel_app">

        <?= $this->element('Lms.Panel/nav')?>

        <div class="d-flex justify-content-end">
            <?= $this->element('Lms.Panel/xs-panel-nav') ?>
            <?php echo $this->element('admin-popup'); ?>

            <?= $this->element('Lms.Panel/panel-sidebar') ?>
            <?= $this->fetch('content') ?>

        </div>


        <?= $this->element('Lms.Panel/ai-content') ?>
        <div class="ai-content-generator-drawer-mask"></div>

    </div>




    <?= $this->Html->script([
    'panel/owl-carousel2/owl.carousel.min',
    'panel/toast/jquery.toast.min',
    'panel/apexcharts/apexcharts.min',
    'panel/chartjs/chart.min',
    'panel/feather-icons/dist/feather.min',
    'panel/pace-loading/pace.min',
    'panel/simplebar/simplebar.min',
    'panel/sweetalert2/dist/sweetalert2.min',
    'panel/panel/ai-content-generator.min',
    'panel/app',
    'panel/moment.min', 
    'panel/parts/main.min',
    'panel/parts/navbar.min',
    'panel/panel/public.min',
    'panel/jquery.minicolors',
    ]) ?>
    <script>
    var popUpName = "";
    var popupScripts = {

                   'add-video-pop-up': function () {
                let chapterId = $(`#chaId`).val();
                let lessonId = $('#lId').attr('value');
                var cahpterVideo = null;
                if (chapterId != null) {
                    $(`#chapterTitle`).val($(`#t${chapterId}`).val());
                } else {
                    $(`#chapterTitle`).val($(`#txt${lessonId}`).val());
                }
                $.ajax({
                    url: `<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Chapters',
                        'action' => 'getVideoChapter',

                    ]) ?>`,
                    method: 'GET',
                    data:{
                        chapterId
                    },
                    dataType: 'json',
                    success: function (response) {
                        cahpterVideo = response.video
                    },
                    error: function (xhr, status, error) {
                        console.error(status);
                    }
                })
                $.ajax({
                    url: `<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Chapters',
                        'action' => 'getAllVideos'
                    ]) ?>`,
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        $('#selectForVideo').html("<option >Select Video<option>");
                        for (const video in response.videos) {
                            if(cahpterVideo == response.videos[video]){
                                $('#selectForVideo').append(`<option selected value="${response.videos[video]}">${response.videos[video]}</option>`)
                            }else{
                                $('#selectForVideo').append(`<option  value="${response.videos[video]}">${response.videos[video]}</option>`)
                            }

                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(status);
                    }
                })
            },
        'add-course-pop-up': function() {
            $.ajax({
                url: `<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Courses',
                        'action' => 'levels'
                    ]) ?>`,
                type: 'GET',
                method: 'get',
                success: function(data) {

                    let content = ``;
                    for (var i in data.levels) {

                        content +=
                            `<option value="${data.levels[i].id}">${data.levels[i].level}</option>`
                    }
                    $(`#levelSelect`).html(content);
                },
                error: function(error) {
                    console.log('Error:', error);
                }

            });
            $.ajax({
                url: `<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Courses',
                        'action' => 'categories'
                    ]) ?>`,
                type: 'GET',
                method: 'get',
                success: function(data) {

                    let content = ``;
                    for (var i in data.categories) {

                        content +=
                            `<option value="${data.categories[i].id}">${data.categories[i].category}</option>`
                    }
                    $(`#categorySelect`).html(content);
                },
                error: function(error) {
                    console.log('Error:', error);
                }

            });
        },
        'edit-course-pop-up': function() {
            let courseId = $(`input[name="course_id"]`).attr('value');
            $.ajax({
                url: `https://www.edugato.net/lms/courses/edit/${courseId}`,
                type: 'GET',
                method: 'get',
                success: function(data) {
                    $('#titleEdit').val(data.course.title);
                    $('.displayTitile').text(data.course.title);
                    $('#descriptionEdit').val(data.course.description);
                    $('.displayDescription').text(data.course.description);
                    $('#slugEdit').val(data.course.slug);
                    $('#slugTextEdit').val(`.../courses/${data.course.slug}`);
                    $('.courseImage').attr('src', `/img/uploads/picture/${data.course.picture}`);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            })
            $.ajax({
                url: `<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Courses',
                        'action' => 'levels'
                    ]) ?>`,
                type: 'GET',
                method: 'get',
                success: function(data) {

                    let content = ``;
                    for (var i in data.levels) {

                        content +=
                            `<option value="${data.levels[i].id}">${data.levels[i].level}</option>`
                    }
                    $(`#levelSelectEdit`).html(content);
                },
                error: function(error) {
                    console.log('Error:', error);
                }

            });
            $.ajax({
                url: `<?= $this->Url->build([
                        'plugin' => 'Lms',
                        'controller' => 'Courses',
                        'action' => 'categories'
                    ]) ?>`,
                type: 'GET',
                method: 'get',
                success: function(data) {

                    let content = ``;
                    for (var i in data.categories) {

                        content +=
                            `<option value="${data.categories[i].id}">${data.categories[i].category}</option>`
                    }
                    $(`#categorySelectEdit`).html(content);
                },
                error: function(error) {
                    console.log('Error:', error);
                }

            });
        }

    };
    $(document).ready(function() {


        $(".show-popup").click(function() {
            var lessonId = null;
            var courseId = null;
            popUpName = $(this).attr('data-popup');
            lessonId = $(this).attr('data-lessonId');
            courseId = $(this).attr('data-courseId');
            chapterId = $(this).attr('data-chapterId');
            popUpToHide = $(this).attr('data-popupToHide');
            $('#overlay').show();
            if ($('#popupContainer').is(":visible")) {
                $(`#${popUpToHide}`).css('display', 'none');
                $(`#${popUpName}`).css('display', 'block');
                
            } else {
                if (lessonId != null) {
                    console.log(`chpi${chapterId}`);
                    if (courseId != null) {
                        $(`.needId`).append(
                            `<input type="hidden" id="cId" name="course_id" value=${courseId} >`);
                    }
                    if (chapterId != null) {
                        $(`.needId`).append(
                            `<input type="hidden" id="chaId" name="chapter_id" value=${chapterId} >`
                        );
                    }
                    $(`.needId`).append(
                        `<input type="hidden" id="lId" name="lesson_id" value=${lessonId} >`);
                } else {
                    console.log("Hello world");
                    if (chapterId != null) {
                        $(`.needId`).append(
                            `<input type="hidden" id="chaId" name="chapter_id" value=${chapterId} >`
                        );
                    }
                    $(`.needId`).append(
                        `<input type="hidden" id="cId" name="course_id" value=${courseId} >`);
                }
                $('#popupContainer, #overlay').show().animate({
                    opacity: 1
                }, 200);
                $(`#${popUpName}`).css('display', 'block');
                $('#overlay').hide();
                if (typeof popupScripts[popUpName] === 'function') {
                    popupScripts[popUpName]();
                }
            }

        });
        $(`.closePopUp`).click(function(e) {
            var container = $('#popupContainer');

            if ($('#popupContainer').is(":visible")) {
                $('#popupContainer, #overlay').animate({
                    opacity: 0
                }, 200, function() {
                    $(this).hide();
                    $(`#${popUpName}`).css('display', 'none');
                    $('#cId').remove();
                    $('#lId').remove();
                    $('#chaId').remove();

                });

            }
        })

        $(document).mouseup(function(e) {
            var container = $('#popupContainer');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('#popupContainer').is(":visible")) {
                    $('#popupContainer, #overlay').animate({
                        opacity: 0
                    }, 200, function() {
                        $(this).hide();
                        $(`#${popUpName}`).css('display', 'none');
                        $('#cId').remove();
                        $('#lId').remove();
                        $('#chaId').remove();
                    });
                }
            }
        });
    });
    </script>
</body>

</html>