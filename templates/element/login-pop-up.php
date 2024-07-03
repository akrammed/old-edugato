 <style>
.whiteText {
    color: white !important;
}

.formLoginRegister {
    margin-top: 30px;
    margin-bottom: 10px;
}

.pop {
    border-radius: 0 !important;
    background-color: rgb(38, 38, 38);
    color: white !important;
    border: none;
}

.pop:focus {

    background-color: rgb(38, 38, 38);
    border: none;
    color: white !important;
}

.subBtn {
    border: none;
    border-radius: 5px;
    color: white !important;

}

.pop::placeholder {
    /* WebKit, Blink, Edge */
    color: rgb(80, 80, 80) !important;
}
 </style>
 <h1 class="whiteText text-center mt-3">Login</h1>
 <?= $this->Form->create(null, [
                    'class' => 'formLoginRegister',
                    'id' => 'login-form'
                ]) ?>
 <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

 <div class="mb-3 form-group">
     <?= $this->Form->control('email', [
                        'label' => __('Email'),
                        'id' => 'email',
                        'class' => 'form-control pop',
                        'placeholder' => __('Email')
                    ]); ?>
 </div>
 <div class="mb-3 form-group">

     <?= $this->Form->control('password', [
                        'label' => __('Password'),
                        'id' => 'password',
                        'class' => 'form-control pop',
                        'placeholder' => __('Password')
                    ]); ?>
 </div>
 <?= $this->Form->button(__('Submit'), [
                    'class' => 'subBtn p-2',
                    'id' => 'submit-btn-login',
                    'style' => 'width:100%; background-color:#DB5461;'
                ]) ?>
 <?= $this->Form->end() ?>
 <div class="d-flex justify-content-between mt-3">
     <a data-popup="register-pop-up" data-popupToHide="login-pop-up" class="show-popup"
         style="color: #DB5461 !important; ">Signup</a>
     <a href="" style="color: #DB5461 !important; ">Forget Password</a>
 </div>

 </form>
 <script>
$(document).ready(function() {

    $('#submit-btn-login').on('click', function(event) {
        event.preventDefault();


        function closePopup() {
            $('#overlay').css('display', 'none')
            $('#popupContainer').css('display', 'none')
        }



        function showErrorAlert(fieldId, errorMessage) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Oops...",
                text: errorMessage,
                showConfirmButton: true,
            });
        }

        function isString(input) {
            return typeof input === 'string' || input instanceof String;
        }

        if ($("#email").val() === '') {
            showErrorAlert("#email", "Email cannot be empty");
            closePopup()
        } else if ($("#password").val() === '') {
            showErrorAlert("#password", "Password cannot be empty");
            closePopup()
        } else {
            var url = "<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'loginUserAjax'
            ]) ?>";
            var csrfToken = $('#login-form input[name="_csrfToken"]').val();
            var formData = {

                email: $("#email").val(),
                password: $("#password").val(),

            };

            $.ajax({
                url: url,
                data: formData,
                method: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                success: function(response) {
                    console.log(response);
                    if (response.result == false) {
                        closePopup();
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Oops...",
                            text: response.msg,
                            showConfirmButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });



                    }
                    console.log(response);
                    if (response.result) {
                        closePopup();

                        if (response.isAdmin) {
                            location.href =
                                "<?= $this->Url->build(['plugin'=> 'Lms','controller' => 'Homes', 'action' => 'dashboard', 'dashboard'])?>";
                        }else{
                            location.href =
                                "<?= $this->Url->build(['plugin'=> 'Lms' ,'controller' => 'Homes', 'action' => 'profile'])?>";
                        }
                    }

                },

                fail: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);

                }
            });
        }
    });
});
 </script>