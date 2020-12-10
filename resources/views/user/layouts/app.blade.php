<!DOCTYPE html>
<html lang="en">

<head>
@include('user/layouts/head')
@section('head')
  @show
</head>

<body class="js">

	
	<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> -->
	<!-- End Preloader -->

 @include('user/layouts/header')

 @section('main-content')
 @show

 
  @include('user/layouts/footer')



</body>

</html>
