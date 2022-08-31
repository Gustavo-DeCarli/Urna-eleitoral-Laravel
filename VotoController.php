<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotoController extends Controller{

    function index(){
        $candidatos = DB::table('candidatos')->get();
        return view('urna.votar', ['candidatos' => $candidatos]);
    }

    function store(Request $request){
        $data = $request->all();
        unset($data['_token']);      
        $date = date('Y/m/d');
        $periodo = DB::table('periodos')->where('data_inicio', '<=', $date)->where('data_fim', '>=', $date)->first();
        $tituloverf = DB::table('eleitores')->where('titulo', '=', $data['titulo'])->first();
        if(!isset($tituloverf) OR !isset($periodo)){

        }else{
        
        DB::table('votos')->insert([
            'id' => NULL,
            'datavt' => $date,
            'candidato_id' => $data['candidato_id'],
            'zona' => $tituloverf->zona,
            'secao' => $tituloverf->secao
        ]);

        DB::table('votantes')->insert([
            'id' => NULL,
            'eleitor_id' => $tituloverf->id,
            'periodo_id' => $periodo->id
        ]);

        return redirect('/urna');
        }
    }
}
?>