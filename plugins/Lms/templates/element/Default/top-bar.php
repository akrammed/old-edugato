<div class="top-navbar d-flex border-bottom">
        <div class="container d-flex justify-content-between flex-column flex-lg-row">
            <div
                class="top-contact-box border-bottom d-flex flex-column flex-md-row align-items-center justify-content-center">


                <div class="d-flex align-items-center justify-content-between justify-content-md-center">


                    <div class="js-currency-select custom-dropdown position-relative">
                        <form action="/set-currency" method="post">
                            <input type="hidden" name="_token" value="yikLcGv8LIK3UZ7CXG1DSR517jNjYO6GZr3F42XC">
                            <input type="hidden" name="currency" value="USD">

                            <div class="custom-dropdown-toggle d-flex align-items-center cursor-pointer">
                                <div class="mr-5 text-secondary">
                                    <span class="js-lang-title font-14">USD ($)</span>
                                </div>
                                <i data-feather="chevron-down" class="icons" width="14px" height="14px"></i>
                            </div>
                        </form>

                        <div class="custom-dropdown-body py-10">

                            <div class="js-currency-dropdown-item custom-dropdown-body__item cursor-pointer active"
                                data-value="USD" data-title="USD ($)">
                                <div class=" d-flex align-items-center w-100 px-15 py-5 text-gray bg-transparent">
                                    <div class="size-32 position-relative d-flex-center bg-gray100 rounded-sm">
                                        $
                                    </div>

                                    <span class="ml-5 font-14">United States Dollar</span>
                                </div>
                            </div>
                            <div class="js-currency-dropdown-item custom-dropdown-body__item cursor-pointer "
                                data-value="EUR" data-title="EUR (€)">
                                <div class=" d-flex align-items-center w-100 px-15 py-5 text-gray bg-transparent">
                                    <div class="size-32 position-relative d-flex-center bg-gray100 rounded-sm">
                                        €
                                    </div>

                                    <span class="ml-5 font-14">Euro Member Countries</span>
                                </div>
                            </div>
                            <div class="js-currency-dropdown-item custom-dropdown-body__item cursor-pointer "
                                data-value="INR" data-title="INR (₹)">
                                <div class=" d-flex align-items-center w-100 px-15 py-5 text-gray bg-transparent">
                                    <div class="size-32 position-relative d-flex-center bg-gray100 rounded-sm">
                                        ₹
                                    </div>

                                    <span class="ml-5 font-14">India Rupee</span>
                                </div>
                            </div>

                        </div>
                    </div>


                    <form action="/locale" method="post" class="mr-15 mx-md-20">
                        <input type="hidden" name="_token" value="yikLcGv8LIK3UZ7CXG1DSR517jNjYO6GZr3F42XC">

                        <input type="hidden" name="locale">


                        <div class="language-select">
                            <div id="localItems" data-selected-country="US"
                                data-countries='{&quot;IQ&quot;:&quot;Arabic&quot;,&quot;US&quot;:&quot;English&quot;,&quot;ES&quot;:&quot;Spanish&quot;}'>
                            </div>
                        </div>
                    </form>


                    <form action="/search" method="get"
                        class="form-inline my-2 my-lg-0 navbar-search position-relative">
                        <input class="form-control mr-5 rounded" type="text" name="search" placeholder="Search..."
                            aria-label="Search">

                        <button type="submit"
                            class="btn-transparent d-flex align-items-center justify-content-center search-icon">
                            <i data-feather="search" width="20" height="20" class="mr-10"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="xs-w-100 d-flex align-items-center justify-content-between ">
                <div class="d-flex">

                    <div class="dropdown">
                        <button type="button" disabled class="btn btn-transparent dropdown-toggle"
                            id="navbarShopingCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="shopping-cart" width="20" height="20" class="mr-10"></i>

                        </button>

                        <div class="dropdown-menu" aria-labelledby="navbarShopingCart">
                            <div class="d-md-none border-bottom mb-20 pb-10 text-right">
                                <i class="close-dropdown" data-feather="x" width="32" height="32" class="mr-10"></i>
                            </div>
                            <div class="h-100">
                                <div class="navbar-shopping-cart h-100" data-simplebar>
                                    <div class="d-flex align-items-center text-center py-50">
                                        <i data-feather="shopping-cart" width="20" height="20" class="mr-10"></i>
                                        <span class="">Your cart is empty</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-left mx-5 mx-lg-15"></div>

                    <div class="dropdown">
                        <button type="button" class="btn btn-transparent dropdown-toggle" disabled
                            id="navbarNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell" width="20" height="20" class="mr-10"></i>

                        </button>

                        <div class="dropdown-menu pt-20" aria-labelledby="navbarNotification">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-auto navbar-notification-card" data-simplebar>
                                    <div class="d-md-none border-bottom mb-20 pb-10 text-right">
                                        <i class="close-dropdown" data-feather="x" width="32" height="32"
                                            class="mr-10"></i>
                                    </div>

                                    <div class="d-flex align-items-center text-center py-50">
                                        <i data-feather="bell" width="20" height="20" class="mr-10"></i>
                                        <span class="">Empty notifications</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="d-flex align-items-center ml-md-50">
                    <a href="/login" class="py-5 px-10 mr-10 text-dark-blue font-14">Login</a>
                    <a href="/register" class="py-5 px-10 text-dark-blue font-14">Register</a>
                </div>
            </div>
        </div>
    </div>
