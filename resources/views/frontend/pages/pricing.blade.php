@extends('frontend.layouts.template')
@section('content')
    <section class="wp-process home-three">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>How We Work</p>
                    <h2>Our Work <span>Process</span></h2>
                </div>
            </div>
            <!--/row-->

            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon">
                        <span class="fa fa-5x fa fa-search "></span>
                    </div>
                    <div class="work-process-caption">
                        <h4>Search Job</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>

                <div class="work-process">
                    <div class="work-process-icon">
                        <span class="fa fa-phone"></span>
                    </div>
                    <div class="work-process-caption">
                        <h4>Find Job</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>

                <div class="work-process">
                    <div class="work-process-icon">
                        <span class="fa fa-group"></span>
                    </div>
                    <div class="work-process-caption">
                        <h4>Hire Employee</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 hidden-sm">
                <img src="{{asset('img/service/wp-iphone.png')}}" class="img-responsive" alt="" />
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon">
                        <span class="fa fa-dot-circle-o"></span>
                    </div>
                    <div class="work-process-caption">
                        <h4>Start Work</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>

                <div class="work-process">
                    <div class="work-process-icon">
                        <span class="fa fa-dollar"></span>
                    </div>
                    <div class="work-process-caption">
                        <h4>Pay Money</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>

                <div class="work-process">
                    <div class="work-process-icon">
                        <span class="fa fa-smile-o"></span>
                    </div>
                    <div class="work-process-caption">
                        <h4>Happy</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>
    <section class="pricing">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>How We Work</p>
                    <h2>Our Work <span>Process</span></h2>
                </div>
            </div>
            <!--/row-->
            <div class="col-md-4 col-sm-4">
                <div class="pr-table">
                    <div class="pr-header">
                        <div class="pr-plan">
                            <h4>Free</h4>
                        </div>
                        <div class="pr-price">
                            <h3><sup>$</sup>29<sub>/Mon</sub></h3>
                        </div>
                    </div>
                    <div class="pr-features">
                        <ul>
                            <li>1 GB Ram</li>
                            <li>2 GB Memory</li>
                            <li>1 Core Processor</li>
                            <li>32 GB SSD Disk</li>
                            <li>1 TB Transfer</li>
                        </ul>
                    </div>
                    <div class="pr-buy-button">
                        <a href="#" class="pr-btn" title="Price Button">Get Started</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="pr-table">
                    <div class="pr-header active">
                        <div class="pr-plan">
                            <h4>Basic </h4>
                        </div>
                        <div class="pr-price">
                            <h3><sup>$</sup>40<sub>/Mon</sub></h3>
                        </div>
                    </div>
                    <div class="pr-features">
                        <ul>
                            <li>1 GB Ram</li>
                            <li>2 GB Memory</li>
                            <li>1 Core Processor</li>
                            <li>32 GB SSD Disk</li>
                            <li>1 TB Transfer</li>
                        </ul>
                    </div>
                    <div class="pr-buy-button">
                        <a href="#" class="pr-btn active" title="Price Button">Get Started</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="pr-table">
                    <div class="pr-header">
                        <div class="pr-plan">
                            <h4>Premium</h4>
                        </div>
                        <div class="pr-price">
                            <h3><sup>$</sup>120<sub>/Mon</sub></h3>
                        </div>
                    </div>
                    <div class="pr-features">
                        <ul>
                            <li>1 GB Ram</li>
                            <li>2 GB Memory</li>
                            <li>1 Core Processor</li>
                            <li>32 GB SSD Disk</li>
                            <li>1 TB Transfer</li>
                        </ul>
                    </div>
                    <div class="pr-buy-button">
                        <a href="#" class="pr-btn" title="Price Button">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="">
        <div class="row copyright">
            <div class="container">
                <p>Copyright Love Jobs © 2019. All Rights Reserved </p>
            </div>
        </div>
    </footer>

    @endsection