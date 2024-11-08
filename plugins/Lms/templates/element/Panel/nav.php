<nav id="navbar" class="navbar navbar-expand-lg navbar-light" style=" position: fixed !important;top: 0;
    width: 100%;
    z-index: 1000; ">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between w-100">

            <?= $this->Html->link(
                $this->Html->image('logo.png', ['class' => 'img-cover', 'style' => 'width: 100px;']),
                '/home',
                ['escape' => false, 'class' => 'navbar-brand navbar-order d-flex align-items-center justify-content-center mr-0']
            ) ?>

            <button class="navbar-toggler navbar-order" type="button" id="navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="mx-lg-30 d-none d-lg-flex flex-grow-1 navbar-toggle-content " id="navbarContent">
                <div class="navbar-toggle-header text-right d-lg-none">
                    <button class="btn-transparent" id="navbarClose">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>




            </div>
        </div>
        <div class="nav-icons-or-start-live navbar-order d-flex align-items-center justify-content-end">

            <div class="show-ai-content-drawer-btn d-flex-center mr-40">
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                    <title>exit_line</title>
                    <g id="exit_line" fill='none' fill-rule='nonzero'>
                        <path d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                        <path fill='#09244BFF' d='M12 3a1 1 0 0 1 .117 1.993L12 5H7a1 1 0 0 0-.993.883L6 6v12a1 1 0 0 0 .883.993L7 19h4.5a1 1 0 0 1 .117 1.993L11.5 21H7a3 3 0 0 1-2.995-2.824L4 18V6a3 3 0 0 1 2.824-2.995L7 3h5Zm5.707 5.464 2.828 2.829a1 1 0 0 1 0 1.414l-2.828 2.829a1 1 0 1 1-1.414-1.415L17.414 13H12a1 1 0 1 1 0-2h5.414l-1.121-1.121a1 1 0 0 1 1.414-1.415Z' />
                    </g>
                </svg>
                <?= $this->Html->link(__('Logout'), '/logout', ['class' => 'ml-5 font-weight-500 text-secondary font-14 d-none d-lg-block']) ?>
            </div>



        </div>


    </div>


</nav>