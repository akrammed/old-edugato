
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="border-radius: 16px;">
            <div class="app-brand demo">
                <?= $this->Html->link(
                    $this->Html->image('logo.png', ['class' => 'img-cover', 'style' => 'width: 100px;']),
                    '/home',
                    ['escape' => false, 'class' => 'app-brand-link']
                ) ?>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <li class="menu-item active ">
                    <?= $this->Html->link(
                        '<i class="menu-icon tf-icons bx bx-home-circle text-dark"></i><div data-i18n="Analytics" class="text-dark">Dashboard</div>',
                        '/admin',
                        [
                            'class' => 'menu-link',
                            'escape' => false,
                        ]
                    );
                    ?>
                </li>
                <li class="menu-header small text-dark">
                    <span class="menu-header-text">Courses</span>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top text-dark"></i>
                        <div data-i18n="Courses" class="text-dark">Courses</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Courses List" class="text-dark">Courses List</div>',
                                '/lms/courses',
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>
                        </li>
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Account Settings" class="text-dark">add Course</div>',
                                '/admin',
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>


                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-copy text-dark"></i>
                        <div data-i18n="Shorts" class="text-dark">Shorts</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Account Settings" class="text-dark">Shorts List</div>',
                                '/shorts',
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>
                        </li>
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Account Settings" class="text-dark">add Short</div>',
                                '/admin',
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>


                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-cube-alt text-dark"></i>
                        <div data-i18n="Quizs" class="text-dark">Quizs</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Account Settings" class="text-dark">Quizs List</div>',
                                '/admin',
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>
                        </li>
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Account Settings" class="text-dark">add Quiz</div>',
                                '/admin',
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>
                        </li>
                    </ul>
                </li>
                <li class="menu-header small text-dark">
                    <span class="menu-header-text">Users</span>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top text-dark"></i>
                        <div data-i18n="Courses" class="text-dark">Users</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Courses List" class="text-dark">Users List</div>',
                                ['plugin' => null, 'controller' => 'Users', 'action' => 'index'],
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>
                        </li>
                        <li class="menu-item">
                            <?= $this->Html->link(
                                '<div data-i18n="Account Settings" class="text-dark">add User</div>',
                                '/admin',
                                [
                                    'class' => 'menu-link',
                                    'escape' => false,
                                ]
                            );
                            ?>


                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        
