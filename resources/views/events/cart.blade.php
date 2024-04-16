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


	@if(count($shop) == 0)

	<div class="page-area cart-page spad">
		<div class="col-4 m-auto">
			<h5 class="col-9 m-auto">Seu carrinho esta vazio!</h5>
			<img src="/img/icons/carrinho-vazio.png" alt="">
		</div>
	</div>

	@else
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
					    @foreach($carrinhoProdu as $carrinhos)
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
									  <input name="quantidade" id="quantidade" min="1" type="number" value="{{ $carrinhos->quantity }}">
								</div>
								
							</td>
							<td class="total-col">
							<p>{{ $carrinhos->valor }} </p>
							</td>
						</tr>
						@endforeach

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
					<div class="offset-lg-2 col-lg-6">
						<div class="cart-total-details">
							<h4>Total do carrinho</h4>
							<p>Informações final</p>
							<ul class="cart-total-card">
								<li>Subtotal<span>$59.90</span></li>
								<li>Shipping<span>Free</span></li>
								<li class="total">Total<span>$ {{ $shopSoma }}</span></li>
							</ul>
							@if(count($endereco) == 0)
							<a class="site-btn btn-continue" href="/events/endereco">checkout</a>
							@else
							<a class="site-btn btn-continue" href="/events/formaPagamento">Finalizar compra</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page end -->
	@endif

	@endsection