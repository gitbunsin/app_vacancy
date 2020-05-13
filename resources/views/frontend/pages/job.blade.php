
@extends('frontend.layouts.template')
@section('content')
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
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Job Listing</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <a href="#.">Job Search</a> / <span>Job Name</span></div>
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
                          <li class="active"><a data-toggle="tab" href="#function">Browse By Functional Area</a></li>
                          <li><a data-toggle="tab" href="#industry">Browse By Industries</a></li>
                          <li><a data-toggle="tab" href="#location">Browse By Provinces</a></li>
                          <li><a data-toggle="tab" href="#salary">Salary Range</a></li>
                      </ul>

                      <div class="tab-content">
                          <div id="function" class="tab-pane fade in active">
                              <ul class="row catelist">   
                                @php
                                use App\Model\jobTitle;  $jobTitles = jobTitle::all();
                              @endphp
                              @foreach ($jobTitles as $jobTitle)
                              <li class="col-md-3 col-sm-4  col-xs-6">
                                <a href="{{route('jobs_listing', ['category' => $jobTitle->id ])}}" title="Design">{{$jobTitle->name}}<span>(1)</span></a>
                              </li>   
                              @endforeach  
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                                                                        
                              </ul>
                          </div>
                          <div id="industry" class="tab-pane fade">
                              <ul class="row catelist">
                                @php
                                  use App\Model\jobCategory;  $categories = jobCategory::all();
                                @endphp
                                @foreach ($categories as $category)
                                <li class="col-md-3 col-sm-4  col-xs-6">
                                  <a href="{{route('jobs_listing', ['category' => $category->id ])}}" title="Design">{{$category->name}}<span>(1)</span></a>
                                </li>   
                                @endforeach    
                             </ul>

                          </div>
                          <div id="location" class="tab-pane fade">
                              <ul class="row catelist">
                                @php
                                    use App\Model\province; $provinces = province::all();
                                @endphp
                                @foreach ($provinces as $item)
                                <li class="col-md-3 col-sm-4 col-xs-6">
                                  <a href="https://tosjob.com/jobs?state_id%5B%5D=644" title="Phnom Penh">{{$item->name}}<span>(3)</span></a>
                                </li>
                                @endforeach
                       
                           </ul>

                          </div>
                          <div id="salary" class="tab-pane fade">
                              <form action="{{url('search-salary-range')}}" method="get">
                              <!-- Salary -->
                                <div class="widget">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control" id="minSalary" placeholder="min Salary" name="minSalary" type="number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control" id="maxSalary" placeholder="max Salary" name="maxSalary" type="number">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- button -->
                                            <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> Search Jobs</button>
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
          <!-- Jobs By Title -->
          <div class="widget">
            <h4 class="widget-title">Jobs By Title</h4><hr/>
            <ul class="optionlist">
             
              @foreach ($jobTitles as $jobTitle)
                <li>
                  <input type="checkbox" name="checkname" id="{{$jobTitle->name}}" />
                  <label for="{{$jobTitle->name}}"></label>
                    {{$jobTitle->name}} 
                </li>
              @endforeach
            </ul>
            <!-- title end --> 
          </div>          
          <!-- Jobs By Industry end --> 
          
          <!-- Top Companies -->
        
          <!-- Top Companies end --> 
          
          <!-- Salary -->
          <div class="widget">
            <h4 class="widget-title">Salary Range</h4>
            <hr/>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="price1" />
                <label for="price1"></label>
                0 to $100 </li>
              <li>
                <input type="checkbox" name="checkname" id="price2" />
                <label for="price2"></label>
                $100 to $199  </li>
              <li>
                <input type="checkbox" name="checkname" id="price3" />
                <label for="price3"></label>
                $199 to $499 </li>
              <li>
                <input type="checkbox" name="checkname" id="price4" />
                <label for="price4"></label>
                $499 to $999  </li>
              <li>
                <input type="checkbox" name="checkname" id="price5" />
                <label for="price5"></label>
                $999 to $4999 </li>
              <li>
                <input type="checkbox" name="checkname" id="price6" />
                <label for="price6"></label>
                Above $4999  </li>
            </ul>
          </div>
          <!-- Salary end --> 
          
          <!-- button -->
          <div class="searchnt">
            <button class="btn"><i class="fa fa-search" aria-hidden="true"></i> Search Jobs</button>
          </div>
          <!-- button end--> 
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
          <h4 class="widget-title">Sponsord By</h4>
          <div class="gad"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/googlead.jpg" alt="your alt text" /></div>
          <div class="gad"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/googlead.jpg" alt="your alt text" /></div>
          <div class="gad"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/googlead.jpg" alt="your alt text" /></div>
          <div class="gad"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/googlead.jpg" alt="your alt text" /></div>
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
                    <div class="jobimg"><img src="{{asset('/uploads/UserCv/'.$jobs->company->company_logo)}}" alt="Job Name" /></div>
                    <div class="jobinfo">
                      <h3><a href="{{'vacancy/detail/'.$jobs->id}}">{{$jobs->vacancy_name}}</a></h3>
                      <div class="companyName"><a href="#.">{{$jobs->company->company_name}}</a></div>
                      <div class="location"><label class="fulltime">{{$jobs->jobType->name}}</label>   - <span>{{$jobs->province->name}}</span></div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <div class="listbtn"><a href="#.">Apply Now</a></div>
                  </div>
                </div>
          </li>
          @endforeach
        </ul>
          <div class="pagiWrap">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="showreslt">Showing 1-10</div>
              </div>
              <div class="col-md-8 col-sm-8 text-right">
                <ul class="pagination">
                  <li class="active"><a href="#.">1</a></li>
                  <li><a href="#.">2</a></li>
                  <li><a href="#.">3</a></li>
                  <li><a href="#.">4</a></li>
                  <li><a href="#.">5</a></li>
                  <li><a href="#.">6</a></li>
                  <li><a href="#.">7</a></li>
                  <li><a href="#.">8</a></li>
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