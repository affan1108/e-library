@extends('layouts.app')

@section('content')
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="index.html" method="post">
        <h2 style="margin-top:-10px; text-align:center"><b>Library</b></h2>
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
        </div>
        <div class="form-actions">
            <label class="rememberme mt-checkbox mt-checkbox-outline">

            </label>
            <button type="submit" class="btn green pull-right"> Login </button>
        </div>
        <div class="forget-password">
            <h4>Forgot your password ?</h4>
            <p> no worries, click
                <a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.html" method="post">
        <h3>Forget Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
            <button type="submit" class="btn green pull-right"> Submit </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
@endsection
