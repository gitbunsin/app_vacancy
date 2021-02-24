
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Job Portal HTML</title>
<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Owl carousel -->

@include('frontend.partials.style')
<link href='https://fonts.googleapis.com/css?family=Open Sans:400,500,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
	@include('frontend.partials.navigation')

	@yield('content')


	@include('frontend/partials/footer')
    <!-- JS -->
    @include('frontend/partials/script')
    @yield('scripts')
  </body>
</html>	
<script>

         
</script>