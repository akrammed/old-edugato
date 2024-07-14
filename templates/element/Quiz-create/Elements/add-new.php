<div class="col addNewImage" >
    <div class="cardNew courseContainter h-100" style="height: 183px important; width:100%">
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
    }
    .cardNew{

        display: flex;
        /* flex-direction: column; */
        justify-content: center;
        align-items: center;
        border-radius: 12px;
border: 4px solid #F6F8FB;
background: #F6F8FB;

    }
</style>