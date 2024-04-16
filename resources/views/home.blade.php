@extends('layouts.app')
@section('title', 'Beca Store')
@section('content')


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
							<img src="img/shop/{{ $shops->image }}" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="img/icons/eye.png" alt="">
									<a class="btn-link" href="/events/product/{{ $shops->id}}">quick view</a>
								</div>
								<div class="pi">
									<img src="img/icons/heart.png" alt="">
									<a class="btn-link" href="/events/leave/{{ $shops->id }}">Favotitar</a>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>{{ $shops->nome }}</h6>
							<p>{{ $shops->valor }}</p>
							<form action="/events/carrinho/{{ $shops->id }}" method="get">
								@csrf
							   <a href="/events/carrinho/{{ $shops->id }}" class="site-btn btn-line" onclick="event.preventDefault(); this.closest('form').submit()">Adicionar ao carrinho</a>
							   

							</form>
						</div>
					</div>
				</div>
			@endforeach

            
			
			</div>
		</div>
	</section>
	<!-- Product section end -->

	<div class="row">
		<div class="col partner-col text-center">
			<img width="200" src="/img/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
		</div>
		<div class="col partner-col text-center">
			<img width="200" src="/img/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
		</div>
		<div class="col partner-col text-center">
			<img width="200" src="/img/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
		</div>
		<div class="col partner-col text-center">
			<img width="200" src="/img/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
		</div>
		<div class="col partner-col text-center">
			<img width="200" src="/img/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
		</div>
	</div>

@endsection
