@extends('frontend.layouts.template')
@section('content')
<!-- Page Title start -->
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Blog Detail</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a href="#.">Home</a> / <span>Post Name</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Title End -->
  
  <div class="listpgWraper">
    <div class="container"> 
      
      <!-- Blog start -->
      <div class="row">
        <div class="col-md-8"> 
          <!-- Blog List start -->
          <div class="blogWraper">
            <div class="blogList blogdetailbox">
              <div class="postimg"><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/blog/1.jpg" alt="Blog Title">
                <div class="date"> 17 SEP</div>
              </div>
              <div class="post-header margin-top30">
                <h4><a href="#.">Duis ultricies aliquet mauris</a></h4>
                <div class="postmeta">By : <span>Luck Walker </span> Category : <a href="#.">Movers, Shifting, Packers </a></div>
              </div>
              <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus, gravida tellus auctor, lobortis diam. In eu porta purus, sit amet pulvinar eros. Cras accumsan dignissim convallis. Curabitur aliquam efficitur diam ac pellentesque. Fusce ac leo est. <br>
                <br>
                Duis ultricies aliquet mauris vestibulum lacinia. Nulla a nibh ipsum. In diam nisl, mattis ac magna eget, pulvinar viverra ipsum. Ut vitae diam ultrices, semper risus vitae, accumsan nunc. Suspendisse ut dolor non sem pellentesque vulputate eu ut eros. Proin mollis tortor in est semper porta. Etiam rutrum, est non pellentesque sollicitudin, ligula turpis mattis nisl, at egestas justo libero id libero. In ac pretium magna. Praesent lobortis sapien bibendum, scelerisque neque in, egestas lorem. Sed pharetra lectus a odio euismod mattis. Donec egestas ante ac magna blandit aliquet. In fringilla venenatis lacus in dictum. Donec vel lacus ut tellus feugiat ullamcorper in sit amet mauris. Sed aliquet accumsan risus in tristique. Nullam semper, massa in cursus hendrerit, turpis nibh eleifend leo, sed semper est massa vel odio. </p>
              <blockquote class="text-left-align">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus. Maecenas quis sem vel neque rhoncus dignissim. Ut et eros rhoncus, gravida tellus auctor, lobortis diam. In eu porta purus, sit amet pulvinar eros. Cras accumsan dignissim convallis. Curabitur aliquam efficitur diam ac pellentesque. Fusce ac leo est.</p>
                <span class="author-name"> <a href="#.">Jhon Deneairo</a></span> </blockquote>
              <p> Integer vel magna urna. Vestibulum id nisi arcu. Ut a euismod sem. Pellentesque aliquet gravida lacus ac aliquet. Mauris sed ante a turpis suscipit sagittis sagittis eu dolor. Phasellus eget lectus dignissim, dictum ex vel, laoreet dui. In facilisis risus a posuere tincidunt. Vivamus sit amet sem sodales, semper lorem id, laoreet mi. <br>
                <br>
                Ut a metus aliquet, ornare enim at, suscipit ante. Nullam sit amet ligula mollis, lacinia ligula mollis, blandit erat. Nam in diam ut mauris mattis malesuada vel nec nunc. Mauris bibendum, ipsum sed mollis suscipit, nisl elit mattis eros, nec semper nunc leo in arcu. Fusce non leo enim. Nam massa felis, tristique sit amet varius facilisis, tristique a tortor. Pellentesque sed pretium sem. Mauris euismod sem semper, commodo tortor id, vestibulum est. <br>
                <br>
                Donec molestie sagittis consequat. Vestibulum tempus tortor tortor, ac tincidunt dolor sodales nec. Nam faucibus odio et aliquet lacinia. Vivamus suscipit metus vel dictum finibus. In vitae blandit mi. Sed eros felis, commodo a finibus vitae, sodales eget enim. Quisque iaculis nulla quis est lacinia sodales. Praesent non dignissim neque. Vestibulum at placerat risus. Aliquam tincidunt posuere diam nec vehicula. Pellentesque cursus tincidunt arcu nec auctor. Nam quis nibh ipsum. </p>
            </div>
            
          </div>
        </div>
        <div class="col-md-4"> 
          <!-- Side Bar -->
          <div class="sidebar"> 
            <!-- Search -->
            
            <!-- Categories -->
           
            <!-- Recent Posts -->
            <div class="widget">
              <h5 class="widget-title">Recent Posts</h5>
              <ul class="papu-post">
                <li>
                  <div class="media-left"> <a href="#."><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/blog/1.jpg" alt="Blog Title"></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
                </li>
                <li>
                  <div class="media-left"> <a href="#."><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/blog/1.jpg" alt="Blog Title"></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
                </li>
                <li>
                  <div class="media-left"> <a href="#."><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/blog/1.jpg" alt="Blog Title"></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
                </li>
                <li>
                  <div class="media-left"> <a href="#."><img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/blog/1.jpg" alt="Blog Title"></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#">Integer vel magna urna. Vestibulum id nisi</a> <span>Dec 18, 2016</span> </div>
                </li>
              </ul>
            </div>
            <!-- Archives Posts -->
           
            <!-- Photos -->
           
            <!-- Tags -->
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection