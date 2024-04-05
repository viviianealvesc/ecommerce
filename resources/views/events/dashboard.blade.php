@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>

     /* Dashboard */
    .dashboard-events-container a, form {
        display: inline-block;
    }
 
 .dashboard-title-container {
    margin-bottom: 30px;
    margin-top: 30px;
 }

 .dashboard-events-container th {
    width: 25%;
 }

 .dashboard-events-container form {
    display: inline-block;
 }
  </style>

</head>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Produtos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
      <table class="table">
        <thead>
            <tr>
                <th scope="col">imagem</th>
                <th scope="col">Preço</th>
                <th scope="col">Tamanho</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
      <tbody>
        @foreach($shop as $shops) 
          <tr>
            <td><img width="100" src="/img/shop/{{ $shops->image }}"></img></td>
            <td>{{ $shops->valor }}</td>
            <td>{{ $shops->descricao }}</td>
            <td>
              <!-- Editar -->
              <a class="btn btn-success edit-btn" href="/events/update/{{ $shops->id }}"><ion-icon name="create-outline"></ion-icon> Editar</a> 

              <!-- Deletar -->
              <form action="/events/{{ $shops->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
      </table>
  
</div>




@endsection