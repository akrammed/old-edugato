<section class="header-section">
    <div class="container">
        <div class="row d-flex flex-wrap">
            <div class="col-sm-6 col-img-container">
                <?= $this->Html->image('contact-img.jpeg', ['class' => 'col-img']); ?>
            </div>
            <div class="col-sm-6 col-header-text custom-text ">
                <h1 dir="rtl" class="custom-text custom">لا تتردد، إتصل بنا</h1>
            </div>
        </div>
    </div>
</section>

<section class="contact-section  ">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 form-section">
                <div class="container" style="margin-top: 10%;">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-right" style="margin-bottom: 10px;margin-top:5px" dir="rtl">الإسم واللقب
                            </h3>
                            <input style="border: 2px solid #DB5461;
                                            border-radius: 0px;
                                            margin-bottom: 5%;" type="text" name="name" value="" class="form-control ">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-right" style="margin-bottom: 10px;margin-top:5px" dir="rtl">البريد
                                الإلكتروني</h3>
                            <input style="border: 2px solid #DB5461;
                                            border-radius: 0px;
                                            margin-bottom: 5%;" type="text" name="email" value=""
                                class="form-control ">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-right" style="margin-bottom: 10px;margin-top:5px" dir="rtl">رقم الهاتف</h3>
                            <input style="border: 2px solid #DB5461;
                                            border-radius: 0px;
                                            margin-bottom: 5%;" type="text" name="phone" value=""
                                class="form-control ">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-right" style="margin-bottom: 10px;margin-top:5px" dir="rtl">أكتب رسالتك</h3>
                            <textarea name="message" style="border: 2px solid #DB5461;
                                            border-radius: 0px;
                                            margin-bottom: 5%;" id="" rows="10" class="form-control "></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="edugato-submit-btn" dir="rtl">إرسال</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 description-col">
                <h2 dir="rtl" class="custom-text-main text-right">نحن هنا لمساعدتك، أرسل لنا تساؤلاتك!
                </h2>
                <h3 dir="rtl" class="custom-text-sub sub-title text-center">تواصل معنا عبر مواقع التواصل الإجتماعي</h3>
                <div class="row icon-row">
                    <div class="col-sm-2 icon-cube"><?= $this->Html->image('fb.png' ,['class'=>'icon-img'] ) ?></div>
                    <div class="col-sm-2 icon-cube"><?= $this->Html->image('ytb.png' ,['class'=>'icon-img'] ) ?></div>
                    <div class="col-sm-2 icon-cube"><?= $this->Html->image('it.png' ,['class'=>'icon-img'] ) ?></div>
                    <div class="col-sm-2 icon-cube"><?= $this->Html->image('in.png' ,['class'=>'icon-img'] ) ?></div>
                    <div class="col-sm-2 icon-cube"><?= $this->Html->image('tik.png' ,['class'=>'icon-img'] ) ?></div>
                </div>
                <h3 style="margin-top: 13%;" dir="rtl" class="custom-text-sub sub-title text-center">أو عبر الهاتف
                    <br><span style="color:#DB5461; font-size:50px;margin-top:10%">0770.77.22.72
                    </span>
                </h3>
            </div>
        </div>
    </div>


</section>

<script>

</script>
<style>
.edugato-submit-btn {
    border: 2px solid #DB5461;
    background-color: #DB5461;
    color: white;
    width: 22%;
    height: 50px;
    font-size: 25px;
    font-weight: bold;
}

.edugato-input-label {
    margin-left: 78%;
    font-size: 1.3rem;
    font-weight: normal;
    letter-spacing: 0rem;
    line-height: 1.6;
    text-transform: none;
}

.edugato-input-outline-brand {
    border: 2px solid #DB5461;
    border-radius: 0px;
    margin-bottom: 7%;
}

.description-col {
    margin-top: 10%;
    margin-bottom: 10%;
    height: 700px;
    background-color: #fdf0f0 !important;
}

.form-section {
    background-color: white !important;
    height: 700px;
    margin-top: 10%;
    margin-bottom: 10%;
}

.col-header-text {
    margin-top: 10%;
    margin-bottom: 10%;
}

.header-section {
    height: 400px;
    width: 100%;
}

.contact-section {
    height: 900px;
    width: 100%;
    background-color: #003F91 !important;
}

.col-img {
    margin-top: 10%;
    margin-bottom: 10%;
    width: 500px;
}

.custom-text-main,
.custom-text-sub,
.custom-text {
    font-weight: bold;
    font-size: 4.4rem;
    opacity: 1;
    letter-spacing: 0rem;
    line-height: 1.25;
    text-transform: none;
    margin-top: 10%;
}

.custom-text-main {
    margin-top: 10%;
    margin-bottom: 11%;
    margin-right: 2%;
    font-size: 2.4rem !important;
}

.custom-text-sub {
    font-size: 1.4rem !important;
}

.icon-img {
    margin-top: 29%;
    margin-left: 3%;

}

.icon-row {
    margin-left: 16%;
    margin-top: 5%;
    margin-bottom: 5%;
    margin-right: 13%;
}

.icon-cube {

    margin-left: 2%;
    background-color: #DB5461;
    height: 50px;
    width: 30px !important;
}

@media (max-width: 450px) {
    .header-section {
        height: 100%;
    }

    .custom-text {
        font-size: 2.4rem;
        margin-left: 10%;
        margin-top: 2%;
    }

    .contact-section {
        height: 100%;
    }

    .icon-img {
        margin-top: 55%;
        margin-left: -44%;
    }

    .icon-cube {
        width: 46px !important;
    }

    .description-col {
        height: 467px;
    }

    .form-section {
        height: 616px;
    }

    .icon-row {
           margin-left: 14%;
    }


}
</style>