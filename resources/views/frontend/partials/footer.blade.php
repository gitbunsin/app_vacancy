<!--Footer-->
@php
    use App\Model\jobTitle;

@endphp
<div class="footerWrap">
    <div class="container">
      <style>
        .fa-linkedin-square {
      display: inline-block;
      border-radius: 60px;
      color:#0e76a8;
      box-shadow: 0px 0px 2px #888;
      padding: 0.5em 0.6em;
      font-size: 20px;
    
    }
    .fa-youtube-square {
      display: inline-block;
      border-radius: 60px;
      color:red;
      box-shadow: 0px 0px 2px #888;
      padding: 0.5em 0.6em;
      font-size: 20px;
    }
    
    .fa-facebook-square {
      display: inline-block;
      border-radius: 60px;
      color : #3b5998;
      box-shadow: 0px 0px 2px #888;
      padding: 0.5em 0.6em;
      font-size: 20px;
    }
    </style>
      <div class="row"> 
        <!--About Us-->
        <div class="col-md-3 col-sm-12">
          <div class="ft-logo"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/logo.png" alt="Your alt text here"></div>
          <p> is Cambodia’s leading freelancer collection and professional recruitment agency, specializing in providing human capital resources and assets Our success and expertise has led to thousands of jobseekers using our services every month to search the more than 1000+ live job ads and project that looking for freelancers.</p>
          
          <!-- Social Icons -->
          <div class="social"> <a href="#." target="_blank"> 
            <i class="fa fa-facebook-square" aria-hidden="true"></i></a> 
            <a href="#." target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
            <a href="#." target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a> 
          </div>
          <!-- Social Icons end --> 
        </div>
        <!--About us End--> 
        
        <!--Quick Links-->
        <div class="col-md-2 col-sm-6">
          <h5 id="{{__('menu.font_family_en')}}">{{__('content.quick_links')}}</h5>
          <!--Quick Links menu Start-->
          <ul class="quicklinks">
            <li><a href="#.">Career Services</a></li>
            <li><a href="#.">CV Writing</a></li>
            <li><a href="#.">Career Resources</a></li>
            <li><a href="{{url('job')}}">Job Listings</a></li>
            <li><a href="#.">Success Stories</a></li>
            <li><a href="{{url('contact')}}">Contact Us</a></li>
            <li><a href="#.">Create Account</a></li>
            <li><a href="#.">Post a Job</a></li>
            <li><a href="#.">Contact Sales</a></li>
          </ul>
        </div>
        <!--Quick Links menu end--> 
        
        <!--Jobs By Industry-->
        <div class="col-md-3 col-sm-6">
          <h5 id="{{__('menu.font_family_en')}}">{{__('content.jobs_by_industry')}}</h5>
          <!--Industry menu Start-->
          <ul class="quicklinks">
            @php
                $categories = jobTitle::all();
            @endphp
            @if($categories->count())
            @foreach ($categories as $category)
              <li>
                <a href="{{route('jobs_listing', ['category' => $category->id])}}">{{$category->name}} </a>
              </li>         
            @endforeach
          @endif
          </ul>
          <!--Industry menu End-->
          <div class="clear"></div>
        </div>
        
        <!--Latest Articles-->
        <div class="col-md-4 col-sm-12">
          <h5 id="{{__('menu.font_family_en')}}">{{__('content.latest_articles')}}</h5>
          <ul class="posts-list">
            <!--Article 1-->
            @php
                use App\Model\post; $blogs = post::orderBy('id','desc')->take(3)->get();
            @endphp
            @foreach ($blogs as $blog)
            <li>
              <article class="post post-list">
                <div class="entry-content media">
                  <div class="media-left"> <a href="#." title="" class="entry-image"> 
                    <img style="width: 400px; hieght:200px;" src="{{$blog->feature_image_uri}}" title="{{$blog->title}}" alt="{{$blog->title}}" class="img-fluid" />
                  </a>
                   </div>
                  <div class="media-body">
                    <h4 class="entry-title"> <a href="#.">{{$blog->title}}</a> </h4>
                    <div class="entry-content-inner">
                      <div class="entry-meta"> <span class="entry-date">{{date('d-m-Y', strtotime($blog->created_at))}}</span> </div>
                    </div>
                  </div>
                </div>
              </article>
            </li>
                            
            @endforeach
            <!--Article end 1--> 
            
            <!--Article 2-->
           
            <!--Article end 3-->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--Copyright-->
<div class="copyright">
  <div class="container">
    <div id="{{__('menu.font_family_en')}}" class="bttxt">{{__('content.copyright')}}</a></div>
  </div>
</div>
  <!--Footer end--> 