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
        $date = date('Y/m/d');
        $periodo = DB::table('periodos')->where('data_inicio', '<=', $date)->where('data_fim', '>=', $date)->first();
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
        $date = date('Y/m/d');
        $datetime = date('Y/m/d H:i:s');
        $periodo = DB::table('periodos')->where('data_inicio', '<=', $date)->where('data_fim', '>=', $date)->first();
        $tituloverf = DB::table('eleitores')->where('titulo', '=', $data['titulo'])->first();
        if(!isset($tituloverf)){
            echo "<script>alert('Titulo Inválido')</script>";
        }else{
            $id = $tituloverf->id;
            $vtverf = DB::table('votantes')->where('votantes.eleitor_id', '=', "$id")->get();
        }
        if(!empty($vtverf)){
            echo "<script>alert('Você já votou')</script>";
            var_dump($vtverf);
        }else{
        
        $votos [] = $data['presidente'];
        $votos [] = $data['governador'];
        $votos [] = $data['senador'];
        $votos [] = $data['dpf'];
        $votos [] = $data['dpe'];

        foreach($votos as $voto){
        DB::table('votos')->insert([
            'id' => NULL,
            'datavt' => $datetime,
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
}
?>