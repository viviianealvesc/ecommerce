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


	@if(count($carrinhoProdu) == 0)

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
							<th>Atualizar</th>
						</tr>
					</thead>
					<tbody>

			
					@foreach($carrinhoProdu as $carrinhos)
						<tr>
							<td class="product-col">
								<img width="100" src="/img/shop/{{ $carrinhos->product->image }}" alt="">
								<div class="pc-title">
									<h6>{{ $carrinhos->product->nome }}</h6>
									<form action="/events/delete/{{ $carrinhos->product->id }}" method="GET">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger">Excluir item</button>
									</form>
								</div>
							</td>
							<td class="price-col">{{ $carrinhos->product->valor }}</td>
							<td class="quy-col">
								<div class="quy-input">
									<span>Qty</span>
									<input name="quantidade" id="quantidade" min="1" type="number" value="{{ $carrinhos->quantity }}">
								</div>    
							</td>
							<td class="price-col">
								<p>{{ $carrinhos->valor }}.00</p>
							</td>
							<td class="total-col">
								<form action="/events/carrinho/{{ $carrinhos->product->id }}" method="post">
									@csrf
									<input type="hidden" name="valor" id="valor" value="{{ $carrinhos->product->valor }}">
									<input type="hidden" name="quantity" id="quantity" min="1" value="1">
									<button type="submit" class="btn"><img src="/img/icons/atualizar.png" alt=""></button>
								</form>
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