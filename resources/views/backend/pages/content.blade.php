@extends('backend.layouts.master')
@section('content')
@php
     $user = auth()->guard('admin')->user();
@endphp

<div class="container-fluid">
        {{-- @php dd(auth()->guard('admin')->user()->email ) @endphp --}}
    <!-- /row -->
    @if ($user->role_id == 1)
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption info">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-briefcase"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3>{{$totalJobs}}</h3>
                                <span>Jobs Posted</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-info">
                                <span style="width:72%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption danger">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-happy"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3>{{$usersCount}}</h3>
                                <span>Active Members</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-danger">
                                <span style="width:65%;" class="bg-danger widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption success">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-tools"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3>{{$employerCount}}</h3>
                                <span>Employee</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-sucess">
                                <span style="width:55%;" class="bg-success widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption warning">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-trophy"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3>870</h3>
                                <span>World Award</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-warning">
                                <span style="width:70%;" class="bg-warning widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else

<div class="row">
    <div class="col-md-12">
        <div class="no data-wrap py-5 my-5 text-center">
            <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
            <h1>No Data available here</h1>
        </div>
    </div>
</div>
@endif

    <!-- Row -->
   
        <!-- /col-md-6 -->
    </div>
</div>
@endsection
@section('scripts')

    <script src="{{asset('back/js/raphael.min.js')}}"></script>
    <script src="{{asset('back/js/morris.min.js')}}"></script>
    <script src="{{asset('back/js/dashboard-4.js')}}"></script>

@endsection
