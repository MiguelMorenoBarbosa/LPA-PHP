@extends('sistema.layout')
@selection('title', 'Sistema Adoção - Pesquisa Adoção')
@selection('content')
    <div class="card border">
        <div class="card-body">
            <form action="{{route('procurarAdocao')}}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="descricaoAdocao">Descrição da adoção</label>
                    <input type="text" class="form-control" name="descricaoAdocao" id="descricaoAdocao" placeholder="Informe a descrição para a adoção">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
        <button onclick="window.location.href='{{route('adocoesPendentes'}}';" type="button" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
                </div>
        </div>
@endselection
