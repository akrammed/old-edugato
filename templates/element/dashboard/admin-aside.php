<div id="dashboardSidebar" data-is-open="false" class="position-fixed d-flex flex-column flex-shrink-0 h-100 px-4 pb-8 bg-background-alt w-60 z-3 bg-background -translate-x-100 translate-x-xl-0" style="top: 0px; left: 0px; transition: all 0.5s; border-right: 1px solid hsl(var(--border-color));">
    <div class="d-flex align-items-center flex-shrink-0 px-4 position-relative" style="height: 100px;">
        <button class="btn-reset d-block d-xl-none position-absolute text-lg" style="right: 0rem; top: 1rem;" id="close-aside">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <a href="#" style="padding-bottom: 2px;">
            <?= $this->Html->image('new-logo.svg', ['class' => 'img-fluid']) ?>
        </a>
    </div>
    <div class="d-flex flex-column gap-6 justify-content-between flex-grow-1">
        <ul class="text-lg d-flex flex-column gap-1 reset-list" style="padding-top: 2rem;">
            <li class="nav-item">
                <a href="<?= $this->Url->build('/admin') ?>" class="nav-link align-middle rounded-lg py-2 px-4 admin-active-link">
                    <?= $this->element('icons/home-icon', ['class' => 'w-6 h-6']) ?> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= $this->Url->build(['controller'=>'learningpaths', 'action'=>'index']) ?>" class="nav-link align-middle rounded-lg py-2 px-4">
                    <?= $this->element('icons/direction-icon', ['class' => 'w-6 h-6']) ?> Learning Paths
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link nav-link align-middle rounded-lg py-2 px-4">
                    <?= $this->element('icons/graduated-icon', ['class' => 'w-6 h-6']) ?> Courses
                </a>
            </li>
        </ul>
        <ul class="text-lg d-flex flex-column gap-1 reset-list" style="padding-top: 2rem;">
            <li class="nav-item">
                <a href="#" class="nav-link align-middle rounded-lg py-2 px-4">
                    <?= $this->element('icons/user-icon', ['class' => 'w-6 h-6']) ?> Users
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link align-middle rounded-lg py-2 px-4">
                    <?= $this->element('icons/settings-icon', ['class' => 'w-6 h-6']) ?> Settings
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#toggleSidebarButton').on('click', function() {
            var $sidebar = $('#dashboardSidebar');
            var isOpen = $sidebar.attr('data-is-open') === 'true';
            if (isOpen) {
                $sidebar.removeClass('sidebar-open').attr('data-is-open', 'false');
            } else {
                $sidebar.addClass('sidebar-open').attr('data-is-open', 'true');
            }
        });
        $('#close-aside').on('click', function() {
            var $sidebar = $('#dashboardSidebar');
            $sidebar.removeClass('sidebar-open').attr('data-is-open', 'false');
        });
    });
</script>