@extends('sistema.layout')
@section('title', 'Sistema Adoções - editar adoção')
@section('content')
    <div class="card border">
        <div class="card-body">
            <form action="/adocoes/{{$dados->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="descricaoAdocao">Descrição da adocao</label>
                    <input type="text" class="form-control" name="descricaoAdocao" id="descricaoAdocao" value="{{$dados->descricaoAdocao}}">
                </div>
                <div class="form-group">
                    <label for="tipo">Selecione o tipo da adocao</label>
                    <select class="form-control" name="tipo" id="tipo" required>
                        @foreach ($dados->tipos as item)
                            @if($dados->tipo_id == $item->id)
                                <option selected="selected" value="{{$item->id}}">{{$item->descricaoTipo}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->descricaoTipo}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectStatus">Selecione o status da adocao</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="S">
                        <label class="form-check-label" for="status">Concluída</label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="N">
                <label class="form-check-label" for="status">Pendente</label>
                </div>
            </div>
        <button type="submit" class="btn ntn-primary btn-sm">Salvar</button>
        <button onclick="window.location.href='{{route('adocoesPendentes')}}';" type="button" class="btn btn-danger btn-sm">Cancelar</button>
    </form>
    </div>
</div>
@endselection
                    