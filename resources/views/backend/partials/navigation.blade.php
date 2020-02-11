@php
    use App\Model\candidate;
    $user = auth()->guard('admin')->user();
    $UserActive = candidate::where('admin_id',$user->id)->count();
@endphp
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="{{ (request()->segment(2) == 'app') ? 'active' : '' }}">
                 <a href="{{'/admin/app'}}"><i class="fa fa-bullseye"></i>Dashboard</a>
            </li>
            <li>
                    <a href="javascript:void(0)"><i class="ti ti-user"></i>Admin <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{ (request()->segment(2) == 'locations') ? 'active' : '' }}">
                            <a href="{{url('admin/location')}}"> Organization</a>
                         </li>
                         @if ($user->role_id == 1)
                           <li class="{{ (request()->segment(2) == 'user') ? 'active' : '' }}">
                                <a href="{{url('admin/user/create')}}"> User Management</a>
                           </li>
                            <li class="{{ (request()->segment(2) == 'job') ? 'active' : '' }}">
                                <a href="{{url('admin/vacancy')}}"> Job</a>
                            </li>
                            <li class="{{ (request()->segment(2) == 'Qualifications') ? 'active' : '' }}">
                                <a href="{{url('admin/skill')}}"> Qualifications</a>
                            </li>
                        @endif
                    </ul>
                </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-user"></i> Recruitment <span class="fa arrow"></span><b class="badge bg-danger pull-right">{{$UserActive}}</b></a>
                <ul class="nav nav-second-level">
                    <li class="{{ (request()->segment(2) == 'job') ? 'active' : '' }}">
                        <a href="{{url('admin/job')}}">My Vacancies</a>
                    </li>
                    @if ($user->role_id == 1)
                        <li class="{{ (request()->segment(2) == 'list/job') ? 'active' : '' }}">
                            <a href="{{url('admin/list/job')}}">all vacancies</a>
                        </li>
                    @endif
                    <li class="{{ (request()->segment(2) == 'candidate') ? 'active' : '' }}">
                        <a href="{{url('admin/candidate')}}">candidates</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0)"><i class="fa fa-book fa-fw"></i>PIM<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/employee')}}">Employee List</a>
                    </li>
                    <li>
                        <a href="{{url('admin/employee/create')}}">Add Employee</a>
                    </li>
                    @if ($user->role_id == 1)
                        <li>
                            <a href="{{url('admin/method')}}">Configuration</a>
                        </li>
                    @endif
                </ul>
            </li>
           @if ($user->role_id == 1)
            <li>
                    <a href="javascript:void(0)"><i class="fa fa-cog"></i>Settings<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('admin/pricing')}}">Pricing</a>
                        </li>
                        
                    </ul>
                </li>
           @endif
         
            <li>
                <a href="{{url('admin/payment')}}"><i class="fa fa-dollar"></i>Payments<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li  class="{{ (request()->segment(2) == 'payment') ? 'active' : '' }}">
                        <a href="{{url('admin/payment')}}">My Payments</a>
                    </li>
                    @if ($user->role_id == 1)
                    <li  class="{{ (request()->segment(2) == 'list') ? 'active' : '' }}">
                        <a href="{{url('admin/list/payment')}}">All Payments</a>
                    </li>
                    @endif
                </ul>
            </li>
            
           
            <li class="{{ (request()->segment(2) == 'profile') ? 'active' : '' }}">
                <a href="{{url('admin/profile')}}"><i class="ti ti-folder"></i>My Profile</a>
            </li>
            <li><a href="{{url('admin-logout')}}"><i class="ti ti-shift-right"></i>Log Out</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>