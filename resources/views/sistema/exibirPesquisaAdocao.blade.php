@extends('sistema.layout')
@section('title', 'Sistema Adoção - Adoção')
@section('content')
        <div class="card-body">Cadastro de Adoção</h5>
            <h5 class="card-title" style="text-align: center">Cadastro de Adoção</h5>
                <table class="table table-ordered table-hover" id="tabelaTIpo">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição da Adoção</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th style="text-align:center" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $item)
                        <tr>
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->descricaoAdocao }}</td>
                            @if($item->status == 'N')
                                <td>Pendente</td>
                            @else
                                <td>Concluída</td>
                            @endif
                            <td>{{ $item->descricaoTipo}}</td>
                            <td style="text-align:center">
                                <a href="/adocoes/editar/{{ $item->id }}" class="btn btn-primary">Editar</a>
                            </td>
                            <td style="text-align:center">
                                <a href="/adocoes/apagar/{{ $item->id }}" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            <a href="/adocoes/novo" class="btn btn-primary btn-sm" role="button">Novo Cadastro</a>
        </div>
    </div>
@endsection