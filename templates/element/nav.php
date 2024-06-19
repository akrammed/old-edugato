<style>
    .navbar-title{
        color:black !important;
        font-family: Poppins;
    font-size: 22px;
    font-style: normal;
    font-weight: 600;
    line-height: 24px; /* 109.091% */ 
    }
</style>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme custom-navbar-style custom-header" id="layout-navbar" style="border-radius: 16px !important;">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <span class="navbar-title">Learning Path - General English </span>
                        </div>
                    </div>
                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <li class="nav-item lh-1 me-3 custom-display">
                        <?php echo $this->element('icons/score'); ?>

                    </li>
                    <li class="nav-item lh-1 me-3 custom-display">
                        <?php echo $this->element('icons/points'); ?>

                    </li>

                    <li class="nav-item lh-1 me-3 custom-display">
                        <?php echo $this->element('icons/notification'); ?>

                    </li>
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown custom-margin">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                <?= $this->Html->image('profile.png', ['class' => 'w-px-40 h-auto rounded-circle']) ?>
                                </div>
                            </a>
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
                        </li>
                    </ul>
                </div>
            </nav>