@extends('user/layouts/app',['title' => 'Se Connecter'])


@section('bg-img',asset('user/image/login.webp'))
@section('main-content')


	<!-- Slider Area -->
	<section class="hero-slider" style="background-image: url(@yield('bg-img'));background-size: cover;
	background-position: center;
	background-repeat: no-repeat;">
		<!-- Single Slider -->
		<div class="single-slider">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1><span></span>Se Connecter</h1>
										<p></p>
										<div class="button">
											<a href="{{ route('inscription.index') }}" class="btn">S'inscrire</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		<!--/ End Single Slider -->



<!-- Breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{ route('user_home') }}">Acceuil<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Se Connecter</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h3>Se Connecter</h3>
								</div>
								<form class="form" method="post" action="mail/mail.php">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" type="email" placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group">
												<label>Mot de Passe<span>*</span></label>
												<input name="company_name" type="password" placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Se Connecter</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Telephone:</h4>
									<ul>
										<li>+221 77 428 57 85</li>
										<li>+221 78 195 61 68</li>
									</ul>
								</div>

								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:ndaoamadou@gmail.com">ndaoamadou@gmail.com</a></li>
										<li><a href="mailto:yabaye07@gmail.com">yabaye07@gmail.com</a></li>
									</ul>
								</div>

								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title"> Address:</h4>
									<ul>
										<li>Medin Rue 33x28.</li>
										<li>HLM cite Madieye Sall.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</section>
	<!--/ End Contact -->
<!-- https://desolate-caverns-21167.herokuapp.com/ | https://git.heroku.com/desolate-caverns-21167.git -->

@endsection

