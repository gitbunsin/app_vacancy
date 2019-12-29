
@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\province;
@endphp
<div class="tr-breadcrumb bg-image section-before">
    <div class="container">
        <div class="breadcrumb-info text-center">
            <div class="page-title">
                <h1>The Easiest Way to Get Your New Job</h1>
            </div>		
            <ol class="breadcrumb">
                <li><a href="index.html">We offer 12000 jobs vacation right now</a></li>
            </ol>
            <div class="banner-form">
                <form action="#">
                    <input type="text" class="form-control" placeholder="Job Keyword">
                    <div class="dropdown tr-change-dropdown">
                        <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Location</span><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu tr-change">
                            <li><a href="#"> Location </a></li>
                            @php
                                $location = province::all();
                            @endphp
                            @foreach ($location as $item)
                                 <li><a href="#">{{$item->name}}</a></li>  
                            @endforeach
                        </ul>								
                    </div><!-- /.category-change -->
                    <button type="submit" class="btn btn-primary" value="Search">Search</button>
                </form>
            </div><!-- /.banner-form -->				
        </div>
    </div><!-- /.container -->
</div><!-- tr-breadcrumb -->
<div class="jobs-listing section-padding">
    <div class="container">
        <div class="job-topbar">
            <span class="pull-left">Filter jobs by</span>
            <ul class="nav nav-tabs job-tabs" role="tablist">
                <li>235 Total jobs</li>
                {{-- <li role="presentation" class="active"><a href="#four-colum" aria-controls="four-colum" role="tab" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i></a></li> --}}
                <li class="active" role="presentation"><a href="#two-column" aria-controls="two-column" role="tab" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
            </ul>				
        </div>
        <div class="list-menu text-center clearfix">
            <ul class="tr-list">
                <li class="dropdown tr-change-dropdown">	
                    Category:					
                    <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Designer</span><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu tr-change">
                        <li><a href="#">Designer</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Developement</a></li>
                    </ul>								
                </li>
                <li class="dropdown tr-change-dropdown">	
                    Level:					
                    <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Mid</span><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu tr-change">
                        <li><a href="#">Top Level</a></li>
                        <li><a href="#">Mid Level</a></li>
                        <li><a href="#">Entry Level</a></li>
                    </ul>								
                </li>
                <li class="dropdown tr-change-dropdown">	
                    Org Type:					
                    <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Private</span><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu tr-change">
                        <li><a href="#">Private</a></li>
                        <li><a href="#">public</a></li>
                    </ul>								
                </li>
                <li class="dropdown tr-change-dropdown">	
                    Location:					
                    <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">USA</span><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu tr-change">
                        <li><a href="#">USA</a></li>
                        <li><a href="#">London</a></li>
                        <li><a href="#">New York</a></li>
                    </ul>								
                </li>
                <li class="dropdown tr-change-dropdown">	
                    Salary:					
                    <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">0 - 50K</span><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu tr-change">
                        <li><a href="#">0 - 50K</a></li>
                        <li><a href="#">50k - 70K</a></li>
                        <li><a href="#">70k - 85K</a></li>
                    </ul>								
                </li>
            </ul>				
        </div><!-- /.list-menu -->

        <div class="tab-content tr-job-posted">
            <div role="tabpanel" class=" active show tab-pane fade two-column" id="two-column">
                <div class="row">
                    @foreach($job as $jobs)
                        <div class="col-sm-6">
                            <div class="job-item">
                                <div class="job-info">
                                    <div class="clearfix">
                                        <span class="tr-title">
                                            <a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a><span></span>
                                        </span>
                                    </div>
                                    <ul class="tr-list job-meta">
                                        <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>{{$jobs->company->company_name}}</li>
                                        <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>{{$jobs->exp_level}}</li>
                                        <li><span><i class="fa fa-money" aria-hidden="true"></i></span>{{$jobs->offer_salary}}</li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- /.row -->										
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->		
    </div><!-- /.container -->		
</div><!-- /.jobs-listing -->
@endsection