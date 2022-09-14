<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotoController extends Controller{

    function index(){
        $presidentes = DB::table('candidatos')->where('cargo', '=', 'Presidente')->get();
        $governadores = DB::table('candidatos')->where('cargo', '=', 'Governador')->get();
        $senadores = DB::table('candidatos')->where('cargo', '=', 'Senador')->get();
        $df = DB::table('candidatos')->where('cargo', '=', 'Deputado Federal')->get();
        $de = DB::table('candidatos')->where('cargo', '=', 'Deputado Estadual')->get();
        $now = date('Y/m/d H:m:s');
        $periodo = DB::table('periodos')->whereDate('data_inicio', '<=', $now)->whereDate('data_fim', '>=', $now)->first();
        if(!empty($periodo->id)){
        return view('urna.votar', ['presidentes' => $presidentes, 'senadores' => $senadores, 'governadores' => $governadores, 'df' => $df, 'de' => $de],);
        }else{
            return view('urna.periodofechado');
        }
    }

    function store(Request $request){
        $data = $request->all();
        unset($data['_token']);  
        date_default_timezone_set('America/Sao_Paulo');    
        $now = date('Y/m/d H:i:s');
        $periodo = DB::table('periodos')->whereDate('data_inicio', '<=', $now)->whereDate('data_fim', '>=', $now)->first();
        $tituloverf = DB::table('eleitores')->where('titulo', '=', $data['titulo'])->first();
        if(!isset($tituloverf)){
            echo "<script>alert('Titulo Inválido')</script>";
        }else{
            $id = $tituloverf->id;
            $vtverf = DB::table('votantes')->where('votantes.eleitor_id', '=', "$id")->get();
        }
        if(!empty($vtverf[0])){
            echo "<script>alert('Você já votou')</script>";
        }else{
        
        $votos [] = $data['presidente'];
        $votos [] = $data['governador'];
        $votos [] = $data['senador'];
        $votos [] = $data['dpf'];
        $votos [] = $data['dpe'];

        foreach($votos as $voto){
        DB::table('votos')->insert([
            'id' => NULL,
            'datavt' => $now,
            'candidato_id' => $voto,
            'zona' => $tituloverf->zona,
            'secao' => $tituloverf->secao
        ]);
        }

        DB::table('votantes')->insert([
            'id' => NULL,
            'eleitor_id' => $tituloverf->id,
            'periodo_id' => $periodo->id
        ]);

        return view('urna.comprovante');
        }
    }

    function rzs(){
        $resultadoz =  DB::table('votos')->select('zona', DB::raw('count(zona) as rz'))->groupBy('zona')->orderBy(DB::raw('count(zona)'), 'desc')->get();
        $resultados =  DB::table('votos')->select('secao', DB::raw('count(secao) as rs'))->groupBy('secao')->orderBy(DB::raw('count(secao)'), 'desc')->get();

        return view('urna.resultadozs', ['resultadoz' => $resultadoz, 'resultados' => $resultados]);

    }

    function re(){
        $resultadoep =  DB::table('votos')->join('candidatos', 'candidatos.id', '=', 'votos.candidato_id')->select('candidatos.nome', DB::raw('count(votos.candidato_id) as re'))->where('candidatos.cargo', '=' ,'presidente')->groupBy('candidatos.nome')->orderBy(DB::raw('count(candidatos.nome)'), 'desc')->get();
        $resultadoeg =  DB::table('votos')->join('candidatos', 'candidatos.id', '=', 'votos.candidato_id')->select('candidatos.nome', DB::raw('count(votos.candidato_id) as re'))->where('candidatos.cargo', '=' ,'governador')->groupBy('candidatos.nome')->orderBy(DB::raw('count(candidatos.nome)'), 'desc')->get();
        $resultadoes =  DB::table('votos')->join('candidatos', 'candidatos.id', '=', 'votos.candidato_id')->select('candidatos.nome', DB::raw('count(votos.candidato_id) as re'))->where('candidatos.cargo', '=' ,'senador')->groupBy('candidatos.nome')->orderBy(DB::raw('count(candidatos.nome)'), 'desc')->get();
        $resultadoedf =  DB::table('votos')->join('candidatos', 'candidatos.id', '=', 'votos.candidato_id')->select('candidatos.nome', DB::raw('count(votos.candidato_id) as re'))->where('candidatos.cargo', '=' ,'deputado federal')->groupBy('candidatos.nome')->orderBy(DB::raw('count(candidatos.nome)'), 'desc')->get();
        $resultadoede =  DB::table('votos')->join('candidatos', 'candidatos.id', '=', 'votos.candidato_id')->select('candidatos.nome', DB::raw('count(votos.candidato_id) as re'))->where('candidatos.cargo', '=' ,'deputado estadual')->groupBy('candidatos.nome')->orderBy(DB::raw('count(candidatos.nome)'), 'desc')->get();

        return view('urna.resultadoe', ['resultadoep' => $resultadoep, 'resultadoeg' => $resultadoeg,'resultadoes' => $resultadoes,'resultadoedf' => $resultadoedf,'resultadoede' => $resultadoede,]);

    }
}
?>