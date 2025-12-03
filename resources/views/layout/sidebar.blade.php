<!-- Sidebar Start -->
<aside class="left-sidebar with-vertical">
    <div>
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <!-- Sidebar scroll-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->

                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Apps</span>
                </li>
                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}" id="get-url">
                        <iconify-icon icon="solar:screencast-2-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- ---------------------------------- -->
                <!-- Data Master -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <iconify-icon icon="solar:home-angle-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Data Master</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link sublink ">
                                <span class="hide-menu ms-3">Departemen</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link sublink ">
                                <span class="hide-menu ms-3">Karyawan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link sublink ">
                                <span class="hide-menu ms-3">Inventaris</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link sublink ">
                                <span class="hide-menu ms-3">Dealer</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- ---------------------------------- -->
                <!-- Kunjungan -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('kunjungan*') ? 'active' : '' }}" href="{{ route('kunjungan.index') }}">
                        <iconify-icon icon="solar:buildings-2-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Kunjungan</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- End Sidebar scroll-->
    </div>
</aside>
<!--  Sidebar End -->
