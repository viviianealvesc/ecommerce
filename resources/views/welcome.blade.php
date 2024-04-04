@extends('layouts.main')
@section('title', 'Ecommerce')
@section('content')


 @if(!$user)
 <header class="header-section">
	<div class="container-fluid">
      <div class="header-right">
         <a class="btn btn-primary" href="/events/dashboard">Entrar</a>
	  </div>
   </div>
</header>
@endif


@if($user)	
<header>	   
	<form action="/logout" method="POST">
		@csrf
		<a class="btn btn-primary" href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
	</form>
<header>
@endif


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="hs-left"><img src="img/slider-img.png" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from $19.90</div>
						<h2><span>2018</span> <br>summer collection</h2>
						<a href="" class="site-btn">Shop NOW!</a>
					</div>	
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-left"><img src="img/slider-img.png" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from $19.90</div>
						<h2><span>2018</span> <br>summer collection</h2>
						<a href="" class="site-btn">Shop NOW!</a>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Product section -->
	<section class="product-section spad">
		<div class="container">
			<ul class="product-filter controls">
				<li class="control" data-filter=".new">New arrivals</li>
				<li class="control" data-filter="all">Recommended</li>
				<li class="control" data-filter=".best">Best sellers</li>
			</ul>
			<div class="row" id="product-filter">

			@foreach($shop as $shops)
				<div class="mix col-lg-3 col-md-6 best">
					<div class="product-item">
						<figure>
							<img src="img/shop/{{$shops->image}}" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="img/icons/heart.png" alt="">
									<p>Favotitar</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>{{ $shops->nome }}</h6>
							<p>{{ $shops->valor }}</p>
							<form action="/events/carrinho/{{ $shops->id}}" method="get">
								@csrf
							   <a href="/events/carrinho/{{ $shops->id}}" class="site-btn btn-line" onclick="event.preventDefault(); this.closest('form').submit()">Adicionar ao carrinho</a>
							</form>
						</div>
					</div>
				</div>
			@endforeach
				
			</div>
		</div>
	</section>
	<!-- Product section end -->


	<!-- Blog section -->	
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="featured-item">
						<img src="img/featured/featured-3.jpg" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-lg-7">
					<h4 class="bgs-title">from the blog</h4>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/1.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>10 tips to dress like a queen</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/2.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>Fashion Outlet products</h5>
							<div class="bi-meta">July 02, 2018   |   By Jessica Smith</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
					<div class="blog-item">
						<div class="bi-thumb">
							<img src="img/blog-thumb/3.jpg" alt="">
						</div>
						<div class="bi-content">
							<h5>the little black dress just for you</h5>
							<div class="bi-meta">July 02, 2018   |   By maria deloreen</div>
							<a href="#" class="readmore">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->	


    @endsection
