@extends('frontend.layouts.template')
@section('content')
<!-- End Navigation -->
<div class="clearfix"></div>


<!-- Main Banner Section Start -->
<div class="hero-banner" data-ride="carousel" data-pause="hover" data-interval="false" >
    <div class="hero-img">
        <img style="position: relative;right: -830px;top:55px;" src="{{asset('img/about/about-us.jpg')}}" class="img-responsive" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 col-sm-8">
                <div class="content">
                    <h2>Talent?<br> Meet Opportunity.</h2>
                    <div>Showcase what's important to you by adding photos, pages, groups and more to your featured section on your public profile.</div>
                    <form class="banner-form" data-animation="animated fadeInUp">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search For...">
                            <span class="input-group-btn">
											<button type="button" class="btn bg-success">Go & Search</button>
										</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- Main Banner Section End -->

<!-- ========= start Call To Action section =========== -->
<div class="clearfix"></div>
<section class="call-to-act">
    <div class="container-fluid">

        <div class="col-md-6 col-sm-6 no-padd bl-dark">
            <div class="call-to-act-caption">
                <h2>We Are Expert In Web design and development</h2>
                <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</h3>
                <a href="#" class="btn bat-call-to-act">Hire Us</a>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 no-padd gr-dark">
            <div class="call-to-act-caption">
                <h2>We Are Expert In Web design and development</h2>
                <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</h3>
                <a href="#" class="btn bat-call-to-act">Join Us</a>
            </div>
        </div>

    </div>
</section>
<br/><br/>
<div class="clearfix"></div>
<footer class="">
    <div class="row copyright">
        <div class="container">
            <p>Copyright Love Jobs © 2019. All Rights Reserved </p>
        </div>
    </div>
</footer>
<!-- =========== Call To Action section End ============= -->
@endsection