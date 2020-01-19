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
						<form action="{{route('jobs_listing')}}" class="form-inline" method="get">
                        <input type="text" name='q' class="form-control" placeholder="Job Keyword">
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

	<div class="tr-category section-padding">
		<div class="container">
			<div class="section-title">
				<h1>Browse Jobs By Category</h1>
			</div>
			<ul class="category-list tr-list">
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category1.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Accounting/Finance</span>
						<span class="category-quantity">(1298)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category2.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Education/Training</span>
						<span class="category-quantity">(76212)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category3.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Engineer/Architects</span>
						<span class="category-quantity">(212)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category4.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Garments/Textile</span>
						<span class="category-quantity">(972)</span>
					</a>
				</li>
			</ul>
			<ul class="category-list tr-list">
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category5.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">HR/Org. Development</span>
						<span class="category-quantity">(1298)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category6.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Design/Creative</span>
						<span class="category-quantity">(76212)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category7.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Research/Consultancy</span>
						<span class="category-quantity">(1298)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category12.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Medical/Pharma</span>
						<span class="category-quantity">(76212)</span>
					</a>
				</li>
			</ul>
			<ul class="category-list category-list-bottom tr-list">
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category8.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Music & Arts</span>
						<span class="category-quantity">(212)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category12.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Marketing/Sales</span>
						<span class="category-quantity">(972)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category11.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Production/Operation</span>
						<span class="category-quantity">(212)</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon">
							<img src="https://demo.themeregion.com/seeker/images/icons/category12.png" alt="Icon" class="img-fluid">
						</span>
						<span class="category-title">Miscellaneous</span>
						<span class="category-quantity">(972)</span>
					</a>
				</li>
			</ul>
		</div><!-- /.container -->
	</div><!-- /.tr-category -->

	<div class="tr-steps bg-image section-padding section-before">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="step">
						<div class="step-image">
							<img src="https://demo.themeregion.com/seeker/images/icons/step2.png" alt="images" class="img-fluid">
						</div>
						<h1>01 Steps</h1>
						<h2>Register an account</h2>
					</div><!-- step -->
				</div>
				<div class="col-sm-4">
					<div class="step">
						<div class="step-image">
							<img src="https://demo.themeregion.com/seeker/images/icons/step2.png" alt="images" class="img-fluid">
						</div>
						<h1>02 Steps</h1>
						<h2>search your desired job</h2>
					</div><!-- /.step -->
				</div>
				<div class="col-sm-4">
					<div class="step">
						<div class="step-image">
							<img src="https://demo.themeregion.com/seeker/images/icons/step2.png" alt="images" class="img-fluid">
						</div>
						<h1>03 Steps</h1>
						<h2>Send your resume to employers</h2>
					</div><!-- /.step -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.tr-steps -->
	<br/><br/><br/>
@endsection