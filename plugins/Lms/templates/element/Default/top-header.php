<div class="top-navbar d-flex border-bottom">
    <div class="container d-flex justify-content-between flex-column flex-lg-row">


        <div class="xs-w-100 d-flex align-items-center justify-content-between ">


            <div class="custom-dropdown navbar-auth-user-dropdown position-relative ml-50">
                <div class="custom-dropdown-toggle d-flex align-items-center navbar-user cursor-pointer">
                    <?=  $this->Html->image('cat.png', ['class' => 'rounded-circle', 'escape' => false]) ?>
                    <span class="font-16 user-name ml-10 text-dark-blue font-14">
                        <?= $currentSessionUser['first_name'].' '.$currentSessionUser['last_name'] ?> </span>
                </div>

                <div class="custom-dropdown-body pb-10">

                    <div class="dropdown-user-avatar d-flex align-items-center p-15 m-15 mb-10 rounded-sm border">

                        <div class="ml-5">
                            <div class="font-14 font-weight-bold text-secondary">
                                <?= $currentSessionUser['first_name'].' '.$currentSessionUser['last_name'] ?> </div>
                            <span class="mt-5 text-gray font-12"><?= __('User Role ')?></span>
                        </div>
                    </div>


                    <ul class="my-8">


                        <?php
                    if ($currentSessionUser != null ) {
                        if (($currentSessionUser['role_id'] == 2)) {
                    ?>
                        <li class="navbar-auth-user-dropdown-item">
                            <div class="d-flex align-items-center w-100 px-15 py-10 text-gray font-14 bg-transparent">
                                <div class="icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <g id="Group_1264" transform="translate(-188.102 -869.102)">
                                            <g id="Group_1262">
                                                <g id="speedometer" transform="translate(188.102 869.102)">
                                                    <path id="Path_1547"
                                                        d="M20.484 3.515a12 12 0 0 0-16.97 16.97 12 12 0 0 0 16.97-16.97zM12 22.593A10.594 10.594 0 1 1 22.593 12 10.606 10.606 0 0 1 12 22.593zm0 0"
                                                        class="cls-1" />
                                                    <path id="Path_1548"
                                                        d="M118.647 321.206a.7.7 0 0 0-.5-.206h-8.094a.7.7 0 0 0-.5.206l-2.228 2.228a.7.7 0 0 0-.012.982 9.357 9.357 0 0 0 13.569 0 .7.7 0 0 0-.012-.982zm-4.544 4.716a7.882 7.882 0 0 1-5.273-2l1.517-1.517h7.512l1.517 1.517a7.882 7.882 0 0 1-5.273 2zm0 0"
                                                        class="cls-1" transform="translate(-102.104 -305.954)" />
                                                    <path id="Path_1549"
                                                        d="M216.719 120.194a.7.7 0 0 0-.919.38l-1.606 3.876h-.091a2.063 2.063 0 1 0 1.39.541l1.606-3.877a.7.7 0 0 0-.38-.919zm-2.616 6.969a.654.654 0 1 1 .654-.654.655.655 0 0 1-.657.654zm0 0"
                                                        class="cls-1" transform="translate(-202.104 -114.509)" />
                                                    <path id="Path_1550"
                                                        d="M65.375 56A9.385 9.385 0 0 0 56 65.375a.7.7 0 0 0 .7.7h1.25a.7.7 0 1 0 0-1.406h-.516a7.933 7.933 0 0 1 1.83-4.409l.362.362a.7.7 0 1 0 .994-.994l-.362-.362a7.934 7.934 0 0 1 4.41-1.83v.516a.7.7 0 1 0 1.406 0v-.516a7.934 7.934 0 0 1 4.41 1.83l-.362.362a.7.7 0 0 0 .994.994l.362-.362a7.932 7.932 0 0 1 1.83 4.409H72.8a.7.7 0 0 0 0 1.406h1.25a.7.7 0 0 0 .7-.7A9.385 9.385 0 0 0 65.375 56zm0 0"
                                                        class="cls-1" transform="translate(-53.376 -53.375)" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <span>&nbsp;&nbsp;</span>
                                <?= $this->Html->link(__('Dashboard'),'/dashboard',['class'=>'ml-5']) ?>
                            </div>
                        </li>
                        <?php
                        }}
                    ?>


                        <li class="navbar-auth-user-dropdown-item">
                            <div class="d-flex align-items-center w-100 px-15 py-10 text-gray font-14 bg-transparent">
                                <div class="icons">
                                    <span class="sidenav-item-icon mr-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g id="Mask_Group_17" clip-path="url(#clip-path)" data-name="Mask Group 17"
                                                transform="translate(-25 -410)">
                                                <g id="online-class" transform="translate(25 410)">
                                                    <path id="Path_153"
                                                        d="M22.078 12.319a2.112 2.112 0 0 0 1.922-2.1V3.656a2.112 2.112 0 0 0-2.109-2.109h-6.985A2.112 2.112 0 0 0 12.8 3.656v2.766H4.031a2.112 2.112 0 0 0-2.109 2.109v8.438a2.1 2.1 0 0 0 .121.7h-.777A1.267 1.267 0 0 0 0 18.938a3.52 3.52 0 0 0 3.516 3.516h16.968A3.52 3.52 0 0 0 24 18.938a1.267 1.267 0 0 0-1.266-1.266h-.777a2.1 2.1 0 0 0 .121-.7zM14.2 3.656a.7.7 0 0 1 .7-.7h6.984a.7.7 0 0 1 .7.7v6.562a.7.7 0 0 1-.7.7h-6.509a.7.7 0 0 0-.373.107l-1.418.886.589-1.963a.7.7 0 0 0 .03-.2zm6.281 17.391H3.516a2.112 2.112 0 0 1-2.1-1.969h21.173a2.112 2.112 0 0 1-2.105 1.969zM6.7 12.375a.8.8 0 1 1 .8.8.8.8 0 0 1-.8-.8zm-.375 3c0-.424.548-.8 1.172-.8a1.435 1.435 0 0 1 .885.287.692.692 0 0 1 .287.51v2.3H6.328zm3.75 2.3v-2.3a2.074 2.074 0 0 0-.815-1.608l-.036-.027a2.2 2.2 0 1 0-3.455 0 2.073 2.073 0 0 0-.851 1.634v2.3h-.887a.7.7 0 0 1-.7-.7V8.531a.7.7 0 0 1 .7-.7H12.8v1.816l-.559 1.864a1.4 1.4 0 0 0 2.092 1.6l1.247-.779h5.1v4.641a.7.7 0 0 1-.7.7z"
                                                        class="cls-3" data-name="Path 153" />
                                                    <path id="Path_154"
                                                        d="M19.125 7.922h-1.5a.7.7 0 0 0 0 1.406h1.5a.7.7 0 0 0 0-1.406z"
                                                        class="cls-3" data-name="Path 154" />
                                                    <path id="Path_155"
                                                        d="M16.5 5.953h3.75a.7.7 0 0 0 0-1.406H16.5a.7.7 0 0 0 0 1.406z"
                                                        class="cls-3" data-name="Path 155" />
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <span>&nbsp;&nbsp;</span>

                                <?php
                    if ($currentSessionUser != null ) {
                        if (($currentSessionUser['course_id'] != 0)) {
                    ?>
                                <?= $this->Html->link(__('My Courses'), ['plugin'=>'Lms','controller' => 'Courses', 'action' => 'Watch', $currentSessionUser['course_id'] ],['class'=>'ml-5']) ?>
                                <?php
                        }else {

                            echo $this->Html->link(__('My Courses'), ['plugin'=>'Lms','controller' => 'Homes', 'action' => 'Courses' ],['class'=>'ml-5']);

                        }

                    }
                    ?>
                            </div>
                        </li>

                        <li class="navbar-auth-user-dropdown-item">
                            <div class="d-flex align-items-center w-100 px-15 py-10 text-gray font-14 bg-transparent">

                                <div class="icons">
                                    <span class="sidenav-item-icon assign-strock mr-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#1f3b64" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user mr-10 webinar-icon">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </span>
                                </div>
                                <span>&nbsp;&nbsp;</span>
                                <?= $this->Html->link(__('My Profile'),'/profile',['class'=>'ml-5']) ?>

                            </div>
                        </li>

                        <li class="navbar-auth-user-dropdown-item">
                            <div class="d-flex align-items-center w-100 px-15 py-10 text-danger font-14 bg-transparent">
                                <div class="icons">
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
                                </div>
                                <span>&nbsp;&nbsp;</span>
                                <?= $this->Html->link(__('Log out'),'/logout',['class'=>'ml-5']) ?>

                            </div>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
