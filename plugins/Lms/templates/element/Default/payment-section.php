<section class="section-style">
    <?= $this->Form->create(null,['id'=>'form1']) ?>
    <div class="container">
        <div class="row d-flex justify-content-center custom-row">

            <div class="col-sm-6 order-default custom-col lw-dark-bg">
                <img src="" alt="">

                <?= $this->Html->image('uploads/picture/' . $course['picture'], ['class' => 'course-img']) ?>
                <p class="custom-overline-text text-center">تفاصيل المشتريات: دروس اللغة الإنجليزية</p>
                <p class="custom-heading3-normal text-center"><?= $course['title']?></p>
                <p class="custom-price-tag text-center ">المبلغ الإجمالي 3.300 دج</p>
                <p class="custom-price-tag text-center ">طريقة الدفع</p>
                <p class="custom-price-tag text-center ">هل تملك قسيمة التعبئة ؟</p>
                <?= $this->Form->control('code', [
                        'label'=>'',
                        'class' => 'custom-voutcher-input',
                        'id' => 'code'
                    ]);?>

                <?= $this->Form->button(__('تفعيل القسيمة'),[
                                    'id'=>'sub1',
                                    'disabled' => true,
                                    'class' =>'btn btn-primary btn-block mt-20 custom-btn-submit custom-heading3-normal'
                                ]) ?>
            </div>
            <?php  if ($currentSessionUser == null) {?>
            <div class="col-sm-6 order-default custom-col custom-bg">

                <div class=" mb-30">
                    <h2 class="text-right custom-heading3-normal" style="margin-top:18px">
                        قم بإنشاء حساب لبدء التعلم</h2>
                </div>
                <div class="row">

                    <div class="col-6 ">
                        <p class="custom-overline-text text-right"> * الإسم</p>
                        <?= $this->Form->control('first_name',[
                                'label'=>'',
                                'required'=> true,
                                
                                'placeholder'=>'من أجل الشهادة',
                                'class'=>'form-control input-normal section-style custom-placeholder',
                                'id'=>'fname'
                            ]);?>
                    </div>
                    <div class="col-6">
                        <p class="custom-overline-text text-right ">* اللقب</p>
                        <?= $this->Form->control('last_name',[
                                'label'=>'',
                                'required'=> true,
                                
                                'placeholder'=>'من أجل الشهادة',
                                'class'=>'form-control input-normal section-style custom-placeholder',
                                'id'=>'lname'
                            ]);?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="custom-overline-text text-right ">*رقم الهاتف</p>
                        <?= $this->Form->control('phone_number',[
                                'label'=>'',
                                'required'=> true,
                                
                                'placeholder'=>'من أجل الشهادة',
                                'class'=>'form-control input-normal section-style custom-placeholder',
                                'id'=>'phone'
                            ]);?>
                    </div>
                    <div class="col-6">
                        <p class="custom-overline-text text-right ">*تاريخ الميلاد</p>
                        <?= $this->Form->control('birth_date',[
                                'label'=>'',
                                'required'=> true,
                                
                                'placeholder'=>'من أجل الشهادة',
                                'class'=>'form-control input-normal section-style custom-placeholder',
                                'id' =>'bd'
                            ]);?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="custom-overline-text text-right ">*إسم المستخدم</p>
                        <?= $this->Form->control('username',[
                                'label'=>'',
                                'required'=> true,
                                
                                'placeholder'=>'إسم المستخدم الذي تريد إستعماله',
                                'class'=>'form-control input-normal section-style custom-placeholder',
                                'id' =>'uname'
                            ]);?>
                    </div>
                    <div class="col-6">
                        <p class="custom-overline-text text-right ">*بريدك الإلكتروني</p>
                        <?= $this->Form->control('email',[
                                'label'=>'',
                                'required'=> true,
                                
                                'placeholder'=>'تأكد من بريدك الإلكتروني',
                                'class'=>'form-control input-normal section-style custom-placeholder',
                                'id' =>'mail'
                            ]);?>


                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="custom-overline-text text-right ">*أدخل كلمة السر</p>
                        <?= $this->Form->control('password',[
                            'label'=>'',
                            'required'=> true,
                            

                            'placeholder'=>'حاول كتابتها في ورقة حتى لا تنساها',
                            'class'=>'form-control input-normal section-style custom-placeholder',
                            'id' =>'pd'
                        ]);?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="custom-heading3-normal text-right " style="margin-top:30px"> هل لديك حساب ؟ أدخل
                            الآن

                            <?php echo $this->Html->link('هنا','',['data-popup'=>'login-pop-up', 'class'=>'show-popup','id'=>'btn-register','escape'=>false,'style'=>'color:#DB5461']);?>
                        </p>


                    </div>


                </div>


            </div><?php
             }else{ ?>
            <div class="col-sm-6 order-default custom-col custom-bg">
                <div class="row">
                    <div class="col-12">
                        <p class="custom-heading3-normal text-right " style="margin-top: 237px;"> عند القيام بعملية
                            الشراء. إذا كان لديكم أي استفسار أو تحتاجون إلى شراء قسيمة، فلا تترددوا في التواصل مع فريق
                            <br>
                            <?php echo $this->Html->link('EduGato','/contact',['escape'=>false,'style'=>'color:#DB5461']);?>
                        </p>


                    </div>


                </div>
            </div>
            <?php } ?>





        </div>
        <?= $this->Form->end() ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 ">
                    <?= $this->Html->link(
                            $this->Html->image('pricing.png', [
                            'class'=>'
                            custom-how-to-buy-style
                           ']),
                            '/acceuil',
                           ['escape' => false, 'class' => 'find-instructor-section-hero']
                         ) ?>

                </div>
                <div class="col-sm-6 how-to-buy-col ">
                    <div class="custom-how-to-buy-header-style">
                        <p class="custom-heading3-normal text-right custom-header">كيفية الإشتراك</p>
                        <p class="custom-overline-text text-right">لشراء قسيمة الإشتراك، الرجاء الإتصال بنا</p>
                    </div>
                    <div class="custom-how-to-buy-body-style">
                        <div class="row d-flex align-items-center" style="margin-right: -192px;">
                            <div dir="rtl" class="col-md-3 mb-3 ml-1 custom-sub-content-text-2 text-center"> 3.300
                                دج
                                <br> <span class="custom-sub-content-text">سعر الإشتراك</span>
                            </div>
                            <div dir="rtl" class="col-md-3 mb-3 ml-1  custom-sub-content-text-2 text-center">36
                                ساعة<br><span class="custom-sub-content-text">محتوي الإشتراك</span> </div>
                            <div dir="rtl" class="col-md-3 mb-3 ml-1 custom-sub-content-text-2 text-center"> 3 أشهر
                                <br><span class="custom-sub-content-text">مدة الإشتراك</span>
                            </div>

                        </div>
                    </div>
                    <div class="mt-35 d-flex align-items-center">

                        <?= $this->Html->link('
                            شراء قسيمة الإشتراك',
                                '/contact',
                            ['escape' => false, 'class' => 'btn btn-primary  align-items-center custom-sub-btn']
                            ) ?>

                    </div>

                </div>
            </div>
        </div>




</section>

<script>
$(document).ready(function() {
    $('#btn-register').on('click',function(event) {
        event.preventDefault();
    });

    $('#sub1').on('click', function(event) {
        event.preventDefault();
        var csrfToken = $('meta[name="_csrfToken"]').attr('content');
        var currentUrl = window.location.href;
        var lastNumber = currentUrl.substr(currentUrl.lastIndexOf('/') + 1);
        console.log($("#first_name").val());
        <?php if ($currentSessionUser != null) {
      ?>
        var formData = {
            code: $("#code").val(),
            course_id: lastNumber,
        };
        <?php }else{?>
        var formData = {
            first_name: $("#fname").val(),
            last_name: $("#lname").val(),
            email: $("#mail").val(),
            username: $("#uname").val(),
            phone_number: $("#phone").val(),
            birth_date: $("#bd").val(),
            password: $("#pd").val(),
            code: $("#code").val(),
            course_id: lastNumber,
        };
        <?php }?>
        console.log(formData);
        $.ajax({
            url: '<?= $this->Url->build([
            'plugin'=> null,
            'controller' => 'Users',
            'action' => 'createAjax']) ?>',
            data: {
                data: formData,
            },
            method: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function(response) {
                console.log(response)
                if (response.result == true) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Your account has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        $('#sub1').prop('disabled', false);
                    }).then(() => {
                        var currentUrl = window.location.href;
                        var lastId = currentUrl.substr(currentUrl.lastIndexOf('/') +
                            1);
                        window.location.href =
                            '<?= $this->Url->build(['plugin'=>'Lms','controller'=>'Courses','action'=>'view']) ?>/' +
                            lastId;
                    });
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $('#code').on('change', function(event) {
        var code = $("#code").val();

        if (code.length == 16) {
            console.log(code);
            $.ajax({
                url: '<?= $this->Url->build([
                'plugin'=> null,
                'controller' => 'Users',
                'action' => 'validateAjax']) ?>',
                data: {
                    code: code,
                },
                method: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                success: function(response) {
                    console.log(response)
                    if (response.result == true) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            $('#sub1').prop('disabled', false);
                        })
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error: " + textStatus + ' : ' + errorThrown);
                    console.error(jqXHR
                        .responseText); // This will log the raw response from the server
                }
            });
        }
    });



    $(function() {
        $("#birth_date").datepicker();
    });
});
</script>
<style>
.custom-sub-btn {
    border-radius: 0px;
    width: 217px;
    font-size: 22px;
}

.order-default {
    order: 0;
}

.custom-sub-content-text-2 {
    padding: 18px;
    height: 120px;

    background-color: white;
    border-radius: 10px;
    font-size: 27px;
}

.custom-sub-content-text {
    color: rgb(219, 84, 97);
    font-weight: 600;
    font-size: 27px;
}

.custom-header {
    font-weight: 700 !important;
    font-size: 50px !important;
}

.custom-how-to-buy-style {
    margin-top: 10% !important;
    margin-bottom: 10% !important;
}

.custom-how-to-buy-header-style {
    margin-top: 20% !important;
    margin-bottom: 10% !important;
}

.custom-placeholder {
    font-size: 16px;
}

.custom-bg {
    background-color: white !important;
}

.input-normal {
    height: 60px;
    border-radius: 0px;
    margin-bottom: 20px;
}

.custom-btn-submit {
    margin-top: 10% !important;
    border-radius: 0px;
}

.custom-btn {
    margin-top: 29px;
    align-items: center;
    cursor: pointer;
    display: inline-flex;
    justify-content: center;
    max-width: 100%;
    outline: none;
    position: relative;
    text-align: center;
    vertical-align: middle;
}

.custom-voutcher-validat-btn {
    background-origin: border-box;
    border-style: solid;
    border-width: 2px;
    border-color: #DB5461;
    background-color: #DB5461;
    color: #FFFFFF;
    font-weight: bold;
    font-size: 1.6rem;
    letter-spacing: 0rem;
    text-transform: none;
    border-radius: 4px;
    padding-top: 15px;
    padding-right: 30px;
    padding-bottom: 15px;
    padding-left: 30px;
    margin-left: auto;
    margin-right: auto;
}

.custom-voutcher-input {
    width: 100%;
    font-weight: normal;
    font-size: 1.6rem;
    letter-spacing: 0rem;
    text-transform: none;
    border-radius: 0px;
    border-color: #F7F0F5;
    padding-top: 15px;
    padding-right: 10px;
    padding-bottom: 15px;
    padding-left: 10px;
}

.custom-price-tag {
    padding-top: 40px;
    font-weight: bold;
    font-size: 1.5rem;
}

.custom-heading3-normal {
    font-weight: bold;
    font-size: 1.9rem;
    opacity: 1;
    letter-spacing: 0rem;
    line-height: 1.4;
    text-transform: none;
}

.custom-overline-text {
    font-weight: normal;
    font-size: 1.3rem;
    opacity: 1;
    letter-spacing: 0.01rem;
    line-height: 1.55;
    text-transform: uppercase;
}

.course-img {
    object-fit: contain;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    height: 30%;
    width: 100%;

}

.section-style {
    background-color: #fdf0f0 !important;
}

.custom-row {
    padding-bottom: 70px;
    padding-top: 70px;
}

.custom-col {
    padding-left: 25px;
    padding-right: 25px;
    height: 800px;

}

.lw-dark-bg {
    background-color: #003F91;
    color: #FFFFFF;
    border-color: #003F91;
}

@media (max-width: 450px) {
    .custom-how-to-buy-style {
        width: 100%;
    }

    .custom-sub-content-text-2 {
        width: 65%;
    }

    .how-to-buy-col {
        height: 731px;

    }

    .custom-sub-btn {
        width: 100%;
    }

    .col-sm-6.order-default {
        order: 0;
    }

    .col-sm-6:first-child {
        order: 1;
    }
}
</style>