<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CandidatoController extends Controller{
    
    function createcandidato()
{
    $dados = DB::table('candidatos', 'periodos')->get();

    return view('urna.candidato.create', ['dados' => $dados]);
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