@extends('layouts.app')
@section('title', 'Produto')
@section('content')

<head> 

    <style>
        /* Event create page */
    #event-create-container {
        padding: 30px;
        margin: 0 auto;
    }

    #event-create-container label {
        font-weight: bold;
    }

    .botao {
        width: 20%;
    }

    #event-create-container input,
    #event-create-container select,
    #event-create-container textarea {
        font-size: 18px;
    }

    .form-group {
        padding: 10px;
    }
    </style>
</head>


    <div id="event-create-container" class="col-md-6 0ffset-md-3">
        <h1>Publicar tenis</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
                <label for="image">Imagem do Tenis:</label>
                <input type="file" id="image[]" name="image[]" class="form-control-file" multiple>
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