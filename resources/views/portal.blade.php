<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Portal Widatra Bhakti</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #7 for dashboard & statistics" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {{-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> --}}
        <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/mapplic/mapplic/mapplic.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('assets/layouts/layout7/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/layouts/layout7/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="clearfix">
                <!-- BEGIN LOGO -->
                <div class="page-logo" style="margin-left:30px">
                    <h1 style="color:#000">Portal Internal Widatra</h1>
                    {{-- <a href="#"> --}}
                        {{-- <img src="{{asset('assets/layouts/layout7/img/logo.png')}}" alt="logo" class="logo-default" />  --}}
                    {{-- </a> --}}
                </div>
                <!-- END LOGO -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        @if (!Auth::user())
                            <li class="dropdown dropdown-user">
                                <a href="{{ route('login') }}" class="dropdown-toggle">
                                    <h3><i class="fa fa-user"></i> Login</h3>
                                </a>
                            </li>
                        @else
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <div class="dropdown-user-inner">
                                        <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                        <img alt="" src="{{ asset('assets/layouts/layout7/img/avatar1.jpg') }}" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    @if (Auth::user()->jabatan_id == 1)
                                        <li>
                                            <a href="/home">
                                                <i class="fa fa-wrench"></i> Setting
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Log Out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        @endif
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container page-content-inner page-container-bg-solid">
            <!-- BEGIN BREADCRUMBS -->
            <!-- Remove "hide" class from "breadcrumbs hide" DIV and "margin-top-30" class from below "container-fluid container-lf-space margin-top-30" DIV in order to use the page breadcrumbs -->
            <div class="breadcrumbs">
                <div class="container-fluid">
                    <h2 class="breadcrumbs-title">Selamat Datang di Halaman "Portal Internal Widatra"</h2>
                </div>
                @if (session('message'))
                    <div class="alert alert-dismissable {{ session('alert-class') }}">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true"></button>
                        <p> {{ session('message') }} </p>
                    </div>
                @endif
            </div>
            <!-- END BREADCRUMBS -->
            <!-- BEGIN CONTENT -->
            <div class="container-fluid container-lf-space ">
                <!-- BEGIN PAGE BASE CONTENT -->
                <div class="row widget-row">
                    <div class="col-md-2">
                        <!-- BEGIN WIDGET THUMB -->
                        <a href="http://dms.{{ env('SESSION_DOMAIN', 'widatra.com') }}" >
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-layers"></i>
                                </div>
                                <span class="widget-thumb-subtitle"><b><h3>DMS</h3></b></span>
                            </div>
                        </a>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-2">
                        <!-- BEGIN WIDGET THUMB -->
                        <a href="http://dw.{{ env('SESSION_DOMAIN', 'widatra.com') }}" >
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-briefcase"></i>
                                </div>
                                <span class="widget-thumb-subtitle"><b><h3>Doc Workflow</h3></b></span>
                            </div>
                        </a>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-2">
                        <!-- BEGIN WIDGET THUMB -->
                        <a href="http://library.{{ env('SESSION_DOMAIN', 'widatra.com') }}" >
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red fa fa-book"></i>
                                </div>
                                <span class="widget-thumb-subtitle"><b><h3>Library</h3></b></span>
                            </div>
                        </a>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-2">
                        <!-- BEGIN WIDGET THUMB -->
                        <a href="http://stability.{{ env('SESSION_DOMAIN', 'widatra.com') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                </div>
                                <span class="widget-thumb-subtitle"><b><h3>Stability</h3></b></span>
                            </div>
                        </a>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-2">
                        <!-- BEGIN WIDGET THUMB -->
                        <a href="http://kalibrasi.{{ env('SESSION_DOMAIN', 'widatra.com') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-yellow fa fa-hourglass-1"></i>
                                </div>
                                <span class="widget-thumb-subtitle"><b><h3>Kalibrasi</h3></b></span>
                            </div>
                        </a>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-2">
                        <!-- BEGIN WIDGET THUMB -->
                        <a href="http://reagensia.{{ env('SESSION_DOMAIN', 'widatra.com') }}">
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                </div>
                                <span class="widget-thumb-subtitle"><b><h3>Reagensia</h3></b></span>
                            </div>
                        </a>
                        <!-- END WIDGET THUMB -->
                    </div>
                </div>
                <div class="row widget-row">
                    <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                        <!-- BEGIN WIDGET GRADIENT -->
                        <div class="clearfix"></div>
                        <div id="carousel-example-generic-v1" class="carousel slide widget-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic-v1" data-slide-to="0" class="circle active"></li>
                                <li data-target="#carousel-example-generic-v1" data-slide-to="1" class="circle"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="widget-gradient" style="background: url(../assets/layouts/layout7/img/01.jpg)">
                                        <div class="widget-gradient-body">
                                            <h3 class="widget-gradient-title">Photo of The Day</h3>
                                            <ul class="widget-gradient-body-actions list-inline">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart"></i> 12 </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-comment"></i> 9 </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="widget-gradient" style="background: url(../assets/layouts/layout7/img/02.jpg)">
                                        <div class="widget-gradient-body">
                                            <h3 class="widget-gradient-title">500 New Free Photos</h3>
                                            <ul class="widget-gradient-body-actions list-inline">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-heart"></i> 17 </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-comment"></i> 8 </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET GRADIENT -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                        <!-- BEGIN WIDGET WRAP IMAGE -->
                        <div id="carousel-example-generic-v2" class="carousel slide widget-carousel" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators carousel-indicators-red">
                                <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                                <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="widget-wrap-img widget-bg-color-white">
                                        <h3 class="widget-wrap-img-title">New Mobile Layout</h3>
                                        <img class="widget-wrap-img-element img-responsive" src="{{asset('assets/layouts/layout7/img/iphone.png')}}" alt=""> </div>
                                </div>
                                <div class="item">
                                    <div class="widget-wrap-img widget-bg-color-white">
                                        <h3 class="widget-wrap-img-title">New Desktop Look</h3>
                                        <img class="widget-wrap-img-element img-responsive" src="{{asset('assets/layouts/layout7/img/mac.png')}}" alt=""> </div>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET WRAP IMAGE -->
                    </div>
                </div>
                <div class="row widget-row">
                    <div class="col-md-8 margin-bottom-20">
                        <!-- BEGIN WIDGET TAB -->
                        @php
                            $date_now = date('Y-m-d');
                        @endphp
                        <div class="widget-bg-color-white widget-tab">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_kategori_0" data-toggle="tab"> Terbaru </a>
                                </li>
                                @foreach (App\M_kategori_berita::all() as $r)
                                    <li>
                                        <a href="{{ '#tab_kategori_'.$r->id }}" data-toggle="tab"> {{ $r->nama }} </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content scroller" style="height: 350px;" data-always-visible="1" data-handle-color="#D7DCE2">
                                <div class="tab-pane fade active in" id="tab_kategori_0">
                                    @foreach (App\T_berita::where('published_at', '<=', $date_now)->orderBy('published_at', 'desc')->take(10)->get() as $rr)
                                        <div class="widget-news margin-bottom-20">
                                            @if (!$rr->featured_img)
                                                <img class="widget-news-left-elem" src="{{asset('assets/global/img/no-image.jpg')}}" alt="">
                                            @else
                                                <img class="widget-news-left-elem" src="{{asset('storage/berita/'.$rr->featured_img)}}" alt="">
                                            @endif
                                            <div class="widget-news-right-body">
                                                <h3 class="widget-news-right-body-title">{{ $rr->judul }}
                                                    <span class="label label-default">{{ date('d F Y', strtotime($rr->published_at)) }} </span>
                                                </h3>
                                                <p>{{ $rr->excerpt }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @foreach (App\M_kategori_berita::all() as $r)
                                    <div class="tab-pane fade" id="{{ 'tab_kategori_'.$r->id }}">
                                        @foreach (App\T_berita::where('kategori_berita_id', $r->id)->where('published_at', '<=', $date_now)->orderBy('published_at', 'desc')->take(10)->get() as $rr)
                                            <div class="widget-news margin-bottom-20">
                                                @if (!$rr->featured_img)
                                                    <img class="widget-news-left-elem" src="{{asset('assets/global/img/no-image.jpg')}}" alt="">
                                                @else
                                                    <img class="widget-news-left-elem" src="{{asset('storage/berita/'.$rr->featured_img)}}" alt="">
                                                @endif
                                                <div class="widget-news-right-body">
                                                    <h3 class="widget-news-right-body-title">{{ $rr->judul }}
                                                        <span class="label label-default">{{ date('d F Y', strtotime($rr->published_at)) }} </span>
                                                    </h3>
                                                    <p>{{ $rr->excerpt }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- END WIDGET TAB -->
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light tasks-widget widget-comments">
                            <div class="portlet-title margin-bottom-20">
                                <div class="caption caption-md font-red-sunglo">
                                    <span class="caption-subject theme-font bold uppercase">Pengumuman</span>
                                </div>
                            </div>
                            <div class="portlet-body overflow-h scroller" style="height: 350px;">
                                <div class="widget-news margin-bottom-20">
                                    <img class="widget-news-left-elem" src="{{asset('assets/layouts/layout7/img/03.jpg')}}" alt="">
                                    <div class="widget-news-right-body">
                                        <h3 class="widget-news-right-body-title">Wondering anyone did this
                                            <span class="label label-default"> March 25 </span>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit diam nonumy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                    </div>
                                </div>
                                <div class="widget-news margin-bottom-20">
                                    <img class="widget-news-left-elem" src="{{asset('assets/layouts/layout7/img/03.jpg')}}" alt="">
                                    <div class="widget-news-right-body">
                                        <h3 class="widget-news-right-body-title">Wondering anyone did this
                                            <span class="label label-default"> March 25 </span>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit diam nonumy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                    </div>
                                </div>
                                <div class="widget-news margin-bottom-20">
                                    <img class="widget-news-left-elem" src="{{asset('assets/layouts/layout7/img/04.jpg')}}" alt="">
                                    <div class="widget-news-right-body">
                                        <h3 class="widget-news-right-body-title">New Workstation
                                            <span class="label label-default"> March 16 </span>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit diam nonumy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                    </div>
                                </div>
                                <div class="widget-news margin-bottom-20">
                                    <img class="widget-news-left-elem" src="{{asset('assets/layouts/layout7/img/07.jpg')}}" alt="">
                                    <div class="widget-news-right-body">
                                        <h3 class="widget-news-right-body-title">San Francisco
                                            <span class="label label-default"> March 10 </span>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit diam nonumy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                    </div>
                                </div>
                                <div class="widget-news margin-bottom-20">
                                    <img class="widget-news-left-elem" src="{{asset('assets/layouts/layout7/img/03.jpg')}}" alt="">
                                    <div class="widget-news-right-body">
                                        <h3 class="widget-news-right-body-title">Wondering anyone did this
                                            <span class="label label-default"> March 25 </span>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit diam nonumy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>

                <!-- END PAGE BASE CONTENT -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner container-fluid container-lf-space">
                <p class="page-footer-copyright"> {{ date('Y') }} &copy; Portal Widatra By
                    <a href="#">PT. Widatra Bhakti</a> &nbsp;
                </p>
            </div>
            <div class="go2top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>

<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/mapplic/js/hammer.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/mapplic/js/jquery.easing.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/mapplic/js/jquery.mousewheel.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/mapplic/mapplic/mapplic.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('assets/layouts/layout7/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
