<div id="required-alert" class="px-4 position-absolute top-0 right-0 h-20 w-100 d-flex align-items-center justify-content-center -transform-translateY bg-destructive/10 text-lg color-destructive text-center">
    <p>Please Select an answer</p>
</div>
<style>
    .-transform-translateY {
        transform: translateY(-100%);
        transition: transform 0.5s ease-in-out;
    }
    .-transform-translateY.show {
        transform: translateY(0);
    }
</style>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#required-alert').addClass('show');
            requiredCounter = setTimeout(function() {
                $('#required-alert').removeClass('show');
                setTimeout(function() {
                    $('#required-alert').remove();
                }, 500);
            }, 2000);
        }, 100);
    });
</script>