@extends('layouts.app')
@extends('user/layouts/app',['title' => 'Inscription'])
@section('bg-img',asset('user/image/ins.jpeg'))
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
							<li class="active"><a href="blog-single.html">Inscription</a></li>
							<!-- <li class="active"><a href="blog-single.html">	</a></li> -->
						
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
									<h6>@include('includes.message')</h6>
									<h3>S'incrire</h3>
								</div>
								<form class="form" method="post" action="{{ route('inscription.store') }}" enctype="multipart/form-data">
								@csrf
									<div class="row">
									<div class="col-lg-12">
											<div class="form-group">
												<label class="ml-4">Genre<span>*</span></label>
												<select name="genre" class="form-control @error('genre') is-invalid @enderror" id="">
													<option value="1">Homme</option>
													<option value="2">Femme</option>
												</select>
												@error('genre')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nom<span>*</span></label>
												<input name="nom" class="form-control @error('nom') is-invalid @enderror" type="text" placeholder="">
												@error('nom')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Prenom<span>*</span></label>
												<input name="prenom" class="form-control @error('prenom') is-invalid @enderror" type="text" placeholder="">
												@error('prenom')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="">
												@error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Telephone<span>*</span></label>
												<input name="phone" class="form-control @error('phone') is-invalid @enderror" type="number" placeholder="">
												@error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password<span>*</span></label>
												<input name="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="">
												@error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label> Confirm Password<span>*</span></label>
												<input name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" placeholder="">
												@error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Date de Naissance<span>*</span></label>
												<input name="date" class="form-control @error('date') is-invalid @enderror" type="date"  placeholder="">
												@error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>

										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Address<span>*</span></label>
												<input name="addresse" class="form-control @error('addresse') is-invalid @enderror" type="text"  placeholder="">
												@error('addresse')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>

										<div class="col-lg-12 col-12">
											<div class="form-group">
												<label>Image<span>*</span></label>
												<input name="image" class="form-control @error('image') is-invalid @enderror" type="file" placeholder="">
												@error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Valider</button>
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