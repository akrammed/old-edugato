<div class="col addNewImage" style="height: 183px important;" >
    <div class="cardNew courseContainter h-100">
        <div class="card-body" style="display: flex;
        flex-direction: column;  align-items: center;">
            <?= $this->element('icons/add-new') ?> 
            <h5 class="text-center cardTitle">Add Card</h5>
        </div>
    </div>
</div>
<style>
        .cardTitle{
        color: #000;
        font-family: "Poppins";
        font-size: 17.026px;
        font-style: normal;
        font-weight: 600;
        line-height: 18.574px; /* 109.091% */
    }
        .courseContainter{
        background-color: #F6F8FB;
        box-shadow: 0px 3.096px 6.191px 0px rgba(0, 0, 0, 0.16);
    }
    .cardNew{

        display: flex;
        /* flex-direction: column; */
        justify-content: center;
        align-items: center;

    }
</style>