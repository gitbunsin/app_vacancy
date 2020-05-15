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
              <div class="postimg">
                <img style="width: 400px; hieght:200px;" src="{{$post->feature_image_uri}}" title="{{$post->title}}" alt="{{$post->title}}" class="img-fluid" />

                <div class="date"> 17 SEP</div>
              </div>
              <div class="post-header margin-top30">
                <h4><a href="#.">{{$post->title}}</a></h4>
                <div class="postmeta">By : <span>Bunsin</span> </div>
              </div>
              <p>{!! $post->post_content !!}</p> <br>
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
              <h5 class="widget-title">Related Posts</h5>
              <ul class="papu-post">
                @foreach ($all_post as $all_posts)
                <li>
                  <div class="media-left">
                     <a href="#.">
                       <img src="https://www.sharjeelanjum.com/html/jobs-portal/demo/images/blog/1.jpg" alt="Blog Title"></a> 
                    </div>
                  <div class="media-body"> 
                    <a class="media-heading" href="#">{{$all_posts->title}}</a> <span>{{date('d-m-Y', strtotime($all_posts->created_at))}}</span> 
                  </div>
                </li>                    
                @endforeach
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