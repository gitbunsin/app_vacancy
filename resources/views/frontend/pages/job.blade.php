
@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\province;
@endphp
<style>
    ul {
    list-style-type: none;
    padding: 0px;
    margin: 0px;
}
    .task-overview {
    padding: 10px 0 15px 0;
    border-bottom: 1px solid #e8eef1;
    display: inline-block;
    width: 100%;
}
.task-overview .task-detail span {
    font-size: 12px;
}
.task-overview .task-detail {
    margin-left: 60px;
}
    .alpha-a {
    background: #ffa1ae;
    color: #f73d51;
}
    .alpha-box {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-align: center;
    line-height: 50px;
    font-size: 27px;
    font-weight: 400;
    float: left;
}
    .bage-warning {
    background: #ff9800;
}
    .todo-default .ct-title span {
    display: block;
    font-size: 13px;
    opacity: 0.8;
    font-weight: 400;
}
.badge.badge-action {
    background: transparent;
}
.todo-default .badge {
    font-weight: 400;
    font-size: 11.5px;
    border-radius: 50%;
    padding: .27em .5em;
    text-align: center;
}
    span.user-status {
    width: 7px;
    height: 7px;
    position: absolute;
    display: block;
    right: 2px;
    bottom: 2px;
    border-radius: 50%;
}
.todo-default .ct-title {
    flex: 1 1 0%;
    -webkit-box-flex: 1;
}
span.user-status {
    width: 7px;
    height: 7px;
    position: absolute;
    display: block;
    right: 2px;
    bottom: 2px;
    border-radius: 50%;
}

.card h5 {
    margin: 5px 0;
    font-weight: 400;
    line-height: 20px;
}
    .sm-avater.list-avater {
    max-width: 70px;
    margin-right: 10px;
    position: relative;
    height: 45px;
    border-radius: 50%;
}
.img-circle {
    border-radius: 50%;
}
    .todo.todo-default {
    border-bottom: 1px solid #e8eef1;
    padding: 16px 12px;
    display: flex;
    align-items: center;
    -webkit-box-align: center;
    display: -ms-flexbox;
    align-items: flex-start;
}
    .card-header {
    background: #ffffff;
    border-bottom: 0px;
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    border-bottom: 1px solid #e8eef1;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,-4.875);
    border-radius: 0.25rem;
}
  
.btn {
    color: #fff;
    padding: 8px 20px 5px;
    border-radius: 30px;
    font-size: 12px;
    position: relative;
    z-index: 1;
    overflow: hidden;
}
</style>

<div class="job-details section-padding">
    <div class="container">
            <div class="row">
                    <!-- col-md-6 -->
                    <div class="col-md-8">
                            <form action="{{route('jobs_listing')}}"  method="get">
                            <div class="card">
                                    <div class="card-header">
                                            <div class="row">
                                            <div class="col-lg-5">
                                                    <input type="text" name='q' class="form-control" placeholder="Keyword">
                                            </div>
                                            <div class="col-lg-5">
                                                    <input type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-2">
                                                <input  type="submit" value="search" class="btn btn-primary form-control">
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </form>
                        <div class="card">
                            <div class="card-body">
                                <div class="todo-list todo-list-hover todo-list-divided">
                                    @if(!$job->isEmpty())
                                     @foreach($job as $jobs)
                                        <div class="todo todo-default">
                                            <div class="sm-avater list-avater">
                                                    <img width="50px;"  src="/uploads/UserCv/{{ $jobs->company->company_logo }}" alt="Smiley face" class="img-fluid">
                                            </div>
                                            <h5 class="ct-title"><a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a><span class="ct-designation">{{$jobs->company->company_name}} / {{$jobs->maxSalary .' - ' . $jobs->minSalary . ' $'}} / {{$jobs->jobType->name}}</span></h5>
                                            {{-- <div class="badge badge-action">
                                                    <a href="#" class="btn btn-primary">View Details</a>
                                                </div> --}}
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="col-md-4">
                                                <div class="found-image">
                                                    <img src="https://demo.themeregion.com/seeker/images/others/404.jpg" alt="Image" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="found-info">
                                                    <h1>404</h1>
                                                    <h2>Related Job Not Found</h2>
                                                    <p>We can't seem to find the page you're looking for.</p>
                                                    <a href="{{URL::previous()}}" class="btn btn-primary">Back to home</a>
                                                </div>
                                            </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-md-6 -->
            
                    <!-- col-md-6 -->
                    <div class="col-md-4">
                        <div class="card">
                            <div style="background-color:#f56c6c;" class="card-header">
                                <h4 style="color:white;">Hot Jobs</h4>
                            </div>
                            <div class="card-body">
                                    <div class="todo-list todo-list-hover todo-list-divided">
                                        @if(!$job->isEmpty())
                                            @foreach($job as $jobs)
                                            <div class="todo todo-default">
                                                <h6 class="ct-title"><a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a><span class="ct-designation">{{$jobs->company->company_name}} / {{$jobs->maxSalary .' - ' . $jobs->minSalary . ' $'}} / {{$jobs->jobType->name}}</span></h6> 
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                            </div>
    
                    </div>
            </div>
    </div>
        {{-- <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="job-summary section">
                        <form action="{{route('jobs_listing')}}" class="form-inline" method="get">
                                
                            <div class="row">
                                    <div class="col-lg-5">  
                                            <input type="text" name="q"  class="form-control" placeholder="Vacancy">
                                        </div>
                                        <div class="col-lg-5">  
                                                <input type="text" class="form-control" placeholder="Location">
                                        </div>
                                        <div class="col-lg-2">  
                                            <input type="submit" value="search" class="btn btn-primary">
                                        </div>
                            </div>
                    </form>
                    <hr><br/>
                        @if(!$job->isEmpty())
                        @foreach($job as $jobs)
                            <div class="row">
                                    <div class="col-lg-2">  
                                        <img width="100px;"  src="/uploads/UserCv/{{ $jobs->company->company_logo }}" alt="Smiley face" class="img-fluid">
                                    </div>
                                    <div class="col-lg-7">
                                            <div class="job-title-box">
                                                    <a href="#">
                                                        <div class="job-title"><a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a></div>
                                                    </a>
                                                    <a href="#"><span class="comp-name">{{$jobs->company->company_name}} / {{$jobs->jobType->name}} / {{$jobs->maxSalary .' - ' . $jobs->minSalary}} $ </span></a>
                                                </div>
                                    </div> 
                                </div>
                                <hr/>
                            @endforeach
                            @else
                      
                            <div class="col-md-4">
                                <div class="found-image">
                                    <img src="https://demo.themeregion.com/seeker/images/others/404.jpg" alt="Image" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="found-info">
                                    <h1>404</h1>
                                    <h2>Related Job Not Found</h2>
                                    <p>We can't seem to find the page you're looking for.</p>
                                    <a href="{{URL::previous()}}" class="btn btn-primary">Back to home</a>
                                </div>
                            </div>
                @endif  
                     <div>
                            
                     </div>
                </div>    
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="tr-sidebar">
                    <div class="widget-area">
                        <div class="widget cmpany-info">
                            <a href="#">
                                <div class="job-title"><i><a href=""></a></i></div>
                            </a>
                        </div><!-- /.widger -->
                    </div><!-- /.widget-area -->
                </div><!-- /.tr-sidebar -->
            </div>
        </div><!-- row --> --}}
    </div>
</div>

@endsection