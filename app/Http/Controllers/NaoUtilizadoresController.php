<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NaoUtilizadoresController extends Controller
{
    public function atualizarNaoUtilizador(Request $request){
        $data = $request->json()->all();
        $n_utilizador_DB = DB::table('nutilizador')->where('id', $data['id'])->first();
        if($n_utilizador_DB != null){
            DB::table('nutilizador')->update(['nome' => $data['nome'], 'telemovel' => $data['telemovel']]);
        }
    }

    public function adicionaNovoNaoUtilizador(Request $request){
        $data = $request->json()->all();
        DB::table('nutilizador')->insert(['nome' => $data['nome'], 'telemovel' => $data['telemovel']]);
    }

    public function obterNaoUtilizadorComId(Request $request, $nUtilizadorId){
        $n_utilizador_DB = DB::table('nutilizador')->where('id', $nUtilizadorId)->first();
        if($n_utilizador_DB != null){
            $json = array('nao utilizador' => $n_utilizador_DB);
            return response()->json($json);
        }
    }

    public function atualizarNaoUtilizadorComId(Request $request, $nUtilizadorId){
        $data = $request->json()->all();
        $n_utilizador_DB = DB::table('nutilizador')->where('id', $nUtilizadorId)->first();
        if($n_utilizador_DB != null){
            DB::table('nutilizador')->update(['nome' => $data['nome'], 'telemovel' => $data['telemovel']]);
        }
    }

    public function apagarNaoUtilizadorComId(Request $request, $nUtilizadorId){
        $n_utilizador_DB = DB::table('nutilizador')->where('id', $nUtilizadorId)->first();
        if($n_utilizador_DB != null){
            DB::table('nutilizador')->where('id', $nUtilizadorId)->delete();
        }
    }
}
