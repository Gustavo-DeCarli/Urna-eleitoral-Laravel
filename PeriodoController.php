<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller{

        function index(){
        $periodos = DB::table('periodos')->get();
        $eleitores = DB::table('eleitores')->get();
        $candidatos = DB::table('candidatos')->get();
        $votos = DB::table('votos')->get();
        $votantes = DB::table('votantes')->get();
        return view('urna.index', [
            'periodos' => $periodos,
            'eleitores' => $eleitores,
            'candidatos' => $candidatos,
            'votos' => $votos,
            'votantes' => $votantes
        ]);
    }

    function createperiodo(){
        return view('urna.periodos.create');
    }
    function periodostore(Request $request){
        $data = $request->all();
        unset($data['_token']);
        DB::table('periodos')->insert($data);
        return redirect('/urna');
    }
    function editperiodo($id){
        $periodos = DB::table('periodos')->find($id);
        return view('urna.periodos.edit', ['periodos' => $periodos]);
    }
    function updateperiodo(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $id = array_shift($data);
        DB::table('periodos')
            ->where('id', $id)
            ->update($data);
        return redirect('/urna');
    }
    function showperiodo($id){
        $periodo = DB::table('periodos')->select()->find($id);
        return view('urna.periodos.show', ['periodo' => $periodo]);
    }
    function destroyperiodo($id)
    {
        DB::table('periodos')->where('id', $id)->delete();
        return redirect('/urna');
    }
}
?>