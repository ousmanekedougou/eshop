
@extends('user/layouts/app',['title' => 'Home'])
@section('bg-img',asset('user/image/index.jpg'))
@section('title','Votre E-commerce')
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
										<h1><span>UP TO 50% OFF </span style="font-size:20px;">@yield('title')</h1>
										<p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
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





   	<!-- Start Small Banner  -->
	<section class="small-banner section">
		<div class="container-fluid">
			<div class="row">
				<!-- Single Banner  -->
				@foreach($prodl as $prod)
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="{{ Storage::url($prod->image) }}" alt="#">
						<div class="content">
						</div>
					</div>
				<br>
				</div>
				@endforeach
		
			
			</div>
		</div>
	</section>
	<!-- End Small Banner -->
	
	<!-- La premiere affichage des produit -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Élément tendance</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab">Acceuil</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#man" role="tab">Homme</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Femme</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Accessoires Enfants</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="home" role="tabpanel">
									<div class="tab-single">
										<div class="row">
										@foreach($produit as $modal_pd)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														
															<img class="default-img" src="{{ Storage::url($modal_pd->image) }}" alt="#">
															<!-- <img class="default" src="https://via.placeholder.com/550x750" alt="#"> -->
													
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#produit_user-{{ $modal_pd->id }}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
															@foreach($modal_pd->categories as $cats)
																<a href="#">{{ $cats->nom }}</a>
															@endforeach
															</div>
														</div>
													</div>
													<div class="product-content">
														<div class="product-price">
															<span class="text-info text-capitalize">{{ $modal_pd->nom }} a  <span style="font-family:bold;background-color:orange;padding:5px;border-radius:100px;color:white;" >{{ $modal_pd->prix }}f </span> </span>
															<span class="text-warning"></span>
														</div>
														<h3>
															
															<a href="#">Achetter au : {{ $modal_pd->user_phone }}</a></h3>
															
														</h3>
											
													</div>
												</div>
											</div>
											@endforeach
										
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- fin de la premier affichage des produit -->


	
	

	
	<!-- La div des slider -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Toutes Les Categories</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
						@foreach($produit as $slid)
						<div class="single-product">
							<div class="product-img">
									<img class="default-img" src="{{ Storage::url($slid->image) }}" alt="#">
								
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#slid-{{ $slid->id }}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
									@foreach($slid->categories as $cats)
										<a href="#">{{ $cats->nom }}</a>
									@endforeach
									</div>
								</div>
							</div>
							<div class="product-content">
								<div class="product-price">
									<span class="text-info">{{ $slid->nom }} a {{ $slid->prix }}</span>
									<span class="text-warning"></span>
								</div>
								<h3>
									
									<a href="#">Achetter au : {{ $slid->user_phone }}</a></h3>
									
								</h3>
							
							</div>
						</div>
						@endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- fin de la div des slider -->
	
	<!-- Start Shop Home List  -->
	<section class="shop-home-list section">
		<div class="container">
			<div class="row">
					@foreach($produit as $produits)
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single List  -->
					<div class="single-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="list-image overlay">
									<img src="{{ Storage::url($produits->image) }}" alt="#">
									<a href="#" class="buy" data-toggle="modal" data-target="#produits-{{ $produits->id }}"><i class="ti-eye"></i></a>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 no-padding">
								<div class="content">
									<h4 class="title"><a  href="#">{{ $produits->nom }} </a></h4>
									<p class="price with-discount">{{ $produits->prix }}f</p>
								</div>
							</div>
						</div>
					</div>
					</div>
					@endforeach
				</div>
			
			
			</div>
		</div>
	</section>
	<!-- End Shop Home List  -->
	

	
<br>
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>BULLETIN</h4>
							<p> Abonnez-vous à notre newsletter et obtenez <span>10%</span> de votre premier achat</p>
							<form action="{{route('home_news')}}" method="POST" class="newsletter-inner">
							@csrf
								<input name="email" class=" @error('email') is-invalid @enderror" placeholder="Votre Adresse email" required="" type="email">
								<button class="btn">S'inscrire</button>
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Debut du premier modal  -->
	@foreach($produit as $modal_pd)
	<div class="modal fade" id="produit_user-{{ $modal_pd->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider"  style="background-color:black;">
												<img style="width:100%;heigth:auto;" src="{{ Storage::url($modal_pd->image) }}" alt="#">
											</div>
											
										
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>{{ $modal_pd->nom }}</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
											@for($fastar = 0 ; $fastar <= 4 ; $fastar++ )
                                                <i class="yellow fa fa-star"></i>
											@endfor
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> Poster il y' {{ $modal_pd->created_at }}</span>
                                        </div>
                                    </div>
                                    <h3>Prix : {{ $modal_pd->prix }}f</h3>
                                    <div class="quickview-peragraph">
                                        {!! $modal_pd->detail !!}
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">
												Contacter le : {{ $modal_pd->user_phone }}</h5>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
	@endforeach
	<!-- fin du premier modal -->



<!-- Debut du modal de slider -->
@foreach($produit as $slid)
	<div class="modal fade" id="slid-{{ $slid->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider"  style="background-color:black;">
												<img style="width:100%;heigth:auto;" src="{{ Storage::url($slid->image) }}" alt="#">
											</div>
											
										
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>{{ $slid->nom }}</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
											@for($fastar = 0 ; $fastar <= 4 ; $fastar++ )
                                                <i class="yellow fa fa-star"></i>
											@endfor
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> Poster il y' {{ $slid->created_at }}</span>
                                        </div>
                                    </div>
                                    <h3>Prix : {{ $slid->prix }}f</h3>
                                    <div class="quickview-peragraph">
                                        {!! $slid->detail !!}
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">
												Contacter le : {{ $slid->user_phone }}</h5>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endforeach
    <!--fin du modal pour le slid -->



<!-- fin du modal pour les cards -->
	@foreach($produit as $produits)
	<div class="modal fade" id="produits-{{ $produits->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider"  style="background-color:black;">
												<img style="width:100%;heigth:auto;" src="{{ Storage::url($produits->image) }}" alt="#">
											</div>
											
										
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>{{ $produits->nom }}</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
											@for($fastar = 0 ; $fastar <= 4 ; $fastar++ )
                                                <i class="yellow fa fa-star"></i>
											@endfor
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> Poster il y' {{ $produits->created_at }}</span>
                                        </div>
                                    </div>
                                    <h3>Prix : {{ $produits->prix }}f</h3>
                                    <div class="quickview-peragraph">
                                        {!! $produits->detail !!}
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">
												Contacter le : {{ $produits->user_phone }}</h5>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endforeach
<!-- fin du modal pour les cards -->


@endsection