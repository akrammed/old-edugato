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
        <li class="menu-item" style="height: 40px;">
            <?= $this->Html->link(
                 $this->element('icons/home').'<div data-i18n="Analytics" class="text-dark m-2">Dashboard</div>',
                '/admin',
                [
                    'class' => 'menu-link',
                    'style' => 'height: 40px;',
                    'escape' => false,
                ]
            );
            ?>
        </li>
        <li class="menu-item" style="height: 40px;">
            <?= $this->Html->link(
                 $this->element('icons/direction right') .'<div data-i18n="Analytics" class="text-dark m-2">Learning Paths</div>',
                '/learning-paths',
                [
                    'class' => 'menu-link',
                    'style' => 'height: 40px;',
                    'escape' => false,
                ]
            );
            ?>
        </li>
        <li class="menu-item" style="height: 40px;">
            <?= $this->Html->link(
                $this->element('icons/graduated').'<div data-i18n="Analytics" class="text-dark m-2">Courses</div>',
                '/list-courses',
                [
                    'class' => 'menu-link',
                    'style' => 'height: 40px;',
                    'escape' => false,
                ]
            );
            ?>
        </li>
       
       
        <li class="menu-header small text-dark">
            <span class="menu-header-text">Users</span>
        </li>
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user text-dark"></i>
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
                        '#',
                        [
                            'class' => 'menu-link',
                            'data-bs-toggle' => 'offcanvas',
                            'data-bs-target' => '#offcanvasEndUser',
                            'aria-controls' => 'offcanvasEnd',
                            'escape' => false,
                        ]
                    ); ?>
                </li>

            </ul>
        </li>
    </ul>
</aside>
