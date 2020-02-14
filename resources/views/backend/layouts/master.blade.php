
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Job Stock - Manage Your Dashboard</title>
    <!-- All Plugins Css -->
@include('backend.partials.style')

</head>

<body>
      
<div id="wrapper" class="">
    <div class="fakeLoader"></div>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top"  style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img  width="120px;" src="{{asset('images/backend-logo.png')}}" class="img-responsive" alt="Logo"></a>
        </div>
        <!-- /.navbar-header -->
      
        <ul class="nav navbar-top-links navbar-right">
          
            <!-- /.dropdown -->
            
            <!-- /.dropdown -->
           
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @php
                        // use App\Admin; $admin = auth()->guard('admin')->user();
                    @endphp
                        {{-- @if($admin->profile) --}}
                        {{-- <img class="img-responsive img-circle"  src="{{url('uploads/UserCv/'.$admin->profile)}}" width="50px" height="50px"/><br/> --}}
                    {{-- @else --}}
                        <img class="img-responsive img-circle"  src="{{asset('images/noimage.jpg')}}" width="50px" height="50px"/><br/>
                    {{-- @endif --}}
                    {{-- <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="user"> --}}
                </a>
                <ul class="dropdown-menu dropdown-user right-swip">
                    <li><a href="{{url('admin/profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li><a href="{{url('admin-logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>

                </ul>
                <!-- /.dropdown-user -->
            </li>
            <li><a id="right-sidebar-toggle" href="#" class="btn btn-lg toggle"></a></li>

            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <!-- Sidebar Navigation -->
        @include('backend.partials.navigation')
    </nav>
    <!-- Sidebar Navigation -->
    <div id="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
<!--                --><?php //dd() ?>
                <h3 class="text-themecolor"> {{ucfirst(request()->segment(2)) }}</h3>
            </div>
            <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <?php $segments = ''; ?>
                            @foreach(Request::segments() as $segment)
                                <?php $segments .= '/'.$segment; ?>   
                                <li class="breadcrumb-item"><a href="{{ucfirst($segments)}}">{{ucfirst($segment)}}</a></li>
                            @endforeach
                    </ol>
                </div>
        </div>
        <div class="container">
                @include('backend/pages/admin/flash_msg')
        </div>
       
        @yield('content')
   
    </div>
    <!-- /#page-wrapper -->
    <div id="sidebar-wrapper">
        <a id="right-close-sidebar-toggle" href="#" class="theme-bg btn close-toogle toggle">
            Setting Pannel <i class="ti-close"></i></a>
        <div class="right-sidebar" id="side-scroll">
            <div class="user-box">
                <div class="profile-img">
                    <img src="{{asset('images/user/user-1.jpg')}}" alt="user">
                    <!-- this is blinking heartbit-->
                    <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                </div>
                <div class="profile-text">
                    <h4>Daniel Dax</h4>
                    <a href="#" class="user-setting"><i class="ti-settings"></i></a>
                    <a href="#" class="user-mail"><i class="ti-email"></i></a>
                    <a href="#" class="user-call"><i class="ti-headphone"></i></a>
                    <a href="#" class="user-logout"><i class="ti-power-off"></i></a>
                </div>
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#options" data-toggle="tab">
                                <i class="ti-palette"></i> </a>
                        </li>
                        <li>
                            <a href="#comments" data-toggle="tab">
                                <i class="ti-bell"></i> </a>
                        </li>
                        <li>
                            <a href="#freinds" data-toggle="tab">
                                <i class="ti-comment-alt"></i> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="options">
                            <div class="accept-request">
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status online"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status offline"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status busy"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status offline"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Shruti Singh <span class="task-time pull-right">10 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="comments">
                            <div class="task">
                                <div class="task-overview">
                                    <div class="alpha-box alpha-a">
                                        <span>A</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                                <div class="task-overview">
                                    <div class="alpha-box alpha-d">
                                        <span>D</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                                <div class="task-overview">
                                    <div class="alpha-box alpha-s">
                                        <span>S</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                                <div class="task-overview">
                                    <div class="alpha-box alpha-h">
                                        <span>H</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                                <div class="task-overview">
                                    <div class="alpha-box alpha-g">
                                        <span>G</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="freinds">
                            <div class="accept-request">
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status online"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status offline"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status busy"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('images/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status offline"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Shruti Singh <span class="task-time pull-right">10 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @include('backend.partials.footer')
</div>

<!-- /#wrapper -->
<!-- jQuery -->
@include('backend.partials.script')
@yield('scripts')
</body>
</html>


