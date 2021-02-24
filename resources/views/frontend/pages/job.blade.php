
@extends('frontend.layouts.template')
@section('content')
@php
  use App\Model\JobTitle;
@endphp
<style>
  .pageSearch .searchform {
    background-color: white;
    padding: 20px;
    margin-bottom: 20px;
    /* color: #0072bc; */
}
.listpgWraper {
    background: #f0f0f0;
    padding: 0px 0 !important;
    min-height: 400px;
    /* color: #0072bc; */
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    /* color: #0072bc !important; */
    color: #0072bc;
}
</style>

    

<?php //echo __('content.browse_by_functional_area')?>
<?php
    ob_start(); //Start output buffer
       echo __('content.browse_by_functional_area');
       $id = ob_get_contents(); //Grab output
    ob_end_clean(); //
    // function hello() {
    //    echo __('content.browse_by_functional_area');
    // }
    ob_start(); //Start output buffer
       echo __('content.browse_by_functional_area');
       $function = ob_get_contents(); //Grab output
    ob_end_clean(); //
    ob_start(); //Start output buffer
       echo __('content.browse_by_industries');
       $industries = ob_get_contents(); //Grab output
    ob_end_clean(); //
    ob_start(); //Start output buffer
       echo __('content.browse_by_provinces');
       $province = ob_get_contents(); //Grab output
    ob_end_clean(); 
    ob_start(); //Start output buffer
       echo __('content.salary_range');
       $salary = ob_get_contents(); //Grab output
    ob_end_clean(); 

  // echo $output;
   use App\Model\vacancy;
  //  $function =  hello();
  //  echo $function;
  $arrayName = array(
    'function' =>  $function,
    'industry' =>  $industries,
    'location' => $province,
    'salary' => $salary 
  );
  // dd($arrayName );
  ?>
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><span id="{{__('menu.font_family_en')}}"> {{__('menu.job')}}</span></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a   id="{{__('menu.font_family_en')}}" href="#.">{{__('content.home')}}</a> / <a  id="{{__('menu.font_family_en')}}" href="#.">{{__('content.search_job')}}</a></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container"> <br/>

      <!-- Page Title start -->

      <div class="pageSearch">
          <div class="row">

              <div class="col-md-12">

                  <div class="searchform">
                      <ul class="nav nav-tabs">
                        @foreach ($arrayName as $key => $item)
                          <li id="{{__('menu.font_family_en')}}" class="{{ (request()->id == $key) ? 'active' : '' }}"><a data-toggle="tab" href="#{{$key}}">{{$item}}</a></li> 
                        @endforeach
                         
                      </ul>
                      <div class="tab-content">
                          <div id="function" class="tab-pane fade {{ (request()->id == 'function') ? 'in active' : '' }}">
                              <ul class="row catelist">   
                                @php
                                
                                  $jobTitles = JobTitle::all();
                              @endphp
                                @foreach ($jobTitles as $jobTitle)
                                @php
                                     $count =  vacancy::where('job_title_id','=',$jobTitle->id)->count();
                                @endphp
                                <li class="col-md-3 col-sm-4  col-xs-6">
                                  <a href="{{route('jobs_listing', ['job_title' => $jobTitle->id ,'id' => 'function'])}}" title="Design">{{$jobTitle->name}}<span>({{$count}})</span></a>
                                </li>   
                                @endforeach                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                              </ul>
                          </div>
                          <div id="industry" class="tab-pane fade  {{ (request()->id == 'industry') ? 'in active' : '' }}">
                              <ul class="row catelist">
                                @php
                                  use App\Model\jobCategory;  $categories = jobCategory::all();
                                @endphp
                                @foreach ($categories as $category)
                                @php
                                     $count =  vacancy::where('category_id','=',$category->id)->count();
                                @endphp
                                <li class="col-md-3 col-sm-4  col-xs-6">
                                  <a href="{{route('jobs_listing', ['category' => $category->id , 'id'=> 'industry' ])}}" title="Design">{{$category->name}}<span>({{$count}})</span></a>
                                </li>   
                                @endforeach    
                             </ul>

                          </div>
                          <div id="location" class="tab-pane fade {{ (request()->id == 'location') ? 'in active' : '' }}">
                              <ul class="row catelist">
                                @php
                                    use App\Model\province; $provinces = province::all();
                                @endphp
                                @foreach ($provinces as $item)
                                @php
                                   $count =  vacancy::where('province_id','=',$item->id)->count();
                                @endphp
                                <li class="col-md-3 col-sm-4 col-xs-6">
                                  <a href="{{route('jobs_listing', ['province' => $item->id , 'id'=> 'location'  ])}}" title="Phnom Penh">{{$item->name}}<span>({{$count}})</span></a>
                                </li>
                                @endforeach
                       
                           </ul>

                          </div>
                          <div id="salary" class="tab-pane fade {{ (request()->id == 'salary') ? 'in active' : '' }}">
                              <form action="{{url('search-salary-range')}}" method="get">
                              <!-- Salary -->
                                <div class="widget">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input id="{{__('menu.font_family_en')}}" class="form-control" placeholder="{{__('content.min_salary')}}" name="minSalary" type="number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input id="{{__('menu.font_family_en')}}" class="form-control"  placeholder="{{__('content.max_salary')}}" name="maxSalary" type="number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- button -->
                                            <button  id="{{__('menu.font_family_en')}}" type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('content.search_job')}}</button>
                                            <!-- button end-->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" style="display:none;">
                                                <select class="form-control" id="salary_currency" name="salary_currency"><option value="">Select Salary Currency</option><option value="AED">AED</option><option value="AF">AF</option><option value="ALL">ALL</option><option value="ANG">ANG</option><option value="ARS">ARS</option><option value="AUD">AUD</option><option value="AWG">AWG</option><option value="AZ">AZ</option><option value="BAM">BAM</option><option value="BBD">BBD</option><option value="BG">BG</option><option value="BMD">BMD</option><option value="BOB">BOB</option><option value="BRL">BRL</option><option value="BWP">BWP</option><option value="BYR">BYR</option><option value="CAD">CAD</option><option value="CHF">CHF</option><option value="CLP">CLP</option><option value="CNY">CNY</option><option value="COP">COP</option><option value="CRC">CRC</option><option value="CUP">CUP</option><option value="CZK">CZK</option><option value="DKK">DKK</option><option value="DOP ">DOP </option><option value="EGP">EGP</option><option value="EUR">EUR</option><option value="FKP">FKP</option><option value="GBP">GBP</option><option value="GHC">GHC</option><option value="GIP">GIP</option><option value="GTQ">GTQ</option><option value="GYD">GYD</option><option value="HNL">HNL</option><option value="HUF">HUF</option><option value="IDR">IDR</option><option value="ILS">ILS</option><option value="INR">INR</option><option value="IRR">IRR</option><option value="ISK">ISK</option><option value="JEP">JEP</option><option value="JMD">JMD</option><option value="JPY">JPY</option><option value="KGS">KGS</option><option value="KHR">KHR</option><option value="KYD">KYD</option><option value="KZT">KZT</option><option value="LAK">LAK</option><option value="LBP">LBP</option><option value="LKR">LKR</option><option value="LRD">LRD</option><option value="LTL">LTL</option><option value="LVL">LVL</option><option value="MKD">MKD</option><option value="MNT">MNT</option><option value="MUR">MUR</option><option value="MX">MX</option><option value="MYR">MYR</option><option value="MZ">MZ</option><option value="NAD">NAD</option><option value="NG">NG</option><option value="NIO">NIO</option><option value="NOK">NOK</option><option value="NPR">NPR</option><option value="NZD">NZD</option><option value="OMR">OMR</option><option value="PAB">PAB</option><option value="PE">PE</option><option value="PHP">PHP</option><option value="PKR">PKR</option><option value="PL">PL</option><option value="PYG">PYG</option><option value="QAR">QAR</option><option value="RO">RO</option><option value="RSD">RSD</option><option value="RUB">RUB</option><option value="SAR">SAR</option><option value="SBD">SBD</option><option value="SCR">SCR</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="SHP">SHP</option><option value="SOS">SOS</option><option value="SRD">SRD</option><option value="SVC">SVC</option><option value="SYP">SYP</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="TTD">TTD</option><option value="TVD">TVD</option><option value="TWD">TWD</option><option value="UAH">UAH</option><option value="USD" selected="selected">USD</option><option value="UYU">UYU</option><option value="UZS">UZS</option><option value="VEF">VEF</option><option value="VND">VND</option><option value="YER">YER</option><option value="ZAR">ZAR</option><option value="ZWD">ZWD</option></select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Salary end -->
                            </div>
                        </form>
                      </div>
                  </div>

              </div>

          </div>

      </div>

      <!-- Page Title end -->


    
    <!-- Search Result and sidebar start -->
    <div class="row">
      <div class="col-md-3 col-sm-6"> 
        <!-- Side Bar start -->
        <div class="sidebar"> 
        <form action="{{url('search-salary-range')}}" method="get">
          <!-- Jobs By Title -->
          <div class="widget">
            <h6 class="widget-title"><span id="{{__('menu.font_family_en')}}">{{__('content.search_job_title')}}</span></h6><hr/>
            <ul class="optionlist">
             
              @foreach ($jobTitles as $key => $jobTitle)
                <li>
                  <input value="{{$key}}" type="checkbox" name="search_job[]" id="{{$jobTitle->name}}" />
                  <label for="{{$jobTitle->name}}"></label>
                    {{$jobTitle->name}} 
                </li>
              @endforeach
            </ul>
            <!-- title end --> 
          </div>                    
          <!-- Salary -->
          <div class="widget">
            <h6 class="widget-title"> <span id="{{__('menu.font_family_en')}}">{{__('content.salary_range')}}</span></h6>
            <hr/>
            @php
            $salaryRange = array(
              '100' => '0 to $100 ',
              '200' => '$100 to $199 ',
              '500' => '$199 to $499 ',
              '600' => '$999 to $4999'
            );
            // dd($arrayName );
          @endphp
            <ul class="optionlist">
              @foreach ($salaryRange as $key => $salaryRanges)
              <li>
                <input value="{{$key}}" type="checkbox" name="salary_Range[]" id="{{$key}}" />
                <label for="  {{$salaryRanges}}"></label>
                {{$salaryRanges}}
              </li>
              @endforeach
            </ul>
          </div>
          <!-- Salary end --> 
          
          <!-- button -->
          <div class="searchnt">
            <button id="{{__('menu.font_family_en')}}" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('content.salary_range')}}</button>
          </div>
          <!-- button end--> 
        </form>
        </div>
      
        <!-- Side Bar end --> 
      </div>
      <div class="col-md-3 col-sm-6 pull-right"> 
        <!-- Social Icons -->
        {{-- <div class="sidebar">
          <h4 class="widget-title">Follow Us</h4>
          <div class="social"> <a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="http://www.plus.google.com" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> <a href="http://www.facebook.com" target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="https://www.pinterest.com" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a> <a href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a> <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> </div>
          <!-- Social Icons end --> 
        </div> --}}
        
        <!-- Sponsord By -->
        <div class="sidebar">
          <h4 class="widget-title"> <span id="{{__('menu.font_family_en')}}" >{{__('content.sponsord_by')}}</span></h4>
            <img src="https://tpc.googlesyndication.com/simgad/3092116571683652112" alt="your alt text" />
            <hr/>
            <img src="https://tpc.googlesyndication.com/simgad/8180027987819859227" alt="your alt text" />
        
          </div>
      </div>
      <div class="col-md-6 col-sm-12"> 
        <!-- Search List -->
        <ul class="searchList">
          <!-- job start -->
          @if(!$job->isEmpty())
          @foreach($job as $jobs)
          <li>
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <div class="jobimg">
                      <img src="{{asset('/uploads/UserCv/'.$jobs->company->company_logo)}}" alt="Job Name" />
                    </div>
                    <div class="jobinfo">
                      <h3><a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a></h3>
                      <div class="companyName"><a href="#.">{{$jobs->company->company_name}}</a></div>
                      <div class="location">
                        @if($jobs->jobType->id == "1")
                           <label class="fulltime">{{$jobs->jobType->name}}</label>  
                        @elseif($jobs->jobType->id == "2")
                          <label class="partTime">{{$jobs->jobType->name}}</label> 
                        @else
                          <label class="freelance">{{$jobs->jobType->name}}</label> 
                        @endif
                         - <span>{{$jobs->province->name}}</span>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <div class="listbtn"><a href="{{'vacancy/detail/'.$jobs->id}}">Apply Now</a></div>
                  </div>
                </div>
          </li>
          @endforeach
        </ul>
          <div class="pagiWrap">
            <div class="row">
              <div class="col-md-5 col-sm-5">
                <div id="{{__('menu.font_family_en')}}" class="showreslt">{{__('content.showing_page')}} :  {{$job->currentPage() . ' - '. $job->perPage() }} {{__('content.total')}} {{$job->total()}}</div>
              </div>
              <div class="col-md-7 col-sm-7 text-right">
                <ul class="pagination">
                  <li class="active">{{$job->links()}}</li>
                </ul>
              </div>
            </div>
          </div>
          @else
            <div class="no-search-results-wrap text-center">
                <p class="p-4">
                    <img src="{{asset('assets/images/no-search.png')}}" />
                </p>
                <h3>Whoops, no mathces</h3>
                <h5 class="text-muted">We couldn't find any search results. </h5>
                <h5 class="text-muted">Give it another try</h5>
            </div>
           @endif
          <!-- job end --> 
       
        
        <!-- Pagination Start -->
       
        <!-- Pagination end --> 
      </div>
    </div>
  </div>
</div>

@endsection