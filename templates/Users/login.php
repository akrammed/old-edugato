<?= $this->element('Script/jQuery') ?>

<div class="container">

    <div class="row login-container">


        <div class="col-12 col-md-12">
            <div class="login-card" style="background-color: white;
    margin: 29%;
    margin-top: -1%;
    margin-bottom: 5%;">
                <h1 class="font-20 font-weight-bold">Log in to your account</h1>

                <?= $this->Form->create(null, [
                    'class' => 'mt-35',
                    'id' => 'login-form'
                ]) ?>
                <div class="js-email-fields form-group ">
                    <?= $this->Form->control('email', [
                        'label' => __('Email'),
                        'id' => 'email',
                        'class' => 'form-control'
                    ]); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->control('password', [
                        'label' => __('Password'),
                        'id' => 'password',
                        'class' => 'form-control'
                    ]); ?>
                </div>

                <?= $this->Form->button(__('Submit'), [
                    'class' => 'btn btn-primary btn-block mt-20',
                    'id' => 'submit-btn-login'
                ]) ?>

                <?= $this->Form->end() ?>

                <div class="mt-30 text-center">
                    <a href="/contact-lms" target="_blank">Forgot your password?</a>
                </div>

            </div>
        </div>
    </div>

</div>

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
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Account successfully created",
                            showConfirmButton: false,
                            timer: 2000,
                        }).then((result) => {
                            location.reload();
                        });
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