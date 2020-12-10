

<div class="all-category">
	<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
	<ul class="main-category">
		<li><a href="#">Autres Categories <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<ul class="sub-category">
			<li><a href="#">Electronique</a></li>
			<li><a href="#">Habillement</a></li>
			<li><a href="#">Sport</a></li>
			<li><a href="#">Habitat</a></li>
			<li><a href="#">Immobilier</a></li>
			<li><a href="#">Location</a></li>
			<li><a href="#">Bijouterie</a></li>
			<li><a href="#">Librerie </a></li>
			<li><a href="#">Accessoires </a></li>
			<li><a href="#">Mode et Beaute </a></li>
			</ul>
		</li>
		<!-- <li class="main-mega"><a href="#">best selling <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<ul class="mega-menu">
				<li class="single-menu">
					<a href="#" class="title-link">Shop Kid's</a>
					<div class="image">
						<img src="https://via.placeholder.com/225x155" alt="#">
					</div>
					<div class="inner-link">
						<a href="#">Kids Toys</a>
						<a href="#">Kids Travel Car</a>
						<a href="#">Kids Color Shape</a>
						<a href="#">Kids Tent</a>
					</div>
				</li>
				<li class="single-menu">
					<a href="#" class="title-link">Shop Men's</a>
					<div class="image">
						<img src="https://via.placeholder.com/225x155" alt="#">
					</div>
					<div class="inner-link">
						<a href="#">Watch</a>
						<a href="#">T-shirt</a>
						<a href="#">Hoodies</a>
						<a href="#">Formal Pant</a>
					</div>
				</li>
				<li class="single-menu">
					<a href="#" class="title-link">Shop Women's</a>
					<div class="image">
						<img src="https://via.placeholder.com/225x155" alt="#">
					</div>
					<div class="inner-link">
						<a href="#">Ladies Shirt</a>
						<a href="#">Ladies Frog</a>
						<a href="#">Ladies Sun Glass</a>
						<a href="#">Ladies Watch</a>
					</div>
				</li>
			</ul>
		</li> -->
		@foreach(page_category() as $cats)
		<li><a href="{{ route('show.show',$cats->id) }}">{{ $cats->nom }}</a></li>
		@endforeach
	</ul>
</div>
