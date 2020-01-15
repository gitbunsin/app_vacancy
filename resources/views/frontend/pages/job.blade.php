
@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\province;
@endphp
<style>
    .job-title{
        font-size: 15px;
        color: black;
    }
    .categories-list-page .job-title-box {
    position: relative;
    overflow: hidden;
    margin-left: 15px;
}
.job-summary span {
    display: block;
    font-size: 12px;
    margin: 50px 0 15px;
}
a, a:hover, a:focus, input:focus {
    text-decoration: none;
    outline: none;
    color: black;
}

</style>

<div class="job-details section-padding">
    <div class="container">
        <div class="row">
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
        </div><!-- row -->
    </div>
</div>

@endsection