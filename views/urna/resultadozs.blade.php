@extends('base.index')

@section('container')
<H1 class="container text-center">Resultado por zona</h1>
<table class="table table-dark text-center">
    <thead>
        <tr>
            <th>Zona</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultadoz as $rz)
            <tr>
                <td>{{$rz->zona}}</td>
                <td>{{$rz->rz}}</td>
            </tr>
    @endforeach
    </tbody>
</table>

<H1 class="container text-center">Resultado por seção</h1>
<table class="table table-dark text-center">
    <thead>
        <tr>
            <th>Seção</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultados as $rs)
            <tr>
                <td>{{$rs->secao}}</td>
                <td>{{$rs->rs}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
@endsection