<style>
#popupContainer {
    z-index: 9999999;
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white !important;
    background-color: black;
    padding: 40px;
    width: 400px;
    height: 500px;
    overflow-y: auto;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}
.popup-shadow{
    box-shadow: 0 0 100px rgba(0, 0, 0, 0.5);
    border-radius: 0px !important;
}

::-webkit-scrollbar {
    width: 5px;
}


::-webkit-scrollbar-thumb {
    background: #DB5461;
}

</style>

<div id="popupContainer" class="messagepop pop popup-shadow" style="display: none;">
    <div class="" id="login-pop-up" style="display:none;">
        <?php echo $this->element("login-pop-up"); ?>
    </div>

    <div class="" id="register-pop-up" style="display:none;">
        <?php echo $this->element("register-pop-up"); ?>
    </div>


</div>
