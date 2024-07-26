<div class="container">
    <?= $this->Form->create($learningpath,['type' => 'file']) ?>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="w-100" style="height: 200px;">
                    <img src="https://th.bing.com/th/id/OIP.hRXzfT4tS2O-p--lIw8cBwAAAA?rs=1&pid=ImgDetMain" alt="" id="pathImage" class="w-100 h-100" style="object-fit: cover;">
                </div>
                <p class="text-xl font-meduim text-center py-4 mb-0">Path Name</h5>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-3">
                <?= $this->Form->control('path', [
                    'class' => 'form-control',
                    'lable' => __('Path'),
                    'id' => "idPath",
                    'type' => 'text',
                    'placeholder' => __('Enter the paht name here...'),

                ]);
                ?>
            </div>
            <div class="form-group mt-3">
                <?= $this->Form->control('is_free', [
                    'class' => '',
                    'lable' => __('Free'),
                    'type' => 'checkbox',

                ]);
                ?>
            </div>
            <div class="form-group mt-3">
                <?= $this->Form->control('picture', [
                    'label' => __('Picture '),
                    'class' => 'form-control',
                    'type' => 'file',
                    'id' => 'idPicPath'
                ]); ?>

            </div>
            <div class="col-12 mt-4">
            <?= $this->Form->button(__('Save'), ['id' => 'saveLearningPath', 'class' => 'btn btn-md',"style" => 'background-color:#5C17E5;color: #FFF']); ?>
    </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
</div>
<style>
    label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    [type=checkbox] {
        width: 1rem;
        height: 1rem;
        border: 1px solid hsl(var(--primary-color));
    }
</style>
<script>
    $(document).ready(function() {
        $('#saveLearningPath').on('click', function(){
            location.reload();
        })
        $("#idPath").on("input", function() {
            if ($(this).val() == "") {
                $("#cardTitle").text("Path name");
            } else {
                $("#cardTitle").text($(this).val());
            }
        });

        $(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#pathImage').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#idPicPath").change(function() {
                readURL(this);
            });
        });
    });
</script>