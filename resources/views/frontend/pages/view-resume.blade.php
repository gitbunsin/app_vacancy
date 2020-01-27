@extends('frontend.layouts.template')
@section('content')
@php
     use App\Model\language;
@endphp
    <div class="all-view section-padding">
		<div class="container">
			<div class="section">
				<ul class="tr-list resume-info">
                <li class="personal-deatils media">
                        <div class="icon">
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <span class="tr-title">Personal Deatils</span>
                            <ul class="tr-list">
                                <li><span class="left">Full Name</span><span class="middle">:</span> <span class="right">{{Auth::user()->name}}</span></li>
                                <li><span class="left">Last Name </span><span class="middle">:</span> <span class="right">{{Auth::user()->first_name}}</span></li>
                                <li><span class="left">First Name</span><span class="middle">:</span> <span class="right">{{Auth::user()->last_name}}</span></li>
                                <li><span class="left">Date of Birth</span><span class="middle">:</span> <span class="right">26/01/1982</span></li>
                                <li><span class="left">Birth Place</span><span class="middle">:</span> <span class="right">United State of America</span></li>
                                <li><span class="left">Nationality</span><span class="middle">:</span> <span class="right">Canadian</span></li>
                                <li><span class="left">Sex</span><span class="middle">:</span> <span class="right">Male</span> </li>
                                <li><span class="left">Address</span><span class="middle">:</span> <span class="right">{{Auth::user()->address}}</span></li>
                            </ul>							    	
                        </div>
                    </li><!-- /.personal-deatils -->
					<li class="work-history media">
					    <div class="icon">
					    	<i class="fa fa-briefcase" aria-hidden="true"></i>
					    </div>
					    <div class="media-body">
					    	<span class="tr-title">Work Education</span>
					    	<ul class="tr-list">
                                @foreach ($user->education as $educations)
                                    <li>
                                        <span><strong>{{$educations->school}}</strong></span>
                                        <span class="present">{{$educations->year . ' - ' . $educations->year_to }} :  {{$educations->degree}} </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </li>
                                @endforeach
					    		
					    	</ul>
					    </div>
					</li><!-- /.work-history -->	
					<li class="education-background media">
					    <div class="icon">
					    	<i class="fa fa-briefcase" aria-hidden="true"></i>
					    </div>
					    <div class="media-body">
					    	<span class="tr-title">Traning Skills Background</span>
					    	<ul class="tr-list">
                                @foreach ($user->traning as $tranings)
                                    <li>
                                        <span><strong>{{$tranings->school}}</strong></span>
                                        <ul class="tr-list">
                                            <li>Year: {{$tranings->year . ' -' . $tranings->year_to}}</li>
                                            <li>Major: {{$tranings->degree}}</li>
                                            <li>Course Duration: 2 Years</li>
                                            <li>Result: 4.00</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </li>
                                @endforeach
					    		
					    	</ul>
					    </div>
					</li><!-- /.education-background -->
					<li class="qualification media">
					    <div class="icon">
					    	<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					    </div>
					    <div class="media-body">
                            <span class="tr-title">Special Qualification Skills :</span>
                                <ol>
                                  @foreach ($user->skill as $skills)
                                           <li>{{$skills->year}} years of <strong>{{$skills->name}}</strong> </li>	
                                   @endforeach
                            
                                </ol>
					    	
					    </div>
					</li><!-- /.qualification -->
					<li class="language-proficiency media">
					    <div class="icon">
					    	<i class="fa fa-language" aria-hidden="true"></i>
					    </div>
					    <div class="media-body">
					    	<span class="tr-title">Language Proficiency:</span>
							<ul class="tr-list">
                                    @foreach ($user->language as $languages)
                                        <li>
                                            @php
                                                $language = language::find($languages->language_id);
                                            @endphp
                                            <span>{{$language ->name}}</span>
                                            <ul class="tr-list rating">
                                                    @if ($languages->level == "Good")
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                       
                                                    @elseif ($languages->level == "Very Good")
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>

                                                    @elseif ($languages->level == "Basic")
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    
                                                    @elseif($languages->level == "Native")
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>

                                                    @elseif($languages->lavel == "Proficiency")

                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>

                                                    @endif
                                            </ul>
                                        
                                        </li>
                                    @endforeach
							</ul>							    	
					    </div>
                    </li><!-- /.language-proficiency -->	
                    <li class="qualification media">
                            <div class="icon">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <span class="tr-title">Hobby & Interesting :</span>
                                    <ol>
                                      @foreach ($user->hobby as $hobbies)
                                               <li>{{$hobbies->name}}</li>	
                                       @endforeach
                                
                                    </ol>
                                
                            </div>
                        </li><!-- /.qualification -->
                        <li class="personal-deatils media">
                                <div class="icon">
                                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <span class="tr-title">Reference Deatils : </span>
                                    @foreach ($user->reference as $references)
                                        <ul class="tr-list">
                                            <li><span class="left">Name</span><span class="middle">:</span> <span class="right">{{$references->name}}</span></li>
                                            <li><span class="left">Position</span><span class="middle">:</span> <span class="right">{{$references->position}}</span></li>
                                            <li><span class="left">Email</span><span class="middle">:</span> <span class="right">{{$references->email}}</span></li>
                                            <li><span class="left">Phone</span><span class="middle">:</span> <span class="right">{{$references->phone}}</span></li>
                                        </ul>	
                                        <hr/>
                                    @endforeach
                                   						    	
                                </div>
                            </li><!-- /.personal-deatils -->
					
					<li class="personal-deatils media">
					    <div class="icon">
					    	<i class="fa fa-hand-peace-o" aria-hidden="true"></i>
					    </div>
					    <div class="media-body">
					    	<span class="tr-title">About Me</span>
					    	<p>{{$user->about_me}}</p>
					    </div>
					</li><!-- /.personal-deatils -->							
				</ul>
				<div class="buttons pull-right">
					<a href="#" class="btn btn-primary"><i class="fa fa-cloud-download" aria-hidden="true"></i>Download Resume as doc</a>
				</div>					
			</div>
		</div>	
	</div>
	

    @endsection