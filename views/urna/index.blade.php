@extends('base.index')

@section('container')
<a class="btn btn-success mt-2 mb-2" href="/urna/periodocreate">Novo Periodo</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Inicio</th>
            <th>Data de Término</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($periodos as $periodo)
            <tr>
                <td>{{$periodo->id}}</td>
                <td>{{$periodo->nome}}</td>
                <td>{{$periodo->data_inicio}}</td>
                <td>{{$periodo->data_fim}}</td>
                <td>
                    <a class="btn btn-warning" href="/urna/{{$periodo->id}}/periodoedit">Editar</a>
                    <a class="btn btn-info" href="/urna/{{$periodo->id}}/periodoshow">Ver</a>
                    <a class="btn btn-danger" href="/urna/{{$periodo->id}}/periododestroy">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a class="btn btn-success mb-2" href="/urna/eleitorcreate">Novo eleitor</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Titulo</th>
            <th>Zona</th>
            <th>Seção</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($eleitores as $eleitor)
            <tr>
                <td>{{$eleitor->nome}}</td>
                <td>{{$eleitor->titulo}}</td>
                <td>{{$eleitor->zona}}</td>
                <td>{{$eleitor->secao}}</td>
                <td>
                    <a class="btn btn-warning" href="/urna/{{$eleitor->id}}/eleitoredit">Editar</a>
                    <a class="btn btn-info" href="/urna/{{$eleitor->id}}/eleitorshow">Ver</a>
                    <a class="btn btn-danger" href="/urna/{{$eleitor->id}}/eleitordestroy">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a class="btn btn-success mb-2" href="/urna/candidatocreate">Nova Candidato</a>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Partido</th>
            <th>Numero</th>
            <th>Cargo</th>
            <th>Periodo</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($candidatos as $candidato)
            <tr>
                <td>{{$candidato->nome}}</td>
                <td>{{$candidato->partido}}</td>
                <td>{{$candidato->numero}}</td>
                <td>{{$candidato->cargo}}</td>
                <td>{{$candidato->periodo}}</td>

                <td>
                    <a class="btn btn-warning" href="/urna/{{$candidato->id}}/candidatoedit">Editar</a>
                    <a class="btn btn-info" href="/urna/{{$candidato->id}}/candidatoshow">Ver</a>
                    <a class="btn btn-danger" href="/urna/{{$candidato->id}}/candidatodestroy">Remover</a>
            </td>
            </tr>
        @endforeach
        

    </tbody>
</table>
<a class="btn btn-success mb-2" href="/urna/voto">Novo Voto</a>

<table class="table table-dark">
    <thead>
        <tr>
            <th>aaa</th>
            <th>aaaa</th>
            <th>aaaa</th>
            <th>aaaa</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>


@endsection