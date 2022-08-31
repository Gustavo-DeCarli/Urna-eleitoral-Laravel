<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotoController extends Controller{

    function index(){
        $candidatos = DB::table('candidatos')->get();
        return view('urna.votar', ['candidatos' => $candidatos]);
    }
}
?>