@extends('base.index')

@section('container')
<form action='/escolas/eleitorupdate' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />
    <input type="hidden" value="{{ $eleitor->id }}" name="id" />
    <div class="mb-2">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" value='{{$eleitor->nome}}' name="nome" class="form-control" id="nome">
    </div>
    <div class="mb-2">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="number" value='{{$eleitor->titulo}}' name="titulo" class="form-control" id="titulo">
    </div>
    <div class="mb-2">
        <label for="zona" class="form-label">Zona</label>
        <input type="text" value='{{$eleitor->zona}}' name="zona" class="form-control" id="zona">
    </div>
    <div class="mb-2">
        <label for="secao" class="form-label">Seção</label>
        <input type="text" value='{{$eleitor->secao}}' name="secao" class="form-control" id="secao">
    </div>
    <a class="btn btn-danger" href="/urna">Voltar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection