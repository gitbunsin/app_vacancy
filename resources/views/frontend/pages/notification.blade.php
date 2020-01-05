@extends('frontend.layouts.template')
@section('content')

    <div class="page-content">
		<div class="container">
			<div class="tr-notification section text-center">
				<div class="icon">
					<i class="fa fa-check-square-o" aria-hidden="true"></i>
				</div>
				<h1>Congratulations!</h1>
				<p>Your user account are activated.</p>
				<a href="{{ URL::previous() }}" class="btn btn-primary">Back to home</a>
			</div><!-- /.tr-notification -->
		</div><!-- /.container -->
	</div><!-- /.page-contant -->

@endsection