@extends('base.index')

@section('container')

<a class="btn btn-success mb-2" href="/escolas/formulariocreate">Novo formulário</a>

<table class="table table-dark">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Transporte</th>
            <th>Poder Publ.</th>
            <th>Turma</th>
            <th>Diferença:</th>
            <th>Data de início</th>
            <th>Data de término</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($formresposta as $formrespostas)
            <tr>
                <td>{{$formrespostas->nome_aluno}}</td>
                <td>{{$formrespostas->cpf}}</td>
                <td>{{$formrespostas->estado}}</td>
                <td>{{$formrespostas->cidade}}</td>
                <td>{{$formrespostas->transporte}}</td>
                <td>{{$formrespostas->poder_publico_RESPONSAVEL}}</td>
                <td>{{$formrespostas->turma_id}}</td>
                <td>{{$formrespostas->diferença_paga}}</td>
                <td>{{$formulario->dt_inicio}}</td>
                <td>{{$formulario->dt_fim}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="/escolas/createform">Novo registro</a>