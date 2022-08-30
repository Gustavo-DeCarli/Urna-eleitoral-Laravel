<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EleitorController extends Controller{
    
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
}
?>
