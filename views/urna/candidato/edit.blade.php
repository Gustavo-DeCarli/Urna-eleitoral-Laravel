@extends('base.index')

@section('container')
<form action='/urna/candidatoupdate' method='post'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />
    <input type="hidden" value="{{ $candidato->id }}" name="id" />
    </div>
    <div class="mb-2">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" value="{{ $candidato->nome  }}" name="nome" class="form-control" id="nome">
    </div>
    <div class="mb-2">
        <label for="partido" class="form-label">Partido</label>
        <input type="text" value="{{ $candidato->partido  }}" name="partido" class="form-control" id="partido">
    </div>
    <div class="mb-2">
        <label for="numero" class="form-label">Número</label>
        <input type="number" value="{{ $candidato->numero  }}" name="numero" class="form-control" id="numero">
    </div>
    <div class="mb-2">
        <label for="cargo" class="form-label">Cargo</label>
        <select name="cargo" class="form-control" id="cargo">
            <option value="{{ $candidato->cargo  }}">{{ $candidato->cargo  }}</option>
            <option value='Presidente'>Presidente</option>
            <option value='Governador'>Governador</option>
            <option value='Senador'>Senador</option>
            <option value='Deputado Federal'>Deputado Federal</option>
            <option value='Deputado Estadual'>Deputado Estadual</option>
        </select>
        
    <a class="btn btn-danger" href="/urna">Voltar</a>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection