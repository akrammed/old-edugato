<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 * @var \Cake\Collection\CollectionInterface|string[] $locations
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 */
?>
<div class="container">
    <div class="row login-container">

        <div class="col-12 col-md-12">
            <div class="login-card" style="    background-color: white;
    margin: 29%;
    margin-top: -1%;
    margin-bottom: 5%;">
                <h1 class="font-20 font-weight-bold">Signup</h1>

                <?= $this->Form->create($user,[
                    'class'=> 'mt-35'
                ]) ?>


                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('first_name',[
                                    'label'=>__('First name'),
                                    'class'=>'form-control',
                                    'id'=>'first_name'
                                ]);?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('last_name',[
                                    'label'=>__('Last name'),
                                    'class'=>'form-control',
                                    'id'=>'last_name'
                                ]);?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('phone_number',[
                                    'label'=>__('Phone number'),
                                    'class'=>'form-control',
                                    'id'=>'phone_number'
                                ]);?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('birth_date',[
                                    'label'=>__('Birth date'),
                                    'class'=>'form-control',
                                    'id' =>'birth_date'
                                ]);?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('city',[
                                    'label'=>__('City'),
                                    'class'=>'form-control'
                                ]);?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('username',[
                                    'label'=>__('Username'),
                                    'class'=>'form-control',
                                    'id' =>'username'
                                ]);?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('email',[
                                    'label'=>__('Email'),
                                    'class'=>'form-control',
                                    'id' =>'emailReg'
                                ]);?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <?= $this->Form->control('password',[
                                'label'=>__('Create Password'),
                                'class'=>'form-control',
                                'id' =>'passwordReg'
                            ]);?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->control('location_id', [
                    'class' => 'form-control',
                    'type' => 'hidden', 
                ]); ?>
                <?= $this->Form->control('role_id', [
                    'class' => 'form-control',
                    'type' => 'hidden', 
                ]); ?>


                <?= $this->Form->button(__('Submit'),[
                            'class' =>'btn btn-primary btn-block mt-20',
                            'id'=> 'submit-btn-register'
                        ]) ?>

                <?= $this->Form->end() ?>



            </div>
        </div>
     
    </div>
</div>

<script>

</script>
<script>
$(document).ready(function() {
    $(function() {
    $("#datepicker").datepicker();
});
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