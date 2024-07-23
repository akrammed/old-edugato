<div class="progress" data-value=<?= $value ?>>
    <span class="progress-left">
        <span class="progress-bar border-primary"></span>
    </span>
    <span class="progress-right">
        <span class="progress-bar border-primary"></span>
    </span>
    <div class="progress-value w-100 h-100 rounded-circle d-flex flex-column gap-1 align-items-center justify-content-center">
        <p class="text-base">A1 Level</p>
        <p class="text-2xl lh-1"><?= $value ?>%</p>
    </div>
</div>
<style>
    .progress {
        width: 160px;
        height: 160px;
        background: none;
        position: relative;
    }

    .progress::after {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 1rem solid hsl(var(--accent-color));
        position: absolute;
        top: 0;
        left: 0;
    }

    .progress>span {
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }

    .progress .progress-left {
        left: 0;
    }

    .progress .progress-bar {
        width: 100%;
        height: 100%;
        background: none;
        border-width: 1rem;
        border-style: solid;
        position: absolute;
        top: 0;
    }

    .progress .progress-left .progress-bar {
        left: 100%;
        border-top-right-radius: 80px;
        border-bottom-right-radius: 80px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }

    .progress .progress-right {
        right: 0;
    }

    .progress .progress-right .progress-bar {
        left: -100%;
        border-top-left-radius: 80px;
        border-bottom-left-radius: 80px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
    }

    .progress .progress-value {
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
<script>
    $(function() {
        $(".progress").each(function() {
            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');
            if (value > 0) {
                if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }
        })
        function percentageToDegrees(percentage) {
            return percentage / 100 * 360
        }
    });
</script>