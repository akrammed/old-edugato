<section class="section-sub">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 ">
                <?= 
                            $this->Html->image('pricing.png', [
                            'class'=>'
                            custom-how-to-buy-style
                           '])?>

            </div>
            <div class="col-sm-6 how-to-buy-col">
                <div class="custom-how-to-buy-header-style">
                    <p class="custom-heading3-normal text-right custom-header">كيفية الإشتراك</p>
                    <p class="custom-overline-text text-right">لشراء قسيمة الإشتراك، الرجاء الإتصال بنا</p>
                </div>
                <div class="custom-how-to-buy-body-style">
                    <div class="row d-flex align-items-center" style="margin-right: -192px;">
                        <div dir="rtl" class="col-sm-3 mb-3 ml-1 custom-sub-content-text-2 text-center"> 3.300
                            دج
                            <br> <span class="custom-sub-content-text">سعر الإشتراك</span>
                        </div>
                        <div dir="rtl" class="col-sm-3 mb-3 ml-1  custom-sub-content-text-2 text-center">36
                            ساعة<br><span class="custom-sub-content-text">محتوي الإشتراك</span> </div>
                        <div dir="rtl" class="col-sm-3 mb-3 ml-1 custom-sub-content-text-2 text-center"> 3 أشهر
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

</script>
<style>
.section-sub {
    background-color: #fdf0f0 !important;
}

.custom-sub-btn {
    border-radius: 0px;
    width: 217px;
    font-size: 22px;
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


.custom-row {
    padding-bottom: 70px;
    padding-top: 70px;
}

.custom-col {
    padding-left: 25px;
    padding-right: 25px;
    height: 800px;

}

@media (max-width: 450px) {
    .custom-how-to-buy-style {
        width: 100%;
    }

    .custom-sub-content-text-2 {
        width: 70%;

    }

    .how-to-buy-col {
        height: 731px;

    }

    .custom-sub-btn {
        width: 100%;
    }
}
</style>