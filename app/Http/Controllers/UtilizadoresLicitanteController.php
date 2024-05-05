<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilizadoresLicitanteController extends Controller
{
    public function subscreverLeilao($regularId, $leilaoId){
        if(!isset($_SESSION)) 
        {   
            #APARECER PARA NAO DEIXAR ENTRAR NO METODO
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_dono_DB == null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if($_SESSION["user_email"] == $utilizador_DB->email){
                #OBTER O LEILAO E VER SE EXISTE
                $leilao = DB::table('leilao')->where('id', $leilaoId)->first();
                if($leilao != null){
                    #INSERIR NA TABELA DE SUBSCRICAO
                    DB::table('subscricao')->insert([
                        'leilao_id' => $leilaoId,
                        'licitante_id' => $regularId
                    ]);
                }else{
                    #ALTERAR PARA ERRO 403/404
                    echo "Não existe esse leilão";
                }
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }

    public function anularSubscreverLeilao($regularId, $leilaoId){
        if(!isset($_SESSION)) 
        {   
            #APARECER PARA NAO DEIXAR ENTRAR NO METODO
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_dono_DB == null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if($_SESSION["user_email"] == $utilizador_DB->email){
                #OBTER O LEILAO E VER SE EXISTE
                $leilao = DB::table('leilao')->where('id', $leilaoId)->first();
                if($leilao != null){
                    #REMOVER A TABELA DE SUBSCRICAO
                    DB::table('subscricao')->where('leilao_id', $leilaoId)->where('licitante_id', $regularId)->delete();
                }else{
                    #ALTERAR PARA ERRO 403/404
                    echo "Não existe esse leilão";
                }
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }

    public function pagamento($regularId, $leilaoId){
        #VER DEPOIS COMO FAZER COM A API DO STRIPE OS PAGAMENTOS
    }


    #FUNCAO DE LICITAR
    public function licitar($regularId, $leilaoId, Request $request){
        if(!isset($_SESSION)) 
        {   
            #APARECER PARA NAO DEIXAR ENTRAR NO METODO
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_dono_DB == null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if($_SESSION["user_email"] == $utilizador_DB->email){
                #OBTER O LEILAO E VER SE EXISTE E SE AINDA ESTA ATIVO
                $leilao = DB::table('leilao')->where('id', $leilaoId)->first();
                if($leilao != null && $leilao->estado == 'A'){
                    $data = $request->json()->all();
                    $valor = $data['valor'];
                    #VERIFICAR O VALOR MAIS ALTO DA LICITACAO ATUAL
                    $maxLicitacao = DB::table('licitacao')->where('leilao_id', $leilaoId)->max('valor');
                    if (($maxLicitacao != null and $valor <= $maxLicitacao and $valor <= $leilao->valor) or $leilao->vencedor != null){
                        #ALTERAR PARA ERRO 403/404
                        echo "O valor da licitação tem de ser superior ao valor atual do leilão";
                    }else{
                        #INSERIR NA TABELA DE LICITACAO
                        DB::table('licitacao')->insert([
                            'leilao_id' => $leilaoId,
                            'licitante_id' => $regularId,
                            'data_licitacao' => date('Y-m-d'),
                            'valor' => $valor
                        ]);
                        #ATUALIZAR O VALOR DO LEILAO
                        DB::table('leilao')->where('id', $leilaoId)->update(['valor' => $valor]);
                        #FALTA ADICIONAR A PARTE DE ENVIAR AS NOTIFICACOES ( EXTRA )
                    }
                }else{
                    #ALTERAR PARA ERRO 403/404
                    echo "Não existe esse leilão ou não está ativo";
                }
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }


    #METODO COMPLETO COM OS JSON A RETORNAR AS COISAS CERTAS, COM O JSON A SER RETORNADO NO FINAL COM OS VALORES NO LOCAIS CERTOS E NAO SO UM ID
    public function verHistoricoLeilaoGanho($regularId){
        if(!isset($_SESSION)) 
        {   
            #APARECER PARA NAO DEIXAR ENTRAR NO METODO
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_dono_DB == null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if($_SESSION["user_email"] == $utilizador_DB->email){
                $leiloes = DB::table('leilao')->where('vencedor', $regularId)->get();
                foreach ($leiloes as $leilao) {
                    $objetoleilao = DB::table('objetoleilao')->where('id', $leilao->objeto_leilao_id)->first();
                    $objetoE = DB::table('objetoe')->where('id', $objetoleilao->objeto_e_id)->first();
                    $objeto = DB::table('objeto')->where('id', $objetoE->objeto_id)->first();
                    $leilao->objeto = $objeto;
                    $licitacoes = DB::table('licitacao')->where('leilao_id', $leilao->id)->get(['data_licitacao', 'valor', 'licitante_id']);
                    $leilao->licitacoes = $licitacoes;
                }
                $json = array('leiloes_ganhos' => $leiloes);
                #ADICIONAR CASO EM QUE NAO EXISTAM LEILOES GANHOS PARA NAO SER NULL A RESPOSTA
                    return response()->json($json);
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }


    #VER INFORMACAO RELATIVA A UM LEILAO ESPECIFICO
    public function verHistoricoLeilao($regularId, $leilaoId){
        if(!isset($_SESSION)) 
        {   
            #APARECER PARA NAO DEIXAR ENTRAR NO METODO
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_dono_DB == null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if($_SESSION["user_email"] == $utilizador_DB->email){
                $leilao = DB::table('leilao')->where('id', $leilaoId)->first();
                if ($leilao != null) {
                    $objetoleilao = DB::table('objetoleilao')->where('id', $leilao->objeto_leilao_id)->first();
                    $objetoE = DB::table('objetoe')->where('id', $objetoleilao->objeto_e_id)->first();
                    $objeto = DB::table('objeto')->where('id', $objetoE->objeto_id)->first();
                    $leilao->objeto = $objeto;
                    $licitacoes = DB::table('licitacao')->where('leilao_id', $leilao->id)->get(['data_licitacao', 'valor', 'licitante_id']);
                    $leilao->licitacoes = $licitacoes;
                    $json = array('leilao' => $leilao);
                    return response()->json($json);
                }else{
                    #ALTERAR PARA ERRO 403/404
                    echo "Não existe esse leilão";
                }
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }

    #VER LEILOES PASSADOS, FUTUROS E ATIVOS
    public function verLeiloes($regularId){
        if(!isset($_SESSION)) 
        {   
            #APARECER PARA NAO DEIXAR ENTRAR NO METODO
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_dono_DB == null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if($_SESSION["user_email"] == $utilizador_DB->email){
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
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }


    #MOSTRAR O HISTORICO DE LICITACOES REFERENTES AO UTILIZADOR
    public function verHistoricoLicitacao($regularId){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if($utilizador_dono_DB == null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if($utilizador_DB->email == $_SESSION['user_email']){
                $licitacoes = DB::table('licitacao')->where('licitante_id', $regularId)->get();

                foreach($licitacoes as $licitacao){
                    $leilao = DB::table('leilao')->where('id', $licitacao->leilao_id)->first();
                    $objetoleilao = DB::table('objetoleilao')->where('id', $leilao->objeto_leilao_id)->first();
                    $objetoE = DB::table('objetoe')->where('id', $objetoleilao->objeto_e_id)->first();
                    $objeto = DB::table('objeto')->where('id', $objetoE->objeto_id)->first();
                    $leilao->objeto = $objeto;
                    $licitacao->leilao = $leilao;
                }
                $json = array('licitacoes' => $licitacoes);
                #ADICIONAR CASO EM QUE NAO EXISTAM LEILOES PARA NAO SER NULL A RESPOSTA
                    return response()->json($json);
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }
}
