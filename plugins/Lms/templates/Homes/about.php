<?php 

$this->assign('title', 'About');

?>

<style>
    .textWhite {
        color: white !important;
    }

    .textWhite span {
        color: rgb(219, 84, 97);
    }


    .pad {
        padding-top: 130px !important;
    }

    .yearExpCard {
        background-color: rgb(247, 240, 245);
    }

    .person {
        width: 30%;
        margin-right: 10px;
    }

    .personImage {
        border-radius: 50%;
        width: 200px;
        height: 200px;
        overflow: hidden;
        margin-left: 100px;
        margin-bottom: 60px;
    }

    .personImage img {
        width: 100%;
        height: auto;
    }

    @media (max-width: 767px) {
        .person {
            width: 100%;
            margin-right: 0;
        }

        .personImage {

            margin-bottom: 30px;
        }

        .yearExpCard {
            max-width: 100% !important;
        }
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div id="app" class="">

    <section class="text-center mt-2 p-3 mb-3 pad" style="height: fit-content;">
        <h1 style="text-align: center; font-size:64px">ارتق بحياتك المهنية وخبراتك إلى <span
                style="color: rgb(219, 84, 97);">آفاق</span> جديدة<br></h1>
        <p style="direction: rtl; text-align: center;"><span
                style="font-family: Helvetica, sans-serif, Arial; font-size: 25px;"><span
                    class="learnworlds-main-text-large" style="">سيساعدك مدربونا على تنمية مهاراتك في اللغة
                    الإنجليزية&nbsp;من خلال تزويدك بجميع الأدوات اللازمة للانتقال إلى المستوى التالي</span></span>
        </p>
    </section>
    <section class="mt-3 " style="background-color:rgb(219, 84, 97); color:white; height: fot-content">
        <div class="row flex-column flex-md-row p-3">
            <div class="col-md-6 ">
                <img src="https://lwfiles.mycourse.app/63c56a3dbc8408b29a4a5007-public/57ab7bdfe72d73ac1750e2a205b6840a.jpeg"
                    class="img-fluid w-80 h-75 ms-3" alt="" srcset="">
            </div>
            <div class="col-md-6 text-right" style="padding:50px">
                <h4 class="textWhite" style="font-size:30px; color:white;">حقق أهدافك</h4>
                <h2 class="textWhite" style="font-size:64px; color:white;">من نحن؟</h2>
                <p class="textWhite" style="font-size:30px; color:white;">نحن فريق شغوف ومتفان من محترفي التعليم
                    وتكنولوجيا المعلومات الذين يتشاركون رؤية مشتركة: تقديم تجربة
                    تعليمية استثنائية للغة الإنجليزية عبر الإنترنت.</p>
            </div>
        </div>
    </section>
    <section class="" style="background-color:rgb(0,63,145); color:white; height: fit-content">
        <div class="row flex-column flex-md-row p-3  h-100 ">
            <div class="d-flex align-items-center justify-content-center col-12 col-md-4 p-3 ">
                <h1 class="textWhite text-center" style="font-size:50px; padding:40px"> خبرة تحت تصرفك <span
                        class="textRed">
                        15 سنة
                    </span>
                </h1>
            </div>
            <div id="numberUp"  class="d-flex flex-column flex-md-row justify-content-center col-12 col-md-8 ">
                <div class="mt-3 yearExpCard h-75 " style="margin-right:20px; width:100%; max-width:30%;">
                    <div class="d-flex flex-column align-items-center justify-content-center ">
                        <i class="bi bi-pencil-fill"
                            style="color: rgb(219, 84, 97); font-size:32px;margin-top:15px;"></i>

                        <h2 class="text-center" style="font-size:40px;">
                        <span id="num1">+500</span><br>
                            تمرين وتقييم
                        </h2>

                    </div>
                </div>
                <div class="mt-3 yearExpCard h-75 position-relative "
                    style="margin-right:20px; width:100%; max-width:30%;">
                    <div class="d-flex flex-column align-items-center justify-content-center ">
                        <i class="bi bi-play-circle-fill"
                            style="color: rgb(219, 84, 97); font-size:32px;margin-top:15px;"></i>

                        <h2 class="text-center" style="font-size:40px;">
                        <span id="num2">+70</span><br>
                            درس فيديو
                        </h2>
                    </div>
                </div>
                <div class="mt-3 yearExpCard h-75 " style="margin-right:20px; width:100%; max-width:30%;">
                    <div class="d-flex flex-column align-items-center justify-content-center ">
                        <i class="bi bi-clock" style="color: rgb(219, 84, 97); font-size:30px;margin-top:15px"></i>

                        <h2 class="text-center" style="font-size:40px;">
                            <span id="num3">108</span><br>
                            ساعة من الدراسة
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="" style="height: fit-content; background-color:rgb(247,240,245); ">
        <div class="row  flex-column flex-md-row p-3 h-100">
            <div class="d-flex justify-content-center col-md-6">
                <img src="https://lwfiles.mycourse.app/63c56a3dbc8408b29a4a5007-public/72433ef0102af4b1b0623454ec13bd95.png"
                    style="margin-top:15px;width:150px; height:200px;" class="img-fluid" alt="" srcset="">

            </div>
            <div class="d-flex align-items-center justify-content-center col-md-6">
                <h1 class=" text-center" style="font-size:70px; padding:40px"> مازال ما دخلتش تقرا؟
                    <p style="font-size:30px; font-weight:400">كليكي على القط, يعلمك النط
                        مع EduGato الإنجيزية ساهلة ماهلة</p>
                </h1>

            </div>
        </div>
    </section>
    <section class="" style="height: fit-content; background-color:rgb(0,63,145);">
        <div class="textWhite text-center" style="padding-top:40px">
            <h4 class="textWhite mb-2" style="font-size:32px;">تعرف على </h4>
            <h1 class="textWhite" style="font-size:48px;">
                Edu<span>Gato</span>
            </h1>
        </div>
        <div class="row h-100 d-flex team" style="margin-top:100px; padding:50px">
            <div class="person ">
                <div class="personImage">
                    <img src="https://th.bing.com/th/id/OIP.mEma0ZcipymPAHIYoIuFiAHaJa?w=169&h=215&c=7&r=0&o=5&dpr=1.5&pid=1.7"
                        alt="" />
                </div>
                <div class="personInfo text-center">
                    <h3 class="textWhite">Nasser Abdelli</h3>
                    <p class="textWhite mt-3">Fondateur</p>
                </div>
                <hr>

            </div>
            <div class="person">
                <div class="personImage">
                    <img src="https://th.bing.com/th/id/OIP.mEma0ZcipymPAHIYoIuFiAHaJa?w=169&h=215&c=7&r=0&o=5&dpr=1.5&pid=1.7"
                        alt="" />
                </div>
                <div class="personInfo text-center">
                    <h3 class="textWhite">Hocine Boukedroun</h3>
                    <p class="textWhite mt-3">Co-Fondateur</p>
                </div>
                <hr>

            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $(window).scroll(function() {
    var elementTop = $('#numberUp').offset().top;
    var elementBottom = elementTop + $('#numberUp').outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    if (elementBottom > viewportTop && elementTop < viewportBottom) {
        animateValue("num1", 0, 500, 2000);
        animateValue("num2", 0, 70, 2000);
        animateValue("num3", 0, 108, 2000);
    }
});

function animateValue(id, start, end, duration) {
    $({count: start}).animate({count: end}, {
        duration: duration,
        step: function() {
            $(id).text(Math.floor(this.count));
        },
        complete: function() {
            $(id).text(this.count);
        }
    });
}
});


</script>
