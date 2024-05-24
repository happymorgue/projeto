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
            $notificacoes=DB::table('notificacao')->where('utilizador_id', $utilizadorId)->get();
            DB::table('notificacao')->where('utilizador_id', $utilizadorId)->update(['vista' => 'S']);
            foreach($notificacoes as $notificacao){
                if ($notificacao->leilao_id==null) {
                    $objeto=DB::table('objeto')->where('id', $notificacao->objeto_perdido_id)->first();
                    $notificacao->objeto_perdido=$objeto;
                    $objeto=DB::table('objeto')->where('id', $notificacao->objeto_achado_id)->first();
                    $notificacao->objeto_achado=$objeto;
                }else{
                    $leilao=DB::table('leilao')->where('id', $notificacao->leilao_id)->first();
                    $objetoleilao = DB::table('objetoleilao')->where('id', $leilao->objeto_leilao_id)->first();
                    $objetoE = DB::table('objetoe')->where('id', $objetoleilao->objeto_e_id)->first();
                    $objeto = DB::table('objeto')->where('id', $objetoE->objeto_id)->first();
                    $leilao->objeto = $objeto;
                    $notificacao->leilao_id=$leilao;
                }
            }
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
        $id_dos_objetos_a_nao_incluir = array();

        #Obter os objetos que estão em leilão
        $id_dos_objetos_que_estao_em_leilao=DB::table('objetoleilao')->pluck('objeto_e_id');

        #Obter os objetos que foram encontrados
        $id_dos_objetos_que_foram_encontrados=DB::table('objetor')->pluck('objeto_e_id');

        #Criar a combinação dos dois arrays
        $id_dos_objetos_a_nao_incluir = $id_dos_objetos_que_estao_em_leilao->concat($id_dos_objetos_que_foram_encontrados);

        $id_dos_objetos_a_ir_buscar=DB::table('objetoe')->whereNotIn('id', $id_dos_objetos_a_nao_incluir)->pluck('objeto_id');

        #Objetos que correspondem à pesquisa
        $objetos=DB::table('objeto')->whereIn('id',$id_dos_objetos_a_ir_buscar)->where('categoria_id',$catId)->get();

        #Ir buscar os atributos dos objetos
        foreach ($objetos as $objeto) {

            #Buscar os valores dos atributos do objeto
            $atributos=DB::table('valoratributos')->where('objeto_id', $objeto->id)->get(['atributo_id','valor']);


            #Buscar a informação dos atributos
            foreach ($atributos as $atributo) {
                $atributo_info=DB::table('atributo')->where('id', $atributo->atributo_id)->first();

                #Colocar a informação do atributo no objeto
                $atributo->nome=$atributo_info->nome;

                #Colocar o tipo do atributo no objeto
                $atributo->tipo=$atributo_info->tipo_dados;
            }

            #Colocar os atributos no objeto
            $objeto->atributos=$atributos;
        }

        #Colocar num json e retornar
        $json=array('objetos'=>$objetos);
        return response()->json($json);
    }

    #Quando estiver pronto, alterar para tambem incluir no json o tipo de objeto, perdido/achado e retirar da pool de objetos a retornar os que ja foram reclamados
    #Metodo para buscar objetos por descricao
    public function buscarObjetosPorDescricao(Request $request){

        #Receber os dados do pedido
        $data = $request->json()->all();

        $id_dos_objetos_a_nao_incluir = array();

        #Obter os objetos que estão em leilão
        $id_dos_objetos_que_estao_em_leilao=DB::table('objetoleilao')->pluck('objeto_e_id');

        #Obter os objetos que foram encontrados
        $id_dos_objetos_que_foram_encontrados=DB::table('objetor')->pluck('objeto_e_id');

        #Criar a combinação dos dois arrays
        $id_dos_objetos_a_nao_incluir = $id_dos_objetos_que_estao_em_leilao->concat($id_dos_objetos_que_foram_encontrados);

        $id_dos_objetos_a_ir_buscar=DB::table('objetoe')->whereNotIn('id', $id_dos_objetos_a_nao_incluir)->pluck('objeto_id');

        #Objetos que correspondem à pesquisa
        $objetos_por_filtrar=DB::table('objeto')->where('descricao', 'like','%' . $data['descricao'] . '%')->orWhere('descricao', 'like','%' . $data['descricao'])->orWhere('descricao', 'like',$data['descricao'] . '%')->pluck('id');
        $objetos=DB::table('objeto')->whereIn('id',$objetos_por_filtrar)->whereIn('id',$id_dos_objetos_a_ir_buscar)->get();
        #Ir buscar os atributos dos objetos
        foreach ($objetos as $objeto) {

            #Buscar os valores dos atributos do objeto
            $atributos=DB::table('valoratributos')->where('objeto_id', $objeto->id)->get(['atributo_id','valor']);


            #Buscar a informação dos atributos
            foreach ($atributos as $atributo) {
                $atributo_info=DB::table('atributo')->where('id', $atributo->atributo_id)->first();

                #Colocar a informação do atributo no objeto
                $atributo->nome=$atributo_info->nome;

                #Colocar o tipo do atributo no objeto
                $atributo->tipo=$atributo_info->tipo_dados;
            }

            #Colocar os atributos no objeto
            $objeto->atributos=$atributos;
        }

        #Colocar num json e retornar
        $json=array('objetos'=>$objetos);
        return response()->json($json);
    }




    public function verLeiloes(){
                $leiloes = DB::table('leilao')->get();
                foreach ($leiloes as $leilao) {
                    $objetoleilao = DB::table('objetoleilao')->where('id', $leilao->objeto_leilao_id)->first();
                    $objetoE = DB::table('objetoe')->where('id', $objetoleilao->objeto_e_id)->first();
                    $objeto = DB::table('objeto')->where('id', $objetoE->objeto_id)->first();
                    $leilao->objeto = $objeto;
                    $licitacoes = DB::table('licitacao')->where('leilao_id', $leilao->id)->get(['data_licitacao', 'valor', 'licitante_id']);
                    $leilao->licitacoes = $licitacoes;
                }

                
                $json = array('leiloes' => $leiloes);
                #ADICIONAR CASO EM QUE NAO EXISTAM LEILOES PARA NAO SER NULL A RESPOSTA
                    return response()->json($json);
    }

}
