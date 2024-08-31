<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <h3 class="logo-default" style="color:#fff">Portal</h3>
                {{-- <img src="{{ asset('assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> --}}
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-inbox hide" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have
                                <span class="bold">7 New</span> Messages</h3>
                            <a href="app_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ asset('assets/layouts/layout3/img/avatar2.jpg') }}" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">Just Now </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ asset('assets/layouts/layout3/img/avatar3.jpg') }}" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">16 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ asset('assets/layouts/layout3/img/avatar1.jpg') }}" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Bob Nilson </span>
                                            <span class="time">2 hrs </span>
                                        </span>
                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ asset('assets/layouts/layout3/img/avatar2.jpg') }}" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">40 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="{{ asset('assets/layouts/layout3/img/avatar3.jpg') }}" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">46 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ asset('assets/layouts/layout/img/avatar3_small.jpg') }}" />
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fa fa-home"></i> Back to Portal
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i> Log Out
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
