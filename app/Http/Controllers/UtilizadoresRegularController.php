<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use HTTP_Request2;

class UtilizadoresRegularController extends Controller
{

    ##PENSAR SE SEQUER NECESSARIO, NAO FAZ SENTIDO
    public function atualizarUtilizadorRegular(Request $request)
    {

        #if(!isset($_SESSION)) 
        #{ 
        #    session_start(); 
        #}
        $data = $request->json()->all();
        $utilizador_reg_DB = DB::table('regular')->where('id', $data['id'])->first();
        if ($utilizador_reg_DB != null) {
            DB::table('regular')->update(['nome' => $data['nome'], 'data_nascimento' => $data['data_nascimento'], 'nif' => $data['nif'], 'telemovel' => $data['telemovel'], 'morada' => $data['morada'], 'idcivil' => $data['idcivil'], 'genero' => $data['genero']]);
            #}else{
            #$id_table_user = DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
            #Inserir na tabela regular, um utilizador com esse id
            #DB::table('regular')->insert(['user_id' => $id_table_user, 'nome' => $data['nome'], 'data_nascimento' => $data['data_nascimento'], 'nif' => $data['nif'], 'telemovel' => $data['telemovel'], 'morada' => $data['morada'], 'idcivil' => $data['idcivil'], 'genero' => $data['genero']]);
        }
    }

    #Obter um utilizador regular (funcional)
    public function obterUtilizadorRegularComId($regularId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_DB = DB::table('utilizador')->where('id', DB::table('regular')->where('id', $regularId)->first()->user_id)->first();
        if ($utilizador_DB->email == $_SESSION['user_email']) {
            $user = DB::table('regular')->where('id', $regularId)->first();
            $json = array('id' => $regularId, 'email' => $utilizador_DB->email, 'nome' => $user->nome, 'data_nascimento' => $user->data_nascimento, 'nif' => $user->nif, 'telemovel' => $user->telemovel, 'morada' => $user->morada, 'identificador civil' => $user->idcivil, 'genero' => $user->genero);
            return response()->json($json);
        } else {
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para aceder aos dados desse utilizador";
        }
    }

    public function atualizarUtilizadorRegularComId($regularId, Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        ##DEPOIS ADICIONAR PARA SO O UTILIZADOR COM A $_SESSION CERTA POSTA E QUE CONSEGUE FAZER ISSO
        $data = $request->json()->all();
        $utilizador_reg_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_reg_DB != null){
            DB::table('regular')->where('id', $regularId)->update(['nome' => $data['nome'], 'data_nascimento' => $data['data_nascimento'], 'nif' => $data['nif'], 'telemovel' => $data['telemovel'], 'morada' => $data['morada'], 'idcivil' => $data['idcivil'], 'genero' => $data['genero']]);
        }
    }


    #Apagar um utilizador regular (funcional)
    public function apagarUtilizadorRegularComId($regularId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_reg_DB = DB::table('regular')->where('id', $regularId)->first();
        $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_reg_DB->user_id)->first();
        if ($utilizador_DB->email == $_SESSION['user_email']) {
            DB::table('utilizador')->delete($utilizador_DB->id);
        } else {
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para apagar esse utilizador";
        }
    }
}
