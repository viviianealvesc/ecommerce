@extends('layouts.app')
@section('title', 'Beca Store')
@section('content')

	<!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<img src="img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area cart-page spad">
		<div class="container">
			<div class="cart-table">
				<table>
					<thead>
						<tr>
							<th class="product-th">Product</th>
							<th>Preço</th>
							<th>Quantidade</th>
							<th class="total-th">Total</th>
						</tr>
					</thead>
					<tbody>

					  @foreach($shop as $shops)
						<tr>
							<td class="product-col">
								<img width="100" src="/img/shop/{{ $shops->image }}" alt="">
								<div class="pc-title">
									<h6>{{ $shops->nome }}</h6>
									<form action="/events/delete/{{ $shops->id }}" method="GET">
										@csrf
										@method('DELETE')
									  <a class="btn btn-danger" href="/events/delete/{{ $shops->id }}">Excluir item</a>
									</form>
								</div>
							</td>
							<td class="price-col">{{ $shops->valor }}</td>
							<td class="quy-col">
								<div class="quy-input">
									<span>Qty</span>
									<form action="/events/join/cart" method="POST">
										@csrf
									  <input name="quantidade" id="quantidade" type="number"  onclick="event.preventDefault; this.closest('form').submit();">
									 
									  <a href="/events/join/cart">OK</a>
									</form>
									
								</div>
								
							</td>
							<td class="total-col">
							<p>Total </p>
							</td>
						</tr>

					@endforeach
					
					
					</tbody>
				</table>
			</div>
			<div class="row cart-buttons">
				<div class="col-lg-5 col-md-5">
					<div class="site-btn btn-continue">Continue comprando</div>
				</div>
				<div class="col-lg-7 col-md-7 text-lg-right text-left">
					<div class="site-btn btn-clear">Limpar carrinho</div>
					<div class="site-btn btn-line btn-update">Atualizar carrinho</div>
				</div>
			</div>
		</div>
		<div class="card-warp">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="shipping-info">
							<h4>Shipping method</h4>
							<p>Select the one you want</p>
							<div class="shipping-chooes">
								<div class="sc-item">
									<input type="radio" name="sc" id="one">
									<label for="one">Next day delivery<span>$4.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="two">
									<label for="two">Standard delivery<span>$1.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="three">
									<label for="three">Personal Pickup<span>Free</span></label>
								</div>
							</div>
							<h4>Cupon code</h4>
							<p>Enter your cupone code</p>
							<div class="cupon-input">
								<input type="text">
								<button class="site-btn">Apply</button>
							</div>
						</div>
					</div>
					<div class="offset-lg-2 col-lg-6">
						<div class="cart-total-details">
							<h4>Cart total</h4>
							<p>Final Info</p>
							<ul class="cart-total-card">
								<li>Subtotal<span>$59.90</span></li>
								<li>Shipping<span>Free</span></li>
								<li class="total">Total<span>$ {{ $shopSoma }}</span></li>
							</ul>
							<a class="site-btn btn-full" href="checkout.html">Proceed to checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page end -->


	@endsection