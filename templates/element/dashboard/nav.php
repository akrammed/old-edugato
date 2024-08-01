<?php 
    $layers = ['dashboard', 'shorts', 'admin'];
    $liHideClass = (!empty($layer) && in_array($layer, $layers)) ? ' d-none d-lg-block' : '';
?>
<nav class="navbar navbar-expand-lg" style="height: 100px;">
  <div class="container-xl d-flex justify-content-between gap-8">
    <?php if (isset($layer) && $layer !== 'admin'): ?>
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', '']) ?>" style="padding-bottom: 2px;">
            <?= $this->Html->image('new-logo.svg', ['class' => 'img-fluid']) ?>
        </a>
    <?php endif; ?>
    <div class="d-flex align-items-center gap-2 gap-lg-8 flex-grow-1 justify-content-end">
        <?php if (isset($layer) && $layer === 'admin'): ?>
            <button id="toggleSidebarButton" class="d-xl-none btn btn-primary btn-icon me-auto">
                <i class="fa-solid fa-bars"></i>
            </button>
        <?php endif; ?>
        <div class="d-flex align-items-center gap-2 gap-lg-8">
            <?php if (!empty($layer) && in_array($layer, $layers) && $layer !== 'admin'): ?>
                <ul class="d-flex reset-list gap-2">
                    <?php if ($layer === 'dashboard'): ?>
                        <li class="nav-item">
                            <a href="#" class="btn btn-primary gap-1.5">
                                <?= $this->element('icons/scroll-icon', ['class' => 'w-6 h-6']) ?>
                                Start Scrolling
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($layer === 'shorts'): ?>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'dashboard', 'admin']) ?>" class="btn btn-light gap-1.5">
                                <?= $this->element('icons/home-icon', ['class' => 'w-6 h-6']) ?>
                                Return Home
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'play', 'playwithgato']) ?>" class="btn btn-primary-gradient gap-1.5">
                            <?= $this->element('icons/filter-icon', ['class' => 'w-6 h-6']) ?>
                            Play with Gato AI
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
            <ul class="d-flex reset-list gap-2">
                <?php if (isset($layer) && $layer !== 'admin'): ?>
                    <li class="nav-item<?= $liHideClass; ?>">
                        <?= $this->element('dashboard/helper/pstatus-card', ['icon' => 'energy-icon', 'text' => '26']) ?>
                    </li>
                    <li class="nav-item<?= $liHideClass; ?>">
                        <?= $this->element('dashboard/helper/pstatus-card', ['icon' => 'cup-icon', 'text' => '115']) ?>
                    </li>
                <?php endif; ?>
                <li class="nav-item ms-2">
                    <?= $this->element('dashboard/helper/user-menu') ?>
                </li>
                <?php if (!empty($sidebar) && $sidebar && (isset($layer) && $layer !== 'admin')): ?>
                    <button id="toggleSidebarButton" class="d-xl-none btn btn-primary btn-icon">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                <?php endif;?>
            </ul>
        </div>
    </div>
  </div>
</nav>