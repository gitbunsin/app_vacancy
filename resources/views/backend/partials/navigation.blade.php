<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li class="{{ (request()->segment(2) == 'app') ? 'active' : '' }}">
                 <a href="{{'/admin/app'}}"><i class="fa fa-bullseye"></i>Dashboard</a>
            </li>
            <li>
                <a href="create-membership.html"><i class="ti ti-star"></i>Create Membership</a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="ti ti-user"></i>For Employer <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ (request()->segment(2) == 'job') ? 'active' : '' }}">
                        <a href="{{url('admin/job')}}">Manage Vacancy</a>
                    </li>
                    {{-- <li class="">
                    <a href="{{url('admin/job/create')}}">Create Jobs</a>
                    </li> --}}
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)"><i class="ti ti-ruler-pencil"></i>For Candidate<span class="fa arrow"></span> <b class="badge bg-success pull-right">3</b></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/user')}}">Manage Candidate</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="ti ti-user"></i>Company <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="">
                        <a href="{{url('admin/company')}}">Manage Company</a>
                    </li>
                    {{-- <li>
                        <a href="{{url('admin/company/create')}}">Crate Company</a>
                    </li> --}}
                </ul>
            </li>
            <li><a href="settings.html"><i class="ti ti-settings"></i>Settings</a></li>
            <li class="{{ (request()->segment(2) == 'app-profile') ? 'active' : '' }}">
                <a href="{{url('admin/app-profile')}}"><i class="ti ti-folder"></i>My Profile</a>
            </li>
            <li><a href="{{url('admin-logout')}}"><i class="ti ti-shift-right"></i>Log Out</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>