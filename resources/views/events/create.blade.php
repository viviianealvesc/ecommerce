@extends('layouts.main')
@section('title', 'Produto')
@section('content')

<head>
    	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Stylesheets -->
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="css/owl.carousel.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/animate.css"/>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


    <div id="event-create-container" class="col-md-6 0ffset-md-3">
        <h1>Publicar tenis</h1>
        <form action="/events/leave/{{$shops->id}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
                <label for="image">Imagem do Tenis:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="nome">Nome do tenis:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do tenis">
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" class="form-control" id="valor" name="valor" placeholder="R$ 109.99">
            </div>
            <div class="form-group">
                <label for="items">Disponivel nas cores:</label>
                <div class="form-group">
                    <input type="checkbox" name="cores[]" value="Azul"> Azul
                </div>
                <div class="form-group">
                    <input type="checkbox" name="cores[]" value="Branco"> Branco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="cores[]" value="Preto"> Preto 
                </div>
                <div class="form-group">
                    <input type="checkbox" name="cores[]" value="Vermelho"> Vermelho
                </div>
                <div class="form-group">
                    <input type="checkbox" name="cores[]"  value="Cinza"> Cinza
                </div>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
               <textarea name="descricao" id="descricao" name="descricao" class="form-control" placeholder="Descrição do tenis"></textarea>
            </div>

            <input type="submit" class="btn btn-primary botao" value="Publicar">
        </form>
    </div>


@endsection