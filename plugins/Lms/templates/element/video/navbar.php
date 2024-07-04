<div class="navbar-container">

                <nav style="width: 66% !important; margin-left: 2%;"
                    class="right-navbar layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center w-100" id="navbar-collapse">
                        <!-- Center Title -->
                        <div class="navbar-nav mx-auto">
                            <div class="nav-item">
                                <div class="text-dark text-center"
                                    style="font-weight: 700;color: black !important;font-size: 22px;;">
                                    <?= $course->title ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <div style="width: 30% !important;"
                    class="left-navbar layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">

                    <div class="navbar-nav-right d-flex align-items-center">
                        <ul class="navbar-nav flex-row align-items-center ms-auto"
                            style="    margin-left: 18% !important;">

                            <li class="nav-item lh-1 me-3">
                                <?php echo $this->element('icons/score'); ?>

                            </li>
                            <li class="nav-item lh-1 me-3">
                                <?php echo $this->element('icons/points'); ?>

                            </li>

                            <li class="nav-item lh-1 me-3">
                                <?php echo $this->element('icons/notification'); ?>

                            </li>
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <?= $this->Html->image('profile.png', ['class' => 'w-px-40 h-auto rounded-circle']) ?>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a class="dropdown-item" href="/edugato-v-1.4.3/profile" style="color:black">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/edugato-v-1.4.3/logout" style="color:black">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>


                </div>
            </div>
