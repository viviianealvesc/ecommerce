@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="col-4 m-auto">
    <form name="formCard" id="formCard" action="PayController.php" method="post">
        <input type="text" name="publicKey" id="publicKey">
        <input type="text" name="encriptedCard" id="encriptedCard">
        <input type="text" class="form-control" name="cardNumber" id="cardNumber" maxlength="16" placeholder="Nome do cartão">
        <input type="text" class="form-control" name="cardHolder" id="cardHolder" placeholder="Nome do cartão">
        <input type="text" class="form-control" name="cardMonth" id="cardMonth" maxlength="2" placeholder="Mes de validade">
        <input type="text" class="form-control" name="cardYear" id="cardYear" maxlength="4" placeholder="Ano do cartão">
        <input type="text" class="form-control" name="cardCvv" id="cardCvv" maxlength="4" placeholder="CVV do cartão">
        <input type="submit" class="btn btn-primary" value="Pagar">     
    </form>
</div>


 <script src="/js/pay.js"></script>

@endsection