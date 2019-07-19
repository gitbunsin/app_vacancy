
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
                            <h3 class="panel-title">Sign In Admin</h3>
                        </div>
                        <div class="panel-body">
                            <br/>
                            <form method="POST" action="{{ route('admin-login') }}">
                                  @csrf
                                <fieldset>
                                    <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span  style="color: red;" class="invalid-feedback" role="alert">
                                            <strong style="">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <input placeholder="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="pull-right">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input  class="form-check-input pull-right" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                        </label>
                                    </div><br/>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-primary center-block">{{ __('Login') }}</button>
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

