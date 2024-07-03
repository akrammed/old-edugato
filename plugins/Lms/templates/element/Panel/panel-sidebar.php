<?php
/**
 * @var array $currentSessionUser
 * @var boolean $isAdmin
 * @var boolean $isStudent
 * @var boolean isInstructor
 */

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="panel-sidebar pt-50 pb-25 px-25" id="panelSidebar">
    <button class="btn-transparent panel-sidebar-close sidebarNavToggle">
        <i data-feather="x" width="24" height="24"></i>
    </button>




    <div class="d-flex flex-column ">
        <ul id="panel-sidebar-scroll" class="sidebar-menu pt-10  ">

            <li class="sidenav-item ">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#homeCollapse" role="button"
                    aria-expanded="false" aria-controls="studentsCollapse">
                    <span class="sidenav-item-icon mr-10">
                    <i class="bi bi-house-door" style="font-size:25px;"></i>
                    </span>
                    <span class="font-14 text-dark-blue font-weight-500">
                        <?= __('Home') ?>
                    </span>
                </a>

                <div class="collapse " id="homeCollapse">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 ">
                        <?= $this->Html->link(__('Dashboard'), '/dashboard', ['class' => 'font-14 text-dark-blue font-weight-500']) ?>

                        </li>

                    </ul>
                </div>
            </li>
            <li class="sidenav-item ">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#homeCollapse2" role="button"
                    aria-expanded="false" aria-controls="studentsCollapse">
                    <span class="sidenav-item-icon mr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g id="Mask_Group_17" clip-path="url(#clip-path)" data-name="Mask Group 17"
                                transform="translate(-25 -410)">
                                <g id="online-class" transform="translate(25 410)">
                                    <path id="Path_153"
                                        d="M22.078 12.319a2.112 2.112 0 0 0 1.922-2.1V3.656a2.112 2.112 0 0 0-2.109-2.109h-6.985A2.112 2.112 0 0 0 12.8 3.656v2.766H4.031a2.112 2.112 0 0 0-2.109 2.109v8.438a2.1 2.1 0 0 0 .121.7h-.777A1.267 1.267 0 0 0 0 18.938a3.52 3.52 0 0 0 3.516 3.516h16.968A3.52 3.52 0 0 0 24 18.938a1.267 1.267 0 0 0-1.266-1.266h-.777a2.1 2.1 0 0 0 .121-.7zM14.2 3.656a.7.7 0 0 1 .7-.7h6.984a.7.7 0 0 1 .7.7v6.562a.7.7 0 0 1-.7.7h-6.509a.7.7 0 0 0-.373.107l-1.418.886.589-1.963a.7.7 0 0 0 .03-.2zm6.281 17.391H3.516a2.112 2.112 0 0 1-2.1-1.969h21.173a2.112 2.112 0 0 1-2.105 1.969zM6.7 12.375a.8.8 0 1 1 .8.8.8.8 0 0 1-.8-.8zm-.375 3c0-.424.548-.8 1.172-.8a1.435 1.435 0 0 1 .885.287.692.692 0 0 1 .287.51v2.3H6.328zm3.75 2.3v-2.3a2.074 2.074 0 0 0-.815-1.608l-.036-.027a2.2 2.2 0 1 0-3.455 0 2.073 2.073 0 0 0-.851 1.634v2.3h-.887a.7.7 0 0 1-.7-.7V8.531a.7.7 0 0 1 .7-.7H12.8v1.816l-.559 1.864a1.4 1.4 0 0 0 2.092 1.6l1.247-.779h5.1v4.641a.7.7 0 0 1-.7.7z"
                                        class="cls-3" data-name="Path 153" />
                                    <path id="Path_154"
                                        d="M19.125 7.922h-1.5a.7.7 0 0 0 0 1.406h1.5a.7.7 0 0 0 0-1.406z" class="cls-3"
                                        data-name="Path 154" />
                                    <path id="Path_155" d="M16.5 5.953h3.75a.7.7 0 0 0 0-1.406H16.5a.7.7 0 0 0 0 1.406z"
                                        class="cls-3" data-name="Path 155" />
                                </g>
                            </g>
                        </svg>
                    </span>
                    <span class="font-14 text-dark-blue font-weight-500">
                        <?= __('Courses') ?>
                    </span>
                </a>

                <div class="collapse " id="homeCollapse2">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 ">

                        <?= $this->Html->link(__('Courses'), '/lms/courses', ['class' => 'font-14 text-dark-blue font-weight-500']) ?>

                        </li>

                    </ul>
                </div>
                <div class="collapse " id="homeCollapse2">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 ">

                        <?= $this->Html->link(__('Shorts'), '/shorts', ['class' => 'font-14 text-dark-blue font-weight-500']) ?>

                        </li>

                    </ul>
                </div>
            </li>

            <li class="sidenav-item ">
                <a class="d-flex align-items-center" data-toggle="collapse" href="#studentsCollapse" role="button"
                    aria-expanded="false" aria-controls="studentsCollapse">
                    <span class="sidenav-item-icon mr-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <defs>
                                <style>
                                    .cls-2 {
                                        fill: #1f3b64
                                    }
                                </style>
                            </defs>
                            <g id="Group_1288" transform="translate(-209 -396)">
                                <path id="Rectangle_572" fill="rgba(255,255,255,0)" d="M0 0H24V24H0z"
                                    transform="translate(209 396)" />
                                <g id="Group_1287" transform="translate(33.254 -307)">
                                    <g id="Group_1260" transform="translate(176.5 703)">
                                        <g id="student_2_">
                                            <g id="Group_1255">
                                                <g id="Group_1254">
                                                    <path id="Path_1551"
                                                        d="M37.094 11.371c0-7.914.022-7.41-.052-7.592a.7.7 0 0 0-.458-.94L26.74.028a.7.7 0 0 0-.386 0L16.51 2.84a.7.7 0 0 0 0 1.352l3.709 1.06v3.186a7.158 7.158 0 0 0 3.463 6.268l-.388.776a7.63 7.63 0 0 0-5.033 2.3A7.826 7.826 0 0 0 16 23.3a.7.7 0 0 0 .7.7h19.691a.7.7 0 0 0 .7-.7 7.825 7.825 0 0 0-2.261-5.511 7.631 7.631 0 0 0-5.032-2.3l-.388-.776a7.158 7.158 0 0 0 3.463-6.268V5.252l2.813-.8v6.923a2.113 2.113 0 0 0-1.406 1.988v1.406a.7.7 0 0 0 .7.7h2.82a.7.7 0 0 0 .7-.7V13.36a2.113 2.113 0 0 0-1.406-1.989zm-11.25 11.223h-8.4a6.38 6.38 0 0 1 5.922-5.708l2.478 3.714zm-1.3-6.472l.435-.871a5.733 5.733 0 0 0 3.132 0l.435.871-2 3zm5.182.765a6.38 6.38 0 0 1 5.922 5.707h-8.4V20.6zm-3.181-2.824a5.15 5.15 0 0 1-4.828-4.528 11.9 11.9 0 0 0 4.828 1.012 11.9 11.9 0 0 0 4.828-1.012 5.15 5.15 0 0 1-4.826 4.528zm4.906-6.419a.641.641 0 0 1-.33.457 10.427 10.427 0 0 1-4.577 1.04A10.426 10.426 0 0 1 21.97 8.1a.678.678 0 0 1-.345-.611V5.654c5.1 1.458 4.781 1.378 4.922 1.378s-.182.08 4.922-1.378a17.749 17.749 0 0 1-.016 1.99zM26.547 5.6l-7.284-2.084 7.284-2.081 7.284 2.081zm10.547 8.466h-1.407v-.7a.7.7 0 1 1 1.406 0z"
                                                        class="cls-2" transform="translate(-16)" />
                                                </g>
                                            </g>
                                            <g id="Group_1257" transform="translate(14.062 19.688)">
                                                <g id="Group_1256">
                                                    <path id="Path_1552"
                                                        d="M318.109 420H316.7a.7.7 0 1 0 0 1.406h1.406a.7.7 0 1 0 0-1.406z"
                                                        class="cls-2" transform="translate(-316 -420.001)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>
                    <span class="font-14 text-dark-blue font-weight-500">
                        <?= __('Users') ?>
                    </span>
                </a>

                <div class="collapse " id="studentsCollapse">
                    <ul class="sidenav-item-collapse">
                        <li class="mt-5 ">
                            <?= $this->Html->link(__('New user'), ['plugin' => null, 'controller' => 'Users', 'action' => 'add']) ?>
                        </li>
                        <li class="mt-5 ">
                            <?= $this->Html->link(__('List Users'), ['plugin' => null, 'controller' => 'Users', 'action' => 'index']) ?>
                        </li>
                    </ul>
                </div>
            </li>






            <li class="sidenav-item ">

                <div class="d-flex align-items-center">
                    <span class="sidenav-item-icon assign-strock mr-10">
                        <i data-feather="user" stroke="#1f3b64" stroke-width="1.5" width="24" height="24"
                            class="mr-10 webinar-icon"></i>
                    </span>
                    <?= $this->Html->link(__('My Profile'), '/profile', ['class' => 'font-14 text-dark-blue font-weight-500']) ?>

                </div>
            </li>

            <li class="sidenav-item">
                <div href="/logout" class="d-flex align-items-center">
                    <span class="sidenav-logout-icon sidenav-item-icon mr-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23.999" height="23.999"
                            viewBox="0 0 23.999 23.999">
                            <g id="Group_1263" transform="translate(-161.102 -869.102)">
                                <g id="power-button" transform="translate(161.102 869.102)">
                                    <path id="Path_1541"
                                        d="M20.473 3.526a11.984 11.984 0 1 0 0 16.947 11.945 11.945 0 0 0 0-16.947zM12 22.591A10.591 10.591 0 1 1 22.591 12 10.6 10.6 0 0 1 12 22.591z"
                                        class="cls-1" />
                                    <path id="Path_1542"
                                        d="M153.7 168.953a.7.7 0 0 0-.93 1.047 3.8 3.8 0 1 1-5.016-.019.7.7 0 1 0-.925-1.058 5.2 5.2 0 1 0 6.875.025z"
                                        class="cls-1" transform="translate(-138.252 -160.845)" />
                                    <path id="Path_1543"
                                        d="M241.753 126.205a.7.7 0 0 0 .7-.7v-3.749a.7.7 0 1 0-1.406 0v3.744a.7.7 0 0 0 .706.705z"
                                        class="cls-1" transform="translate(-229.754 -115.378)" />
                                </g>
                            </g>
                        </svg>
                    </span>
                    <?= $this->Html->link(__('Log out'), '/logout', ['class' => 'font-14 text-dark-blue font-weight-500']) ?>


                </div>
            </li>

        </ul>


    </div>


</div>
