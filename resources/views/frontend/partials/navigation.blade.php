<nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">

    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/app')}}">
                <img style="margin-top: -20px;" src="{{asset('img/logo-1.png')}}" class="logo logo-scrolled" alt="">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                <li></li> <li></li> <li></li>
                <li><a href="{{url('app-about')}}">About Us</a></li>
                <li><a href="{{url('app-pricing')}}">Service</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Candidate</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('register')}}">Register</a></li>
                        <li><a href="{{url('login')}}">SignIn</a></li>
{{--                        <li><a href="{{url('app-create-resume')}}">Create Resume</a></li>--}}
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Employer</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('admin/register')}}">Register</a></li>
                        <li><a href="{{url('admin-login')}}">Sign In</a></li>
                        <li><a href="{{url('app-mange-Candidate')}}">Browse Candidate</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                @guest
                <li class="left-br">
{{--                    <a href="#"><i class="fa fa-smile-o" aria-hidden="true"></i>Bunsin</a>--}}
                </li>
                @else
                    <li class="left-br nav-item dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="fa fa-smile-o" aria-hidden="true"></i> {{ Auth::user()->name }} </a>
                        <ul class="dropdown-menu" role="menu">
                            <a class="#" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="fa fa-sign-out"></span> {{ __('Logout') }}
                            </a>
                        </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>