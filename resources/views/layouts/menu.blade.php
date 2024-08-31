<div class="page-header-menu">
    <div class="container">
        <!-- BEGIN HEADER SEARCH BOX -->
        <form class="search-form" action="page_general_search.html" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <!-- END HEADER SEARCH BOX -->
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu  ">
            <ul class="nav navbar-nav">
                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown {{ in_array(Request::segment(1), ['home']) ? 'active' : '' }}">
                    <a href="/"> Dashboard
                        <span class="arrow"></span>
                    </a>
                </li>
                @if (Auth::user()->jabatan_id == 1)
                    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown {{ in_array(Request::segment(1), ['department','kategori','produk','jenis-dokumen']) ? 'active' : '' }}">
                        <a href="javascript:;"> Master
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li aria-haspopup="true" class="{{ Request::segment(1)=='department' ? 'active' : '' }}">
                                <a href="/department" class="nav-link ">Admin Department</a>
                            </li>
                            <li aria-haspopup="true" class="{{ Request::segment(1)=='kategori' ? 'active' : '' }}">
                                <a href="/kategori" class="nav-link ">Kategori</a>
                            </li>
                            <li aria-haspopup="true" class="{{ Request::segment(1)=='produk' ? 'active' : '' }}">
                                <a href="/produk" class="nav-link ">Produk</a>
                            </li>
                            <li aria-haspopup="true" class="{{ Request::segment(1)=='jenis-dokumen' ? 'active' : '' }}">
                                <a href="/jenis-dokumen" class="nav-link ">Jenis Dokumen</a>
                            </li>
                        </ul>
                    </li>
                    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown {{ in_array(Request::segment(1), ['user']) ? 'active' : '' }}">
                        <a href="/user"> User
                            <span class="arrow"></span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->jabatan_id != 1 && Auth::user()->department->admin_user_id == Auth::user()->id)
                    <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown {{ in_array(Request::segment(1), ['dokumen']) ? 'active' : '' }}">
                        <a href="/dokumen"> Dokumen
                            <span class="arrow"></span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>
