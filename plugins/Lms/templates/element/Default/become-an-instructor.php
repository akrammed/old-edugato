<style>
.bg-custom-color {
    background-color: #003F91 !important;
}

.custom-btn-subscrib {
    width: 200px;
    margin-top: 2%;
    border-radius: 2px;
}

.custom-col-sub-content {
    border: 2px solid white;
    background-color: white;
    height: 102px;
    border-radius: 16px;
    padding: 25px;
    margin: 11px;
}

.custom-sub-content-text {
    color: rgb(219, 84, 97);
    font-weight: 900;
}
</style>

<div class="bg-custom-color">

    <div class="row align-items-center" style="margin-top:80px">
        <div class="col-12 col-lg-6 mt-20 mt-lg-0">
            <div class="position-relative ">

                <?= $this->Html->link(
                            $this->Html->image('pricing.png', [
                            'style'=>'
                            margin-right: 10% !important;
                            margin-left: 10% !important;
                            margin-top: 10% !important;
                            margin-bottom: 10% !important;']),
                            '/acceuil',
                           ['escape' => false, 'class' => 'find-instructor-section-hero']
                         ) ?>



            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="">
                <h2 class="font-36 font-weight-bold text-center text-white " style="   margin-right: 33%;
                           margin-bottom: 2%
                           ">How to subscribe</h2>
                <h3 class=" text-center text-white " style="   margin-right: 33%;
                           margin-bottom: 5%
                           ">To purchase a subscription voucher :<br> please contact us</h3>
                <p class="font-16 font-weight-normal text-gray mt-10">
                <div class="row align-items-center" style="margin-right: 17%;">
                    <div class="col-3 custom-col-sub-content">Period: <span class="custom-sub-content-text">3
                            months</span>
                    </div>
                    <div class="col-3 custom-col-sub-content">Content:<span class="custom-sub-content-text">36
                            hours</span> </div>
                    <div class="col-3 custom-col-sub-content"> Price :<br><span class="custom-sub-content-text">3300
                            DA</span> </div>

                </div>
                </p>

                <div class="mt-35 d-flex align-items-center">

                    <?= $this->Html->link(
                           'Subscribe Now',
                            '/contact',
                           ['escape' => false, 'class' => 'btn btn-primary  align-items-center custom-btn-subscrib']
                         ) ?>

                </div>
            </div>
        </div>


    </div>

</div>