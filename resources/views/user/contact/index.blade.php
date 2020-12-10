@extends('user/layouts/app',['title' => 'Contact'])

@section('bg-img',asset('user/image/contact.jpeg'))

@section('main-content')


	<!-- Slider Area -->
	 <section class="hero-slider" style="background-image: url(@yield('bg-img'));background-size: cover;
		background-position: center;
		background-repeat: no-repeat;">
		<div class="single-slider">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
										<p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
										<div class="button">
											<a href="#" class="btn">Shop Now!</a>
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
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Contact</a></li>
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
	<span>@include('includes.message')</span>
							<div class="form-main">
								<div class="title">
									<h4>Get in touch</h4>
									<h3>Nous Ecrire</h3>
								</div>
								<form class="form" method="post" action="{{ route('contact.store') }}">
								@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Prenom et Nom<span>*</span></label>
												<input name="nom" type="text" placeholder="">
												<input name="lire" value="0" type="hidden" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Objet<span>*</span></label>
												<input name="objet" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" type="email" placeholder="">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Telephone<span>*</span></label>
												<input name="phone" type="number" placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>Votre Message<span>*</span></label>
												<textarea name="message" placeholder=""></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Envoyer le Message</button>
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


@endsection