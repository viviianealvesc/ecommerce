@extends('layouts.app')
@section('title', $shop->nome)
@section('content')


  <div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/shop/{{ $shop->image }}" class="img-fluid" alt="{{ $shop->nome }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h3>{{ $shop->nome }}</h3>
            <p class="event-city"><img src="/img/icons/etiqueta.png" alt="">  {{ $shop->valor }}</p>

            <h3>Cores</h3>
            <ul id="items-list">
            @foreach($shop->cores as $cores)
            <li><ion-icon name="play-outline"></ion-icon><span>{{ $cores }}</span></li>
            @endforeach
            </ul>
            <a  href="/events/leave/{{ $shop->id }}" class="btn btn-danger"  id="event-submit"><img width="20" src="/img/icons/coracao.png" alt=""> Favotitar</a> <br>

            <form action="/events/carrinho/{{ $shop->id }}" method="post">
                @csrf
                <input type="hidden" name="valor" id="valor" value="{{ $shop->valor }}"> <!-- Adicione um campo oculto para enviar o valor do produto -->
                Quant <input class="quantidade" name="quantity" id="quantity" min="1" type="number" value="1"/><br>
                <button type="submit" class="btn btn-primary" id="event-submit"><img width="20" src="/img/icons/carrinho.png" alt=""> Adicionar ao carrinho</button> <!-- Substitua o link por um botão de envio -->
            </form>

        </div>
        <div class="col-md-12" id="description-container">
            <h3>Descrição</h3>
            <p class="event-description">{{ $shop->descricao }}</p>
        </div>
    </div>

  </div>




@endsection