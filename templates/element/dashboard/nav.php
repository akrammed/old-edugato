<nav class="navbar navbar-expand-lg" style="height: 100px;">
  <div class="container-lg d-flex justify-content-between gap-4">
    <a class="navbar-brand" href="#">
        <img src="/img/new-logo.svg" alt="logo" width="87.1px" height="44px" class="img-fluid">
    </a>
    <div class="d-flex align-items-center gap-2 gap-lg-8">
        <?php if (!isset($layer) || $layer !== "edit-profile"): ?>
            <ul class="d-flex reset-list gap-2">
                <li class="nav-item">
                    <a href="#" class="btn btn-primary gap-1.5">
                        <?= $this->element('icons/scroll-icon', ['class' => 'w-6 h-6']) ?>
                        Start Scrolling
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn btn-primary-gradient gap-1.5">
                        <?= $this->element('icons/filter-icon', ['class' => 'w-6 h-6']) ?>
                        Play with Gato AI
                    </a>
                </li>
            </ul>
        <?php endif; ?>
        <ul class="d-flex reset-list gap-2">
            <li class=<?= "nav-item" . (!isset($layer) || $layer !== "edit-profile" ? ' d-none d-lg-block' : ''); ?>>
                <?= $this->element('dashboard/helper/pstatus-card', ['icon' => 'energy-icon', 'text' => '26']) ?>
            </li>
            <li class=<?= "nav-item" . (!isset($layer) || $layer !== "edit-profile" ? ' d-none d-lg-block' : ''); ?>>
                <?= $this->element('dashboard/helper/pstatus-card', ['icon' => 'cup-icon', 'text' => '115']) ?>
            </li>
            <li class="nav-item ms-2">
                <?= $this->element('dashboard/helper/user-menu') ?>
            </li>
        </ul>
    </div>
  </div>
</nav>