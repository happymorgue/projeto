<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilizadoresController extends Controller
{

    #Metodo para desativar a conta de um utilizador
    public function desativarUtilizador($utilizadorId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_DB = DB::table('utilizador')->where('id', $utilizadorId)->first();
        if ($utilizador_DB->email==$_SESSION['user_email']) {
            DB::table('utilizador')->where('id', $utilizadorId)->update(['ativo' => 'N']);
            $json=array('utilizadorId'=>$utilizadorId,'email'=>$utilizador_DB->email, 'ativo'=>'N');
            return response()->json($json);
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para desativar este utilizador";
        }
    }

    #Metodo para receber notificacoes de um utilizador
    public function receberNotificacao($utilizadorId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_DB = DB::table('utilizador')->where('id', $utilizadorId)->first();
        if ($utilizador_DB->email==$_SESSION['user_email']) {
            $notificacoes=DB::table('notificacao')->where('utilizador_id', $utilizadorId)->where('vista','N')->pluck('mensagem');
            DB::table('notificacao')->where('utilizador_id', $utilizadorId)->update(['vista' => 'S']);
            $json=array('notificacoes'=>$notificacoes);
            return response()->json($json);
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para receber notificações deste utilizador";
        }
    }


    #Quando estiver pronto, alterar para tambem incluir no json o tipo de objeto, perdido/achado e retirar da pool de objetos a retornar os que ja foram reclamados
    #Metodo para buscar objetos por categoria
    public function buscarObjetosPorCategoria($catId){
        $objetos=DB::table('objeto')->where('categoria_id', $catId)->get();
        $json=array('objetos'=>$objetos);
        return response()->json($json);
    }

    #Quando estiver pronto, alterar para tambem incluir no json o tipo de objeto, perdido/achado e retirar da pool de objetos a retornar os que ja foram reclamados
    #Metodo para buscar objetos por descricao
    public function buscarObjetosPorDescricao(Request $request){
        $data = $request->json()->all();
        $objetos=DB::table('objeto')->where('descricao', 'like','%' . $data['descricao'] . '%')->orWhere('categoria_id', 'like','%' . $data['descricao'])->orWhere('categoria_id', 'like',$data['descricao'] . '%')->get();
        $json=array('objetos'=>$objetos);
        return response()->json($json);
    }

}
