
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
   	<meta name="description" content="">
    <style>
            .error{
                color:red;
            }
        </style>
    <title></title>

   	<!-- CSS -->
       <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
       <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"> 
       <link rel="stylesheet" href="{{asset('css/jquery-te.css')}}"> 
       <link rel="stylesheet" href="{{asset('css/slick.css')}}">  
       <link rel="stylesheet" href="{{asset('css/main.css')}}">
       <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
       <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
	
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">


	<!-- icons -->
	<link rel="icon" href="images/ico/favicon.ico">	
    <link rel="apple-touch-icon" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- icons -->
  </head>
  <body>
      <br/> <br/> <br/>  <br/> <br/> <br/>
	<div class="tr-account section-padding">
		<div class="container text-center">
			<div class="user-account">
				<div class="account-content">
					<form  id="employee_login" action="#" class="tr-form">
              <meta name="csrf-token" content="{{ csrf_token() }}">
						<div class="form-group">
							<input type="email" value="{{$user->email}}" id="email" name="email" class="form-control" placeholder="email">
						</div>
						<div class="form-group">
							<input type="password" id="password" name="password" class="form-control" placeholder="password">
						</div>
												
						<button type="submit" class="btn btn-primary">Login</button>
					</form>	
				
				</div>
			</div>			
		</div><!-- container -->
	</div><!-- /.tr-account-->
    <!-- JS -->

 <script src="https://demo.themeregion.com/seeker/js/jquery.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/popper.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/bootstrap.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/inview.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/counterup.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/waypoints.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/slick.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/jquery-te.min.js"></script>
 <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
 <script src="https://demo.themeregion.com/seeker/js/gmaps.min.js"></script>
 <script src="https://demo.themeregion.com/seeker/js/main.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('js/frontend/employee_login.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
 <script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

   ga('create', 'UA-73239902-1', 'auto');
   ga('send', 'pageview');

  //  alert('ok');
 </script> 

  </body>
</html>	