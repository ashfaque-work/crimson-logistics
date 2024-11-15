<div class="left-sidenav admin-left-sidebar">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ url('/dashboard') }}" class="logo">
            <span>
                <img src="{{ url('assets/images/crimson-logo.png') }}" alt="logo-small" class="logo logo-mb">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        {{-- apply role for ul --}}
        @hasrole('refiner')
            <ul class="metismenu left-sidenav-menu py-3">
                <li>
                    <a href="javascript: void(0);"> <i class="fas fa-home text-light"></i><span>Dashboard</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="#"><i
                                    class="fa fa-cart-shopping"></i>Orders</a></li>
                    </ul>
                </li>
            </ul>
        @endhasrole
        @hasrole('freight')
            <ul class="metismenu left-sidenav-menu py-3">
                <li>
                    <a href="javascript: void(0);"> <i class="fas fa-home text-light"></i><span>FDashboard</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="#"><i
                                    class="fa fa-cart-shopping"></i>Orders</a></li>
                    </ul>
                </li>
            </ul>
        @endhasrole
        @hasrole('shipper')
            <ul class="metismenu left-sidenav-menu py-3">
                <li>
                    <a href="javascript: void(0);"> <i class="fas fa-home text-light"></i><span>SDashboard</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="#"><i
                                    class="fa fa-cart-shopping"></i>Orders</a></li>
                    </ul>
                </li>
            </ul>
        @endhasrole
        @hasrole('client')
            <ul class="metismenu left-sidenav-menu py-3">
                <li>
                    <a href="javascript: void(0);"> <i class="fas fa-home text-light"></i><span>CDashboard</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="#"><i
                                    class="fa fa-cart-shopping"></i>Orders</a></li>
                    </ul>
                </li>
            </ul>
        @endhasrole
        {{-- end role --}}
    </div>
</div>
<!-- end left-sidenav-->
