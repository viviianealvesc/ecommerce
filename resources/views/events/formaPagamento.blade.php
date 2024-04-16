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
							<form action="/events/pag" method="POST">
								@csrf
								<div class="shipping-chooes">
									<div class="sc-item">
										<input type="radio" name="pix" id="pix">
										<label for="pix"><img width="30" src="/img/icons/logo-pix.webp" alt=""> Pix</label>
									</div>
									<div class="sc-item">
										<input type="radio" name="cartao" id="cartao">
										<label for="cartao"><img src="/img/icons/cartao.png" alt=""> Cartão de credito</label>
									</div>
								</div>

								<button type="submit" class="btn btn-primary">Finalizar</button>
							</form>
							
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