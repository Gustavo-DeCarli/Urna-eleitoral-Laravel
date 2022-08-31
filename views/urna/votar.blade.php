@extends('base.index')
 
@section('container')
 
 
<form action='/urna/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />
 
    <div class="mb-2">
            <label for="titulo" class="form-label">Número titulo</label>
            <input type="number" name="titulo" class="form-control" id="titulo_eleitor">
        </div>
 
    <div class="mb-2">
        <label for="candidato_id" class="form-label">Candidato</label>
        <select class='form-control' name="candidato_id" id="candidato_id">
            <option value="">Selecione uma opção</option>
            @foreach ($candidatos as $candidato )
            <option value="{{$candidato->id}}">{{$candidato->nome}}</option>
            @endforeach
        </select>
    </div>
 
    <a class="mt-2 btn btn-danger" href="/urna">Voltar</a>
    <button type="submit" class="mt-2 btn btn-primary">Enviar</button>
    </div>
</form>
 
@endsection

