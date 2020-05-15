@extends('frontend.layouts.template')
@section('content')
<!-- Page Title start -->
<div class="pageTitle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h1 class="page-heading">Blog</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="breadCrumb"><a href="#.">Home</a> / <span>Blog</span></div>
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
            <ul class="blogList">
              @if($posts)
              @foreach ($posts as $post)
              <li>
                <div class="row">
                  <div class="col-md-5">
                    <div class="postimg">
                      @if($post->feature_image)
                      <img style="width: 400px; hieght:200px;" src="{{$post->feature_image_uri}}" title="{{$post->title}}" alt="{{$post->title}}" class="img-fluid" />
                        <div class="date"> 17 SEP</div>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="post-header">
                      <h4><a href="{{url('/admin/post/'.$post->id)}}">{{$post->title}}</a></h4>
                      <div class="postmeta">By : <span>Bunsin </span> Create Date : <a href="#.">{{$post->created_at->diffForHumans()}} </a></div>
                    </div>
                    <p>{!! str_limit($post->post_content, 190, '....') !!}</p>
                    <a href="{{url('/admin/post/'.$post->id)}}" class="readmore">Read More</a> </div>
                </div>
              </li>                  
              @endforeach
              @endif
            </ul>
          </div>
          
          <!-- Pagination -->
          <div class="pagiWrap">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="showreslt">Showing 1-10</div>
              </div>
              <div class="col-md-8 col-sm-6 text-right">
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
        </div>
        <div class="col-md-4"> 
          <!-- Side Bar -->
          <div class="sidebar"> 
            <!-- Search -->
            <!-- Recent Posts -->
            <div class="widget">
              <h5 class="widget-title">Recent Posts</h5><hr/>
              @foreach ($posts as $item)
              <ul class="papu-post">
                <li>
                  <div class="media-left"> <a href="#.">
                    <img style="width: 400px; hieght:200px;" src="{{$item->feature_image_uri}}" title="{{$item->title}}" alt="{{$item->title}}" class="img-fluid" />
                  </a> 
                  </div>
                  <div class="media-body"> <a class="media-heading" href="#">{{$item->title}}</a> <span>{{date('d-m-Y', strtotime($item->created_at))}}</span> </div>
                </li>                      
              </ul>
              @endforeach
            </div>
            <!-- Archives Posts -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection