
@extends('frontend.layouts.template')
@section('content')
@php
    use App\Model\province;
@endphp
<style>

</style>
<div class="jobs-listing section-padding">
    
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

                                        </div>
                                        <div class="col-sm-10">
                                            <h5><a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a><span> </span></h5>
                                            <ul class="tr-list job-meta">
                                                <li><button class="btn btn-primary">{{$jobs->company->company_name}}</button>  - </li> 
                                                <li><button class="btn btn-primary"> {{$jobs->offer_salary}}</button></li> 
                                                
                                            </ul>
                                        </div>
                                      </div>
                                    {{-- <div class="clearfix">
                                        <span class="tr-title">
                                            <a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a><span></span>
                                        </span>
                                        
                                    </div> --}}
                                   
                                </div>
                            </div>
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
                </div><!-- /.row -->										
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->		
    </div><!-- /.container -->		
</div><!-- /.jobs-listing -->
@endsection