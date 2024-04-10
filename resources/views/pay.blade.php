@extends('layouts.app')
@section('title', 'Pagamento')
@section('content')

<!--- Aqui eu vou gerar o QRCODE --->

@if($error)
  {{ $error }}
@endif

<div class="col-4 m-auto">
    <h3>QR code de pagamento</h3>

    @if($response)
      <img src="{{ $response['qr_codes'][0]['links'][0]['href'] }}" alt="">
    @endif
</div>



@endsection