@extends('base.index')

@section('container')
<H1 class="container text-center">Resultado eleições Presidente</h1>
<table class="table table-dark text-center">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultadoep as $rep)
            <tr>
                <td>{{$rep->nome}}</td>
                <td>{{$rep->re}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
<H1 class="container text-center">Resultado eleições Governador</h1>
<table class="table table-dark text-center">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultadoeg as $reg)
            <tr>
                <td>{{$reg->nome}}</td>
                <td>{{$reg->re}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
<H1 class="container text-center">Resultado eleições Senador</h1>
<table class="table table-dark text-center">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultadoes as $res)
            <tr>
                <td>{{$res->nome}}</td>
                <td>{{$res->re}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
<H1 class="container text-center">Resultado eleições Deputado Federal</h1>
<table class="table table-dark text-center">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultadoedf as $redf)
            <tr>
                <td>{{$redf->nome}}</td>
                <td>{{$redf->re}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
<H1 class="container text-center">Resultado eleições Deputado Estadual</h1>
<table class="table table-dark text-center">
    <thead>
        <tr>
            <th>Candidato</th>
            <th>Votos</th>
        </tr>
    </thead>
    <tbody>
    @foreach($resultadoede as $rede)
            <tr>
                <td>{{$rede->nome}}</td>
                <td>{{$rede->re}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
@endsection