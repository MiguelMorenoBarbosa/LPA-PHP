@extends('sistema.layout')
@section('title', 'Sistema Tarefas - Tarefas')
@section('content')
        <div class="card-body">Cadastro de Tarefas</h5>
            <h5 class="card-title" style="text-align: center">Cadastro de Tarefas</h5>
                <table class="table table-ordered table-hover" id="tabelaTIpo">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição da Tarefa</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th style="text-align:center" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $item)
                        <tr>
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->descricaoTarefa }}</td>
                            @if($item->status == 'N')
                                <td>Pendente</td>
                            @else
                                <td>Concluída</td>
                            @endif
                            <td>{{ $item->descricaoTipo}}</td>
                            <td style="text-align:center">
                                <a href="/tarefas/editar/{{ $item->id }}" class="btn btn-primary">Editar</a>
                            </td>
                            <td style="text-align:center">
                                <a href="/tarefas/apagar/{{ $item->id }}" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            <a href="/tarefas/novo" class="btn btn-primary btn-sm" role="button">Novo Cadastro</a>
        </div>
    </div>
@endsection