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
         <ul class="metismenu left-sidenav-menu py-0">
             <li>
                 <a href="javascript: void(0);"> <i class="fas fa-home text-light"></i><span>Dashboard</span><span
                         class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                 <ul class="nav-second-level" aria-expanded="false">
                     <li class="nav-item"><a class="nav-link" href="{{ route('conductor.users.index') }}"><i
                                 class="fas fa-user text-light"></i>Users</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ route('conductor.products.index') }}"><i
                                 class="fas fa-shop text-light"></i>Products</a></li>
                 </ul>
             </li>
         </ul>
         <ul class="metismenu left-sidenav-menu py-0">
             <li>
                 <a href="javascript: void(0);"> <i class="fa-solid fa-cart-shopping"></i><span>Orders</span><span
                         class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                 <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{ route('conductor.orders.index') }}"><i
                        class="fa fa-info"></i></i>New Orders</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ route('conductor.orders.readyToReceive') }}"><i
                                 class="fa fa-info"></i></i>Ready To Receive</a></li>
                 </ul>
             </li>
         </ul>
     </div>
 </div>
 <!-- end left-sidenav-->
