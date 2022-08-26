<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrnaController extends Controller{
    // cursos
    
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




     // eleitores
     function createeleitor(){
        return view('urna.eleitores.create');
    }
    function storeeleitor(Request $request){
        $data = $request->all();
        unset($data['_token']);
        DB::table('eleitores')->insert($data);
        return redirect('/urna');
    }
    function editeleitor($id){
        $eleitor = DB::table('eleitores')->find($id);
        return view('urna.eleitores.edit', ['eleitor' => $eleitor]);
    }
    function updateeleitor(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $id = array_shift($data);
        DB::table('eleitores')
            ->where('id', $id)
            ->update($data);
        return redirect('/urna');
    }
    function showeleitor($id){
        $eleitor = DB::table('eleitores')->select()->find($id);
        return view('urna.eleitores.show', ['eleitor' => $eleitor]);
    }
    function destroyeleitor($id)
    {
        DB::table('eleitores')->where('id', $id)->delete();
        return redirect('/urna');
    }





// Candidatos
function createcandidato()
{
    $candidato = DB::table('candidatos')->get();

    return view('urna.candidato.create', ['candidatos' => $candidato]);
}

function storecandidato(Request $request)
{
    $data = $request->all();
    unset($data['_token']);
    DB::table('candidatos')->insert($data);
    return redirect('/urna');
}

function editcandidato($id)
{
    $candidato = DB::table('candidatos')->find($id);
    return view('urna.candudato.edit', ['candidato' => $candidato]);
}

function updatecandidato(Request $request)
{
    $data = $request->all();
    unset($data['_token']);
    $id = array_shift($data);
    DB::table('candidatos')
        ->where('id', $id)
        ->update($data);
    return redirect('/urna');
}

function showcandidato($id)
{
    $candidato = DB::table('candidatos')->select()->find($id);
    return view('urna.candidato.show', ['candidato' => $candidato]);
}

function destroycandidato($id)
{
    DB::table('candidatos')->where('id', $id)->delete();
    return redirect('/urna');
}
}
?>