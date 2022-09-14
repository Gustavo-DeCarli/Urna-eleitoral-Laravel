@extends('base.index')

@section('container')
<form action='/urna/periodoupdate' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />
    <input type="hidden" value="{{ $periodos->id }}" name="id" />
    <div class="mb-2">
        <label for="nome" class="form-label">Ano</label>
        <input type="number" value="{{ $periodos->nome }}" name="nome" class="form-control" id="nome">
    </div>
    <div class="mb-2">
        <label for="data_inicio" class="form-label">Data de inicio</label>
        <input type="datetime-local" value="{{ $periodos->data_inicio  }}" name="dt_inicio" class="form-control" id="data_inicio">
    </div>
    <div class="mb-2">
        <label for="data_fim" class="form-label">Data de inicio</label>
        <input type="datetime-local" value="{{ $periodos->data_fim  }}" name="dt_fim" class="form-control" id="data_fim">
    </div>
    <a class="btn btn-danger" href="/escolas">Voltar</a>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection