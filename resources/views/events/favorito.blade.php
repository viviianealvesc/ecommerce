@extends('layouts.app')
@section('title', '$shop->nome')
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
						</tr>
					</thead>
					<tbody>

					  @foreach($shops as $shop)
						<tr>
							<td class="product-col">
								<img width="100" src="/img/shop/{{ $shop->image }}" alt="">
								<div class="pc-title">
									<h6>{{ $shop->nome }}</h6>
									<form action="/events/delete/{{ $shop->id }}" method="GET">
										@csrf
										@method('DELETE')
									  <a class="btn btn-danger" href="/events/delete/{{ $shop->id }}">Excluir item</a>
									</form>
								</div>
							</td>
							<td class="price-col">{{ $shop->valor }}</td>
						</tr>

					@endforeach
					
					
					</tbody>
				</table>
			</div>
			<div class="row cart-buttons">
				<div class="col-lg-5 col-md-5">
					<div class="site-btn btn-continue">
						<a href="/">Continue comprando</a>
					</div>
				</div>
				<div class="col-lg-7 col-md-7 text-lg-right text-left">
					<div class="site-btn btn-clear">Limpar Favoritos</div>
				</div>
			</div>
		</div>
	
	@endsection

