@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Endereço</div>

                <div class="card-body">
                    <form action="/events/checkout" method="POST">
                      @csrf

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Nome Completo</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" required  autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cep" class="col-md-4 col-form-label text-md-end">CEP</label>
                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" name="cep" required autocomplete="cep">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-end">Estado</label>
                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control" name="estado" required autocomplete="estado">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cidade" class="col-md-4 col-form-label text-md-end">Cidade</label>
                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control" name="cidade" required autocomplete="estado">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bairro" class="col-md-4 col-form-label text-md-end">Bairro</label>
                            <div class="col-md-6">
                                <input id="bairro" type="bairro" class="form-control" name="bairro" required autocomplete="bairro">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rua" class="col-md-4 col-form-label text-md-end">Rua/Avenida</label>
                            <div class="col-md-6">
                                <input id="rua" type="text" class="form-control" name="rua" required autocomplete="rua">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numero" class="col-md-4 col-form-label text-md-end">Numero</label>
                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" required autocomplete="rua">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="complemento" class="col-md-4 col-form-label text-md-end">Complemento(opcional)</label>
                            <div class="col-md-6">
                                <input id="complemento" type="text" class="form-control" name="complemento" autocomplete="complemento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefone" class="col-md-4 col-form-label text-md-end">Telefone de contato</label>
                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" autocomplete="telefone">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button  class="btn btn-primary">Cadastrar endereço</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
