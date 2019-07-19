
<!doctype html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
   @include('frontend.partials.style')

</head>
<body>
<div class="Loader"></div>
<div class="wrapper">
    <!-- Start Navigation -->
        @include('frontend.partials.navigation')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- Title Header Start -->
    <br/>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- ========== Begin: Brows job ===============  -->
        @yield('content')
    <!-- ========== End: Brows job ===============  -->

    <!-- Scripts
    ================================================== -->
   @include('frontend.partials.script')
</div>
</body>
</html>