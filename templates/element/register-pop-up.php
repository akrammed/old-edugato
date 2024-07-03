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

::-webkit-scrollbar {
    width: 5px;
}

/* This is the handle of the scrollbar */
::-webkit-scrollbar-thumb {
    background: #DB5461;
}
</style>

<h1 class="whiteText text-center mt-3">Signup</h1>
<?= $this->Form->create(null, [
                    'class' => 'formLoginRegister',
                    'id' => 'register-form'
                ]) ?>
<input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

<div class="mb-3 form-group">
<?= $this->Form->control('first_name', [
    'label' => __('First name'),
    'class' => 'form-control pop',
    'id' => 'first_name',
    'placeholder' => __('First name'),
    'required' => true,
    'pattern' => `/^[A-Za-z]+$/`,
    'title' => 'Three letter country code', 
]); ?>

</div>
<div class="mb-3 form-group">

    <?= $this->Form->control('last_name', [
        'label' => __('Last name'),
        'class' => 'form-control pop',
        'id' => 'last_name',
        'placeholder' => __('Last name'),
        'required'=> true,

    ]); ?>
</div>
<div class="mb-3 form-group">

    <?= $this->Form->control('phone_number', [
        'label' => __('Phone number'),
        'class' => 'form-control pop',
        'id' => 'phone_number',
        'required'=> true,
        'placeholder' => __('Phone number'),
    ]); ?>
</div>
<div class="mb-3 form-group">

    <?= $this->Form->control('birth_date', [
        'label' => __('Birth date'),
        'class' => 'form-control pop',
        'id' => 'birth_date',
        'type' =>'date',
        'required'=> true,
        'placeholder' => __('Birth date'),
    ]); ?>
</div>
<div class="mb-3 form-group">

    <?= $this->Form->control('city', [
        'label' => __('City'),
        'class' => 'form-control pop',
        'placeholder' => __('City'),
    ]); ?>
</div>
<div class="mb-3 form-group">

    <?= $this->Form->control('username', [
        'label' => __('Username'),
        'class' => 'form-control pop',
        'id' => 'username',
        'required'=> true,
        'placeholder' => __('Username'),
    ]); ?>
</div>
<div class="mb-3 form-group">

    <?= $this->Form->control('email', [
        'label' => __('Email'),
        'class' => 'form-control pop',
        'id' => 'emailReg',
        'type' => 'email',
        'required'=> true,
        'placeholder' => __('Email'),
    ]); ?>
</div>

<div class="mb-3 form-group">

    <?= $this->Form->control('password', [
        'label' => __('Password'),
        'id' => 'passwordReg',
        'required'=> true,
        'class' => 'form-control pop',
        'placeholder' => __('Password')
    ]); ?>
</div>
<?= $this->Form->control('location_id', [
    'class' => 'form-control',
    'type' => 'hidden',
]); ?>
<?= $this->Form->control('role_id', [
    'class' => 'form-control',
    'type' => 'hidden',
    'id'=> 'role_id',
]); ?>
<?= $this->Form->button(__('Submit'), [
    'class' => 'subBtn p-2',
    'id' => 'submit-btn-register',
    'style' => 'width:100%; background-color:#DB5461;'
]) ?>
</form>
<div class="d-flex justify-content-between mt-3">
    <a data-popup="login-pop-up" data-popupToHide="register-pop-up" class="show-popup"
        style="color: #DB5461 !important; ">Login</a>
    <a style="color: #DB5461 !important; ">Forget Password</a>
</div>

</form>
<script>
$(document).ready(function() {

    $('#submit-btn-register').on('click', function(event) {
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


        if ($("#first_name").val() === '') {
            showErrorAlert("#first_name", "First name cannot be empty");
            closePopup();
        } else if (!isString($("#first_name").val())) {
            showErrorAlert("#first_name", "First name must be a string");
            closePopup();
        } else if ($("#last_name").val() === '') {
            showErrorAlert("#last_name", "Last name cannot be empty");
            closePopup();
        } else if (!isString($("#last_name").val())) {
            showErrorAlert("#last_name", "Last name must be a string");
            closePopup();
        } else if ($("#phone_number").val() === '') {
            showErrorAlert("#phone_number", "Phone number cannot be empty");
            closePopup()
        } else if ($("#birth_date").val() === '') {
            showErrorAlert("#birth_date", "Birth date cannot be empty");
            closePopup()
        } else if ($("#username").val() === '') {
            showErrorAlert("#username", "Username cannot be empty");
            closePopup()
        } else if ($("#emailReg").val() === '') {
            showErrorAlert("#emailReg", "Email cannot be empty");
            closePopup()
        } else if ($("#passwordReg").val() === '') {
            showErrorAlert("#passwordReg", "Password cannot be empty");
            closePopup()
        } else {
            var url = "<?= $this->Url->build([
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'registerNewUserAjax'
            ]) ?>";
            var csrfToken = $('#register-form input[name="_csrfToken"]').val();
            var formData = {

                first_name: $("#first_name").val(),
                last_name: $("#last_name").val(),
                phone_number: $("#phone_number").val(),
                birth_date: $("#birth_date").val(),
                username: $("#username").val(),
                email: $("#emailReg").val(),
                password: $("#passwordReg").val(),
                role_id: 1

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