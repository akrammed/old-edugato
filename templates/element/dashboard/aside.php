<div id="dashboardSidebar" data-is-open="false" class="position-fixed flex-shrink-0 h-100 px-8 w-60 z-3 bg-background -translate-x-100 translate-x-xl-0" style="top: 0px; left: 0px; padding-top: 132px; transition: all 0.5s; border-right: 1px solid hsl(var(--border-color));">
    <ul class="text-lg d-flex flex-column gap-4 reset-list">
        <li class="nav-item">
            <a href="<?= $this->Url->build('/admin') ?>" class="nav-link align-middle px-0">
                <?= $this->element('icons/home-icon', ['class' => 'w-6 h-6']) ?> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $this->Url->build(['controller'=>'learningpaths', 'action'=>'index']) ?>" class="nav-link align-middle px-0">
                <?= $this->element('icons/direction-icon', ['class' => 'w-6 h-6']) ?> Learning Paths
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $this->Url->build('/playwithgato') ?>" class="nav-link align-middle px-0">
                <?= $this->element('icons/filter-icon', ['class' => 'w-6 h-6']) ?> Play With Gato
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link align-middle px-0">
                <?= $this->element('icons/graduated-icon', ['class' => 'w-6 h-6']) ?> Courses
            </a>
        </li>
    </ul>
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
    });
</script>