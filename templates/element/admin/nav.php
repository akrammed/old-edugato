 <nav class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme rounded-rem-1" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav me-3 d-xl-none">
        <a class="nav-item nav-link px-0" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 px-2" placeholder="Search..." aria-label="Search..." />
            </div>
        </div>
        <div class="nav-item navbar-dropdown dropdown-user dropdown custom-margin ms-auto">
            <button class="nav-link dropdown-toggle hide-arrow btn-reset" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <?= $this->Html->image('profile.png', [
                        'class' => 'w-px-40 h-auto rounded-circle',
                    ]) ?>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="https://www.edugato.net/profile" style="color:black">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="https://www.edugato.net/logout" style="color:black">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>