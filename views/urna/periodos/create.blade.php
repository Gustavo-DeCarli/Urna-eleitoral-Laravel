@extends('base.index')

@section('container')
<form action='/urna/periodostore' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'/>

    <div class="mb-2">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome">
    </div>
    <div class="mb-2">
        <label for="nome_reduzido" class="form-label">Data de Inicio</label>
        <input type="datetime-local" name="data_inicio" class="form-control" id="data_inicio">
    </div>
    <div class="mb-2">
        <label for="nome_reduzido" class="form-label">Data de Término</label>
        <input type="datetime-local" name="data_fim" class="form-control" id="data_fim">
    </div>
    <a class="btn btn-danger" href="/urna">Voltar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@endsection