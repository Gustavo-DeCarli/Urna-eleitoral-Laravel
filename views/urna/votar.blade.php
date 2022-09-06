@extends('base.index')
 
@section('container')
 
 
<form action='/urna/store' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />
 
    <div class="mb-2">
            <label for="titulo" class="form-label">Número titulo</label>
            <input type="number" name="titulo" class="form-control" id="titulo_eleitor">
        </div>
 
    <div class="mb-2">
        <label for="presidente" class="form-label">Presidente</label>
        <select class='form-control' name="presidente" id="presidente">
            <option value="">Selecione uma opção</option>
            <option value="">Nulo/Branco</option>
            @foreach ($presidentes as $presidente )
            <option value="{{$presidente->id}}">{{$presidente->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="governador" class="form-label">Governador</label>
        <select class='form-control' name="governador" id="governador">
            <option value="">Selecione uma opção</option>
            <option value="">Nulo/Branco</option>
            @foreach ($governadores as $governador )
            <option value="{{$governador->id}}">{{$governador->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="senador" class="form-label">Senador</label>
        <select class='form-control' name="senador" id="senador">
            <option value="">Selecione uma opção</option>
            <option value="">Nulo/Branco</option>
            @foreach ($senadores as $senador )
            <option value="{{$senador->id}}">{{$senador->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="dpf" class="form-label">Deputado Federal</label>
        <select class='form-control' name="dpf" id="dpf">
            <option value="">Selecione uma opção</option>
            <option value="">Nulo/Branco</option>
            @foreach ($df as $dfs )
            <option value="{{$dfs->id}}">{{$dfs->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="dpe" class="form-label">Deputado Estadual</label>
        <select class='form-control' name="dpe" id="dpe">
            <option value="">Selecione uma opção</option>
            <option value="">Nulo/Branco</option>
            @foreach ($de as $des )
            <option value="{{$des->id}}">{{$des->nome}}</option>
            @endforeach
        </select>
    </div>
 
    <a class="mt-2 btn btn-danger" href="/urna">Voltar</a>
    <button type="submit" class="mt-2 btn btn-primary">Enviar</button>
    </div>
</form>
 
@endsection

