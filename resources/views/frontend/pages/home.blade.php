
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Job Portal HTML</title>

<style>


.tp-bgimg defaultimg{
background-color: rgba(0, 0, 0, 0);
    background-repeat: no-repeat;
    background-image: url(https://www.sharjeelanjum.com/html/jobs-portal/demo/images/slider/banner2.jpg) !important;
    background-size: cover;
    background-position: center center;
    width: 100%;
    height: 100%;
    opacity: 1;
    visibility: inherit;
   
    
}
.howlist li .iconcircle_1{
    width: 100px;
    height: 100px;
    /* border: 3px solid #78ceff; */
    border-radius: 50%;
    text-align: center;
    line-height: 115px;
    font-size: 50px;
}
/* #khmer_id {
    font-family: -apple-system, 'Roboto', 'Koulen', sans-serif !important;
    font-size: 30px;
} */

</style>
@php
     use App\Model\vacancy;
@endphp
<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@include('frontend.partials.style')
	<!-- font -->
	{{-- <link href='https://fonts.googleapis.com/css?family=Open Sans:400,500,700,300' rel='stylesheet' type='text/css'> --}}
	{{-- <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'> --}}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Header start -->
@include('frontend.partials.navigation')
<!-- Header end --> 

<!-- Revolution slider start -->
<div class="tp-banner-container">
  <div class="tp-banner" >
    <ul>
      <!--Slide-->
      <li data-slotamount="7" data-transition="3dcurtain-vertical" data-masterspeed="1000" data-saveperformance="on"> <img alt="Your alt text" src="images/slider/dummy.png" data-lazyload="images/slider/banner.jpg">
        <div class="caption lfl large-title tp-resizeme slidertext1" data-x="left" data-y="100" data-speed="600" data-start="1600">Search Your Job<br />
          In your Area</div>
        <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200" data-speed="600" data-start="2800">I never dreamed about success. I worked for it.<br />
          Choose a job you love, and you will never have to work a day in your life</div>
        <div class="caption lfl large-title tp-resizeme slidertext5" data-x="left" data-y="280" data-speed="600" data-start="3500"><a href="{{url('contact')}}">Contact Us</a></div>
      </li>
      <!--Slide end--> 
      <!--Slide-->
      <li data-slotamount="7" data-transition="3dcurtain-vertical" data-masterspeed="1000" data-saveperformance="on"> <img alt="Your alt text" src="images/slider/dummy.png" data-lazyload="images/slider/banner2.jpg">
        <div class="caption lfl large-title tp-resizeme slidertext1" data-x="left" data-y="100" data-speed="600" data-start="1600">The Easiest Way to <br />
          Find Job</div>
        <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200" data-speed="600" data-start="2800">Here You Can See<br />
          Explore The Right Job</div>
        <div class="caption lfl large-title tp-resizeme slidertext5" data-x="left" data-y="280" data-speed="600" data-start="3500"><a href="{{url('contact')}}">Contact Us</a></div>
      </li>
      <!--Slide end-->
      
    </ul>
  </div>
</div>
<!-- Revolution slider end --> 

<!-- Popular Searches start -->
<div class="section">
	<div class="container"> 
	  <!-- title start -->
	  <div class="titleTop">
		{{-- <div class="subtitle">Here You Can See</div><br/> --}}<br/><br/>
		<h3 id="{{__('menu.font_family_en')}}">{{__('content.search')}} <span > {{__('content.job')}}</span> </h3>
	  </div>
	  <!-- title end -->
	  <div class="topsearchwrap row">
		<div class="col-md-12"> 
		  <!--Categories start-->
		  <h4 style="text-align: center;" id="{{__('menu.font_family_en')}}">{{__('content.brow_by_category')}}</h4>
		  <ul class="row catelist">
        @if($categories->count())
          @foreach ($categories as $category)
          @php
            $count =  vacancy::where('category_id','=',$category->id)->count();
          @endphp
            <li class="col-md-3 col-sm-3">
              <a href="{{route('jobs_listing', ['category' => $category->id])}}">{{$category->name}} <span>({{$count}})</span></a>
            </li>         
          @endforeach
        @endif
		  </ul>
		  <!--Categories end--> 
		</div>
	  </div>
	</div>
  </div>
  <!-- Popular Searches ends --> 
<!-- Search End --> 


<!-- How it Works Ends --> 

<!-- Top Employers start -->
<div class="section greybg">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      {{-- <div class="subtitle">Here You Can See</div><br/> --}}<br/><br/>
      <h3 id="{{__('menu.font_family_en')}}">{{__('content.top')}} <span>{{__('content.employers')}}</span></h3>
    </div>
    <!-- title end -->
    
    <ul class="employerList">
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
      <!--employer-->
      <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name"><a href="company-detail.html"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/employers/emplogo1.jpg" alt="Company Name" /></a></li>
    </ul>
  </div>
  
</div>
<div class="section howitwrap">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      {{-- <div class="subtitle">Here You Can See</div><br/> --}}<br/><br/>
      <h3 style="font-size:30px; font-family: -apple-system, 'Roboto', 'Koulen', sans-serif !important;">{{__('content.how_it_work')}} <span> {{__('content.how')}}</span></h3>
    </div>
    <!-- title end -->
    <ul class="howlist row">
      <!--step 1-->
      <li class="col-md-3 col-sm-3">
        <div class="iconcircle"><i class="fa fa-user" aria-hidden="true"></i></div>
        <h4 style="font-size:18px; font-family: -apple-system, 'Roboto', 'Koulen', sans-serif !important;">{{__('content.create_account')}}</h4>
     
      </li>
      <li class="col-md-2 col-sm-2">
        <div class="iconcircle_1"> <i class="fa fa-long-arrow-right hidden-xs" style="color: #01a441" aria-hidden="true"></i></div>
      </li>
      <!--step 1 end--> 
      {{-- <i class="fa fa-long-arrow-right hidden-xs" style="color: #01a441" aria-hidden="true"></i> --}}
      <!--step 2-->
      <li class="col-md-3 col-sm-3">
        <div class="iconcircle">
          <i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
        <h4 style="font-size:18px; font-family: -apple-system, 'Roboto', 'Koulen', sans-serif !important;">{{__('content.search_desired_job')}}</h4>
      </li>
      <!--step 2 end--> 
      <li class="col-md-2 col-sm-2">
        <div class="iconcircle_1"> <i class="fa fa-long-arrow-right hidden-xs" style="color: #01a441" aria-hidden="true"></i></div>
        
      </li>
      <!--step 3-->
      <li class="col-md-2 col-sm-2">
        <div class="iconcircle"><i class="fa fa-file-text" aria-hidden="true"></i></div>
        <h4 style="font-size:18px; font-family: -apple-system, 'Roboto', 'Koulen', sans-serif !important;">{{__('content.send_your_resume')}}</h4>
      </li>
      <!--step 3 end-->
    </ul>
  </div>
</div><br/>
<!-- Top Employers ends --> 



<!-- Featured Jobs start -->
<div class="section greybg">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      {{-- <div class="subtitle">Here You Can See</div><br/> --}}<br/><br/>
      <h3 id="{{__('menu.font_family_en')}}">{{__('content.featured')}} <span>{{__('content.job_feature')}}</span></h3>
    </div>
    <!-- title end --> 
    
    <!--Featured Job start-->
    <ul class="jobslist row">
      <!--Job 1-->
      @if($job )
      @foreach ($job as $jobs)
       <li class="col-md-4 col-sm-6">
        <div class="jobint">
          <div class="row">
            <div class="col-md-3 col-sm-3"><img src="{{asset('/uploads/UserCv/'.$jobs->company->company_logo)}}" alt="Job Name" /></div>
            <div class="col-md-9 col-sm-9">
              <h4><a href="{{url('vacancy/detail/'.$jobs->id)}}">{{$jobs->vacancy_name}}</a></h4>
              <div class="company"><a href="#.">{{$jobs->category->name}}</a></div>
              <div class="jobloc">
                @if($jobs->jobType->id == "1")
                           <label class="fulltime">{{$jobs->jobType->name}}</label>  
                        @elseif($jobs->jobType->id == "2")
                          <label class="partTime">{{$jobs->jobType->name}}</label> 
                        @else
                          <label class="freelance">{{$jobs->jobType->name}}</label> 
                        @endif
                - <span>{{$jobs->province->name}}</span></div>
            </div>
          </div>
        </div>
      </li>    
      @endforeach
      @endif
    </ul>
    <!--Featured Job end--> 
    
    <!--button start-->
    <!--button end--> 
  </div>
</div>
<!-- Featured Jobs ends --> 
<!-- Latest Jobs start -->
<div class="section greybg">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      {{-- <div class="subtitle">Here You Can See</div><br/> --}}<br/><br/>
      <h3 id="{{__('menu.font_family_en')}}">{{__('content.latest')}} <span>{{__('content.latest_job')}}</span></h3>
    </div>
    <!-- title end -->
    
    <ul class="jobslist row">
      <!--Job 1-->
      @if($job )
      @foreach ($job as $jobs)
       <li class="col-md-4 col-sm-6">
        <div class="jobint">
          <div class="row">
            <div class="col-md-3 col-sm-3"><img src="{{asset('/uploads/UserCv/'.$jobs->company->company_logo)}}" alt="Job Name" /></div>
            <div class="col-md-9 col-sm-9">
              <h4><a href="{{url('vacancy/detail/'.$jobs->id)}}">{{$jobs->vacancy_name}}</a></h4>
              <div class="company"><a href="#.">{{$jobs->category->name}}</a></div>
              <div class="jobloc">
                @if($jobs->jobType->id == "1")
                           <label class="fulltime">{{$jobs->jobType->name}}</label>  
                        @elseif($jobs->jobType->id == "2")
                          <label class="partTime">{{$jobs->jobType->name}}</label> 
                        @else
                          <label class="freelance">{{$jobs->jobType->name}}</label> 
                        @endif
                - <span>{{$jobs->province->name}}</span></div>
            </div>
          </div>
        </div>
      </li>    
      @endforeach
      @endif
    </ul>
    <!--view button-->
    <!--view button end--> 
  </div>
  <!-- How it Works start -->

</div><br/><br/>
<!--Footer-->
@include('frontend/partials/footer')



<!-- Bootstrap's JavaScript --> 
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 

<!-- Revolution Slider --> 
<script type="text/javascript" src="{{asset('js/jquery.themepunch.tools.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/jquery.themepunch.revolution.min.js')}}"></script> 
<!-- map with geo locations --> 

<!-- Owl carousel --> 
<script src="{{asset('js/owl.carousel.js')}}"></script> 

<!-- Custom js --> 
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>