<div class="topbar">
    <!-- Navbar -->
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-nav float-end mb-0">
            <li class="dropdown hide-phone">
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-self-center topbar-icon topber-icon-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span id="notification-count" class="badge bg-danger rounded-pill noti-icon-badge">.</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0" style="">
                    <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                        Notifications <span id="notification-count-inner" class="badge bg-primary rounded-pill">.</span>
                    </h6>
                    <div id="notification-menu" class="notification-menu" data-simplebar="init" style="min-height: 300px; overflow-y: auto; ">
                        <div id="notification-loader" class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <!-- Loader HTML or image -->
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <!-- item-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 340px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar" style="height: 142px; display: block; transform: translate3d(0px, 0px, 0px);">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around mx-2">
                        <button href="" class="btn btn-primary dropdown-item text-center" id="mark-as-read-link">
                            Mark all as Read
                        </button>
                        <a href="#" class="dropdown-item text-center">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user mx-3" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ms-1 nav-user-name hidden-sm mx-2">
                        <?= ucfirst(Auth::user()->name) ?>
                    </span>
                    <img src="{{ url('assets/images/admin-profile.jfif') }}" alt="profile-user" class="rounded-circle thumb-xs" />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}"><i data-feather="user" class="align-self-center icon-xs icon-dual me-1"></i> Profile</a>
                    <div class="dropdown-divider mb-0"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();"><i data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i> Logout</a>
                    </form>
                </div>
            </li>
        </ul>
        <ul class="list-unstyled topbar-nav mb-0">
            <li>
                <button class="nav-link button-menu-mobile">
                    <i data-feather="menu" class="align-self-center topbar-icon topbar-icon-menu"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>