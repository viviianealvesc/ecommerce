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

		<div class="card-warp">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="shipping-info">
							<h4>Método de envio</h4>
							<p>Selecione o que você deseja</p>
							<div class="shipping-chooes">
								<div class="sc-item">
									<input type="radio" name="sc" id="two">
									<label for="two">Entrega Padrão<span>$1.99</span></label>
								</div>
								<div class="sc-item">
									<input type="radio" name="sc" id="three">
									<label for="three">Retirada Pessoal<span>Free</span></label>
								</div>
							</div>
							<!-- <h4>Cupon code</h4>
							<p>Enter your cupone code</p>
							<div class="cupon-input">
								<input type="text">
								<button class="site-btn">Apply</button>
							</div>
                            -->
						</div>
					</div>
					<div class="offset-lg-2 col-lg-6">
						<div class="cart-total-details">
							<h4>Total do carrinho</h4>
							<p>Informações final</p>
							<ul class="cart-total-card">
								<li>Subtotal<span>$59.90</span></li>
								<li>Shipping<span>Free</span></li>
								<li class="total">Total<span>$ </span></li>
							</ul>
							<a class="site-btn btn-full" href="/events/endereco">checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page end -->


	@endsection