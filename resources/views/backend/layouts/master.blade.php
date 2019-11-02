
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">

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
            <a class="navbar-brand" href="#"><img src="{{asset('img/logo-1.png')}}" class="img-responsive" alt="Logo"></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-left header-search-form hidden-xs">
            <li><a class="menu-brand" id="menu-toggle"><span class="ti-view-grid"></span></a></li>
            <li class="hidden-sm hidden-xs">
                <div class="header-search-form input-group">
                    <span class="input-group-addon"><span class="ti-search"></span></span>
                    <input type="text" class="form-control" placeholder="Search & Enter">
                </div>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle notification-show" data-toggle="dropdown" href="#">
                    <i class="ti-email"></i>
                    <span class="email-notify noti-count">4</span>
                </a>
                <ul class="dropdown-menu dropdown-messages right-swip">
                    <li class="external">
                        <h3><span class="bold">All Messages</span></h3>
                        <span class="notification-label bg-success">New 6</span>
                    </li>
                    <li>
                        <a href="messages.html">
                            <div class="message-apt">
                                <div class="user-img">
                                    <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                    <span class="profile-status online"></span>
                                </div>
                                <div class="message-body">
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
												Just Now
											</span>
                                    <p>I am John Smith Ckeck My...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="messages.html">
                            <div class="message-apt">
                                <div class="user-img">
                                    <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                    <span class="profile-status warning"></span>
                                </div>
                                <div class="message-body">
                                    <strong>Daniel Luke</strong>
                                    <span class="pull-right text-muted">
												2 Min Ago
											</span>
                                    <p>Can You Send Me your Bugdet...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="messages.html">
                            <div class="message-apt">
                                <div class="user-img">
                                    <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                    <span class="profile-status busy"></span>
                                </div>
                                <div class="message-body">
                                    <strong>Litha Lilly</strong>
                                    <span class="pull-right text-muted">
												7 Min Ago
											</span>
                                    <p>I have Check Your Design Like...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="messages.html">
                            <div class="message-apt">
                                <div class="user-img">
                                    <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                    <span class="profile-status offline"></span>
                                </div>
                                <div class="message-body">
                                    <strong>Adam Kruel</strong>
                                    <span class="pull-right text-muted">
												1 Hour Ago
											</span>
                                    <p>Heelo! I need best web design...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle notification-show" data-toggle="dropdown" href="#">
                    <i class="ti-bell"></i>
                    <span class="task-notify noti-count">7</span>
                </a>
                <ul class="task dropdown-menu dropdown-tasks right-swip">
                    <li class="external">
                        <h3><span class="bold">Show Notifications</span></h3>
                        <span class="notification-label bg-success">New 4</span>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-overview">
                                <div class="alpha-box alpha-a">
                                    <span>A</span>
                                </div>
                                <div class="task-detail">
                                    <p>Hello, I am Maryam.</p>
                                    <span class="task-time">2 Min Ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-overview">
                                <div class="alpha-box alpha-d">
                                    <span>D</span>
                                </div>
                                <div class="task-detail">
                                    <p>Hello, I am Maryam.</p>
                                    <span class="task-time">2 Min Ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-overview">
                                <div class="alpha-box alpha-g">
                                    <span>G</span>
                                </div>
                                <div class="task-detail">
                                    <p>Hello, I am Maryam.</p>
                                    <span class="task-time">2 Min Ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-overview">
                                <div class="alpha-box alpha-h">
                                    <span>H</span>
                                </div>
                                <div class="task-detail">
                                    <p>Hello, I am Maryam.</p>
                                    <span class="task-time">2 Min Ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="ti-announcement"></i>
                </a>
                <div class="dropdown-menu dropdown-grid animated flipInX">
                    <a href="index.html" class="dropdown-item">
                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive" alt="" />
                        <span class="dropdown-title">Dashboard</span>
                    </a>
                    <a href="messages.html" class="dropdown-item">
                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive" alt="" />
                        <span class="dropdown-title">Chat</span>
                    </a>
                    <a href="settings.html" class="dropdown-item">
                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive" alt="" />
                        <span class="dropdown-title">Settings</span>
                    </a>
                    <a href="create-jobs.html" class="dropdown-item">
                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive" alt="" />
                        <span class="dropdown-title">New Jobs</span>
                    </a>
                    <a href="freelancers.html" class="dropdown-item">
                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive" alt="" />
                        <span class="dropdown-title">Freelancers</span>
                    </a>
                    <a href="my-profile.html" class="dropdown-item">
                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive" alt="" />
                        <span class="dropdown-title">Profile</span>
                    </a>
                </div>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{{asset('img/about/about-us.jpg')}}" class="img-responsive img-circle" alt="user">
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
            <li><a id="right-sidebar-toggle" href="#" class="btn btn-lg toggle"><i class="spin ti-settings"></i></a></li>

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
                <h3 class="text-themecolor"> {{ request()->segment(2) }}</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
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
                    <img src="{{asset('/img/user/user-1.jpg')}}" alt="user">
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
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status online"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status offline"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status busy"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
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
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status online"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status offline"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
                                        <span class="fr-user-status busy"></span>
                                    </div>
                                    <div class="fr-request-detail">
                                        <h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
                                        <p>Accept Your Friend Request</p>
                                    </div>
                                </div>
                                <div class="friend-overview">
                                    <div class="friend-overview-img">
                                        <img src="{{asset('/img/user/user-1.jpg')}}" class="img-responsive img-circle" alt="">
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


