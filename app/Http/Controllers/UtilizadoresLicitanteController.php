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
                $leilao = DB::table('leilao')->where('id', $leilaoId)->first();
                if($leilao != null){
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
                $leilao = DB::table('leilao')->where('id', $leilaoId)->first();
                if($leilao != null){
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
                $leilao = DB::table('leilao')->where('id', $leilaoId)->first();
                if($leilao != null && $leilao->estado == 'A'){
                    $data = $request->json()->all();
                    $valor = $data['valor'];
                    $maxLicitacao = DB::table('licitacao')->where('leilao_id', $leilaoId)->max('valor');
                    if (($maxLicitacao != null and $valor <= $maxLicitacao) or $leilao->vencedor != null){
                        #ALTERAR PARA ERRO 403/404
                        echo "O valor da licitação tem de ser superior ao valor atual do leilão, ou leilão já terminou";
                    }else{
                        DB::table('licitacao')->insert([
                            'leilao_id' => $leilaoId,
                            'licitante_id' => $regularId,
                            'data_licitacao' => date('Y-m-d'),
                            'valor' => $valor
                        ]);
                        DB::table('leilao')->where('id', $leilaoId)->update(['valor' => $valor]);
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
                $leiloesJson = array();
                foreach($leiloes as $leilao){
                    array_push($leiloesJson, array('data_inicio' => $leilao->data_inicio, 'data_fim' => $leilao->data_fim, 'estado' => $leilao->estado, 'vencedor' => DB::table('utilizador')->where('id', DB::table('regular')->where('id', $regularId)->pluck('user_id'))->get(), 'licitacoes' => DB::table('licitacao')->where('leilao_id', $leilao->id)->get()));
                }
                $json = array('leiloes_ganhos' => $leiloesJson);
                #ADICIONAR CASO EM QUE NAO EXISTAM LEILOES GANHOS PARA NAO SER NULL A RESPOSTA
                    return response()->json($json);
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }

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
                    #ADICIONAR NO JSON PARA COLOCAR O OBJETO EM VEZ DE SO O ID, MESMO COISA PARA O VENCEDOR
                    #TER CUIDADO COM AS LICITACOES VAZIAS
                    $json = array('leilao' => $leilao, 'licitacoes' => DB::table('licitacao')->where('leilao_id', $leilaoId)->get());
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
                #ADICIONAR NO JSON PARA COLOCAR O OBJETO EM VEZ DE SO O ID, MESMO COISA PARA O VENCEDOR
                $json = array('leiloes' => $leiloes);
                #ADICIONAR CASO EM QUE NAO EXISTAM LEILOES PARA NAO SER NULL A RESPOSTA
                    return response()->json($json);
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder a este utilizador";
            }
        }
    }

    public function verHistoricoLicitacao($regularId){
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
                $licitacoes = DB::table('licitacao')->where('licitante_id', $regularId)->get();
                #ADICIONAR NO JSON PARA COLOCAR OS DADOS DA BASE DE DADOS REFERENTES AS COISAS ME VEZ DE SO OS IDS
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
