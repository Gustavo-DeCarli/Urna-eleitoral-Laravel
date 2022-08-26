@extends('base.index')

@section('container')


    <form action='/escolas/store' method='post' onchange="myFunction();">
        <input type='hidden' name='_token' value='{{ csrf_token() }}' />

        <div class="mb-2">
            <label for="periodo" class="form-label">Selecione o periodo</label>
            <select name="periodo" class="form-control" id="periodo">
                <option value="">Selecione uma opção</option>
                @foreach ($periodos as $periodo )
                <option value="{{$periodo->id}}">De {{$periodo->dt_inicio}} até {{$periodo->dt_fim}}</option>
                @endforeach
            </select>
        </div>

        <div id="form" hidden>
        <div class="mb-2">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome_aluno" class="form-control" id="nome_aluno">
        </div>
        <div class="mb-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="number" name="cpf" class="form-control" id="cpf">
        </div>
        <div class="mb-2">
            <label for="estado" class="form-label">Estado</label>
            <select class='form-control' name="estado" id="estado">
                <option value="">Selecione uma opção</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="cidade" class="form-label">Cidade</label>
            <select class='form-control' name="cidade" id="cidade_id">
                <option value="">Selecione uma opção</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="transporte" class="form-label">Transporte</label>
            <select class='form-control' name="transporte" id="transporte">
            <option value="">Selecione uma opção</option>
                <option value="Ônibus">Ônibus</option>
                <option value="Micro-ônibus">Micro-ônibus</option>
                <option value="Van">Van</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Poder Publico Responsável:</label><br>
            <input type="radio" id="poder_publico_RESPONSAVEL" name="poder_publico_RESPONSAVEL" value="Municipio">
            <label for="Municipio">Municipio</label>
            <input type="radio" id="poder_publico_RESPONSAVEL" name="poder_publico_RESPONSAVEL" value="Estado">
            <label for="Estado">Estado</label>
        </div>

        <div class="mb-2">
            <label for="curso_id" class="form-label">Curso</label>
            <select class='form-control' name="curso_id" id="curso_id">
                <option value="">Selecione uma opção</option>
                @foreach ($cursos as $curso )
                <option value="{{$curso->id}}">{{$curso->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label for="turma_id" class="form-label">Turmas</label>
            <select class='form-control' name="turma_id" id="turma_id">
                <option value="">Selecione uma opção</option>
                @foreach ($turmas as $turma )
                <option value="{{$turma->id}}">{{$turma->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
        <label>Pagou Diferença:</label><br>
        <input type='radio' id='pagamento' name='pagamento' value='1'/>
        <label for="pagamento">Sim</label>
        <input type='radio' id='pagamento' name='pagamento' value='2'/>
        <label for="pagamento">Não</label>
        </div>

        <div class='mb-2' id='m1' hidden>
            <label for='diferenca'>Valor pago:</label><br>
            <input class='form-control' type='number' step=0.01 id='diferenca' name='diferenca' placeholder="Insira o valor">
        </div>


        <a class="mt-2 btn btn-danger" href="/escolas">Voltar</a>
        <button type="submit" class="mt-2 btn btn-primary">Enviar</button>
        </div>
    </form>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

@endsection