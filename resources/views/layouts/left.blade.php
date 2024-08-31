<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->

            <li class="nav-item start {{ Request::segment(1)=='home' ? 'active' : '' }}">
                <a href="/home" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ in_array(Request::segment(1), ['department', 'jabatan', 'user', 'user-right','delay_range']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Master</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['department', 'jabatan', 'user', 'user-right','delay_range']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='user' ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}" class="nav-link ">
                            <span class="title">User</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='user-right' ? 'active' : '' }}">
                        <a href="{{ route('userRight.index') }}" class="nav-link ">
                            <span class="title">User Right</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='department' ? 'active' : '' }}">
                        <a href="{{ route('department.index') }}" class="nav-link ">
                            <span class="title">Department</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='jabatan' ? 'active' : '' }}">
                        <a href="{{ route('jabatan.index') }}" class="nav-link ">
                            <span class="title">Jabatan</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='delay_range' ? 'active' : '' }}">
                        <a href="{{ route('delay_range.index') }}" class="nav-link ">
                            <span class="title">Delay Range</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ in_array(Request::segment(1), ['kategori_berita','berita','pengumuman']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Portal Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['kategori_berita','berita','pengumuman']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='kategori_berita' ? 'active' : '' }}">
                        <a href="{{ route('kategori_berita.index') }}" class="nav-link ">
                            <span class="title">Kategori</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='berita' ? 'active' : '' }}">
                        <a href="{{ route('berita.index') }}" class="nav-link ">
                            <span class="title">Berita</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='pengumuman' ? 'active' : '' }}">
                        <a href="{{ route('pengumuman.index') }}" class="nav-link ">
                            <span class="title">Pengumuman</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ in_array(Request::segment(1), ['user_dc',
            'dms-user']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">DMS Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['user_dc']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='user_dc' ? 'active' : '' }}">
                        <a href="{{ route('user_dc.index') }}" class="nav-link ">
                            <span class="title">User DC</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='dms-user' ? 'active' : '' }}">
                        <a href="{{ route('dms.userLevel') }}" class="nav-link ">
                            <span class="title">User Level</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ in_array(Request::segment(1), ['dw_admin_department']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">DW Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['dw_admin_department']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='dw_admin_department' ? 'active' : '' }}">
                        <a href="{{ route('dw_admin_department') }}" class="nav-link ">
                            <span class="title">Admin Department</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="hide nav-item {{ in_array(Request::segment(1), ['admin_department', 'reminder_email_template']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Library Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['admin_department', 'reminder_email_template']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='admin_department' ? 'active' : '' }}">
                        <a href="{{ route('admin_department.index') }}" class="nav-link ">
                            <span class="title">Admin Department</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::segment(1)=='reminder_email_template' ? 'active' : '' }}">
                        <a href="{{ route('reminder_email_template.index') }}" class="nav-link ">
                            <span class="title">Reminder Email Template</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="hide nav-item {{ in_array(Request::segment(1), ['signature_admin_department']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Signature Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['signature_admin_department']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='signature_admin_department' ? 'active' : '' }}">
                        <a href="{{ route('signature_admin_department.index') }}" class="nav-link ">
                            <span class="title">Admin Department</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ in_array(Request::segment(1), ['kalibrasi-user']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Kalibrasi Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['kalibrasi-user']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='kalibrasi-user' ? 'active' : '' }}">
                        <a href="{{ route('kalibrasi.userLevel') }}" class="nav-link ">
                            <span class="title">User Level</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ in_array(Request::segment(1), ['reagensia-user']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Reagensia Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['reagensia-user']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='reagensia-user' ? 'active' : '' }}">
                        <a href="{{ route('reagensia.userLevel') }}" class="nav-link ">
                            <span class="title">User Level</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ in_array(Request::segment(1), ['stability-user']) ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">Stability Setting</span>
                    <span class="arrow {{ in_array(Request::segment(1), ['stability-user']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::segment(1)=='stability-user' ? 'active' : '' }}">
                        <a href="{{ route('stability.userLevel') }}" class="nav-link ">
                            <span class="title">User Level</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
