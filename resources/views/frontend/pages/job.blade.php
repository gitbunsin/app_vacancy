
@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\province;
@endphp
<style>
    .job-title{
        font-size: 16px;
        color: black;
    }
    .categories-list-page .job-title-box {
    position: relative;
    overflow: hidden;
    margin-left: 15px;
}
.job-summary span {
    display: block;
    font-size: 14px;
    margin: 50px 0 15px;
}

</style>
<div class="job-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="job-summary section">
                        @if(!$job->isEmpty())
                        @foreach($job as $jobs)
                            <div class="row">
                                    <div class="col-lg-2">  
                                        <img width="100px;" class="avatar" src="http://templates.scriptsbundle.com/opportunities-v3/demo/images/company/1.png" alt="Avatar">
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
                            <div class="job-title-box">
                                   
                                    <a href="#"><span class="comp-name"><i style="color:red;">conversi Pvt. Ltd. Lahore Pakistan</i></span></a>
                                </div>
                        </div><!-- /.widger -->
                    </div><!-- /.widget-area -->
                </div><!-- /.tr-sidebar -->
            </div>
        </div><!-- row -->
    </div>
</div>
{{-- <div class="jobs-listing section-padding">
    
    <div class="container">     
        <div class="tab-content tr-job-posted">
            
            <div role="tabpanel" class=" active show tab-pane fade two-column" id="two-column">
                <div class="row">
             @if(!$job->isEmpty())
                    @foreach($job as $jobs)
                    
                        <div class="col-sm-6">
                            
                            <div class="job-item">
                                
                                <div class="job-info">
                                    <div class="row">
                                        <div class="col-sm-2">
                                                <img width="50px;"  src="/uploads/UserCv/{{ $jobs->company->company_logo }}" alt="Smiley face" class="img-fluid">
                                    {{-- <img  src="https://demo.themeregion.com/seeker/images/others/404.jpg" alt="Image" class="img-fluid"> --}}

                                        {{-- </div>
                                        <div class="col-sm-10">
                                            <h5><i><a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a></i><span><i></i> / <button class="btn btn-primary">{{$jobs->jobType->name}}</button> </span></h5>
                                            <span><i>{{$jobs->company->company_name}} / {{$jobs->jobType->name}} / {{$jobs->offer_salary}}</i> </span>
                                            {{-- <ul class="tr-list job-meta">
                                                <li><button class="btn btn-primary">{{$jobs->company->company_name}}</button>  - </li> 
                                                <li><button class="btn btn-primary"> </button></li> 
                                                
                                            </ul> --}}
                                        {{-- </div>
                                      </div>  --}}
                                    {{-- <div class="clearfix">
                                        <span class="tr-title">
                                            <a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a><span></span>
                                        </span>
                                        
                                    </div> --}}
                                   
                                {{-- </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div><!-- /.row -->										
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->		
    </div><!-- /.container -->		
</div><!-- /.jobs-listing -->  --}}
@endsection