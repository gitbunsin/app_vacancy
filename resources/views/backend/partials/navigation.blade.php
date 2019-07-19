<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li class="active"><a href="{{'/admin/app'}}"><i class="fa fa-bullseye"></i>Dashboard</a></li>


            <li><a href="messages.html"><i class="ti ti-email"></i>Messages <b class="badge bg-purple pull-right">3</b></a></li>

            <li>
                <a href="javascript:void(0)"><i class="ti ti-user"></i>freelancers<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="manage-freelancers.html">Manage Freelancers</a>
                    </li>
                    <li>
                        <a href="add-freelancer.html">Add Freelancer</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="ti ti-user"></i>For Employer <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/app-manage-job')}}">Manage Jobs</a>
                    </li>
                    <li>
                        <a href="{{url('admin/app-candidate')}}">Manage Candidate</a>
                    </li>
                    <li>
                        <a href="{{url('admin/app-job/create')}}">Create Jobs</a>
                    </li>

                    <li>
                        <a href="manage-company.html">Manage Company</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)"><i class="ti ti-ruler-pencil"></i>For Candidate<span class="fa arrow"></span> <b class="badge bg-success pull-right">3</b></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="bookmarked-jobs.html">Bookmarked Jobs</a>
                    </li>
                    <li>
                        <a href="manage-resumes.html">Manage Resumes</a>
                    </li>
                    <li>
                        <a href="saved-company.html">Saved Company</a>
                    </li>
                    <li>
                        <a href="{{url('admin/create-resume')}}">Create Resume</a>
                    </li>

                </ul>
            </li>

            <li><a href="settings.html"><i class="ti ti-settings"></i>Settings</a></li>

            <li><a href="invoice.html"><i class="ti ti-clipboard"></i>Invoice</a></li>

            <li><a href="{{url('admin/app-profile')}}"><i class="ti ti-folder"></i>My Profile</a></li>

            <li><a href="create-membership.html"><i class="ti ti-star"></i>Create Membership</a></li>

            <li><a href="{{url('admin-logout')}}"><i class="ti ti-shift-right"></i>Log Out</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>