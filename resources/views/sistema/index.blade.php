@extends('sistema.layout')
@section('title', 'Página Inicial - Sistema Tarefas')
@section('content')
<div class="jumbtron">
    <p class="h3 text-center py-4">Cadastro de Tarefas</p>
</div>
<div class="row">
    <div class="col-md-6 col-sm-4 imgCapa">
            <a href="#" class="img-thumbnail">
                <img src="{{asset('storage/imagens/capa.jpeg')}}" />
            </a>
    </div>
    <div class="col-md-6 col-sm-8">
        <p class="texto">
            <h4>Este sistema ajudará você...</h4>
        </p>
    </div>
</div>
@endsection