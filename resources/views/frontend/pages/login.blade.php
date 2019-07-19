@extends('frontend.layouts.template')
@section('content')
<!-- End Navigation -->
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="login-plane-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <img src="" class="img-responsive" />
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-login">Sign Up</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br/><br/><br/>
<footer class="">
    <div class="row copyright">
        <div class="container">
            <p>Copyright Love Jobs © 2019. All Rights Reserved </p>
        </div>
    </div>
</footer>
@endsection
