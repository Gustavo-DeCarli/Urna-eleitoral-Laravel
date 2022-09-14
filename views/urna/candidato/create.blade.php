@extends('base.index')
@section('container')
<form action='/urna/candidatostore' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />

    <div class="mb-2">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" id="nome">
    </div>
    <div class="mb-2">
        <label for="partido" class="form-label">Partido</label>
        <input type="text" name="partido" class="form-control" id="partido">
    </div>
    <div class="mb-2">
        <label for="numero" class="form-label">Número</label>
        <input type="number" name="numero" class="form-control" id="numero">
    </div>
    <div class="mb-2">
        <label for="cargo" class="form-label">Cargo</label>
        <select type="text" name="cargo" class="form-control" id="cargo">
            <option value=''>Selecione uma opção</option>
            <option value='Presidente'>Presidente</option>
            <option value='Governador'>Governador</option>
            <option value='Senador'>Senador</option>
            <option value='Deputado Federal'>Deputado Federal</option>
            <option value='Deputado Estadual'>Deputado Estadual</option>
        </select>
    </div>
    <div class="mb-2">
        <label for="periodo" class="form-label">Periodo</label>
        @foreach($dados as $dado)
        <select name="periodo" class="form-control" id="periodo">
            <option value='{{$dado->id}}'>{{$dado->data_inicio}}--{{$dado->data_fim}}</option>
        </select>
        @endforeach    
    </div>

    <a class="btn btn-danger" href="/urna">Voltar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection
