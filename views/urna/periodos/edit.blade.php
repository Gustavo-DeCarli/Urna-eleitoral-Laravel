@extends('base.index')

@section('container')
<form action='/urna/periodoupdate' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />
    <input type="hidden" value="{{ $curso->id }}" name="id" />
    <div class="mb-2">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" value="{{ $curso->nome  }}" name="nome" class="form-control" id="nome">
    </div>
    <div class="mb-2">
        <label for="nome_reduzido" class="form-label">Nome Reduzido</label>
        <input type="text" value="{{ $curso->nome_reduzido  }}" name="nome_reduzido" class="form-control" id="nome_reduzido">
    </div>
    <a class="btn btn-danger" href="/escolas">Voltar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection