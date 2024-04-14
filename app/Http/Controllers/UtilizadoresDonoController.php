<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilizadoresDonoController extends Controller
{
    //


    #DESTES METODOS TODOS, RETIRAR DEPOIS DOS OBJETOS ENCONTRADOS OS QUE VAO A LEILAO

    #Metodo para encontrar os objetos correspondentes ao Dono que ja foram encontrados e entregues (Falta adicionar os atributos ao retorno)
    public function verHistoricoObjetosPerdidosEncontrados($regularId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_perdidos=array();
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        }else{
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
        if ($utilizador_DB->email == $_SESSION['user_email']) {
            $objetos_perdidos_possiveis = DB::table('objetop')->where('dono_id', $regularId)->get();
            foreach($objetos_perdidos_possiveis as $objeto_perdido){
                $objetos_perdidos_encontrado = DB::table('objetor')->where('objeto_p_id', $objeto_perdido->id)->first();
                if($objetos_perdidos_encontrado != null){
                    array_push($Id_objetos_perdidos, $objeto_perdido->objeto_id);
                }
            }
            $objetos_perdidos_final = DB::table('objeto')->whereIn('id', $Id_objetos_perdidos)->orderBy('id', 'asc')->get();
            $json = array('objetos_perdidos_encontrados' => $objetos_perdidos_final );
            return response()->json($json);
        } else {
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para aceder aos dados desse utilizador";
        } 
        }
    }

    #METODO PARA VER OS OBJETOS PERDIDOS PELO DONO (Falta adicionar os atributos ao retorno)
    public function verHistoricoObjetosPerdidos($regularId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_perdidos=array();
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objetos_perdidos = DB::table('objetop')->where('dono_id', $regularId)->get();
                foreach ($objetos_perdidos as $objeto_perdido) {
                    array_push($Id_objetos_perdidos, $objeto_perdido->objeto_id);
                }
                $objetos_perdidos_final = DB::table('objeto')->whereIn('id', $Id_objetos_perdidos)->orderBy('id', 'asc')->get();
                $json = array('objetos_perdidos' => $objetos_perdidos_final);
                return response()->json($json);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }

    #METODO PARA VER TODOS OS OBJETOS ACHADOS AOS QUAIS O DONO PODERA FAZER CORRESPONDENCIA (Falta adicionar os atributos ao retorno, Falta remover os objetos que vao a leilao)
    public function verObjetosAchados($regularId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_encontrados_entregues=array();
        $Id_objetos_encontrados=array();
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                #OBTER OS OBJETOS QUE JA FORAM ENTREGUES, E OBTER OS SEUS IDs DE OBJETO ACHADO
                $objetos_entregues = DB::table('objetor')->get();
                foreach ($objetos_entregues as $objeto_entregues) {
                    array_push($Id_objetos_encontrados_entregues, $objeto_entregues->objeto_e_id);
                }
                #OBTER OS IDs DOS OBJETOS ACHADOS, EXCETO OS QUE JA FORAM ENTREGUES
                $objetos_encontrados = DB::table('objetoe')->whereNotIn('id',$Id_objetos_encontrados_entregues )->get();
                foreach ($objetos_encontrados as $objeto_encontrado) {
                    array_push($Id_objetos_encontrados, $objeto_encontrado->objeto_id);
                }
                #OBTER OS DADOS DOS OBJETOS
                $objetos_encontrados_final = DB::table('objeto')->whereIn('id', $Id_objetos_encontrados)->orderBy('id', 'asc')->get();
                $json = array('objetos_perdidos' => $objetos_encontrados_final);
                return response()->json($json);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }

    #METODO PARA REGISTAR UM OBJETO PERDIDO PELO DONO
    public function registarObjetoPerdido($regularId, Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $data = $request->json()->all();
                #VERIFICAR SE OS CAMPOS ESTAO VAZIOS, SE ESTIVEREM, COLOCAR A NULL DE FORMA A NAO DAR ERRO
                if(!isset($data['distrito'])){
                    $data['distrito'] = null;
                }
                if(!isset($data['cidade'])){
                    $data['cidade'] = null;
                }
                if(!isset($data['freguesia'])){
                    $data['freguesia'] = null;
                }
                if(!isset($data['rua'])){
                    $data['rua'] = null;
                }
                #INSERIR O OBJETO NA TABELA DE OBJETOS COM OS DADOS CERTOS, OBTENDO O ID DO INSERT
                $id_table_objeto = DB::table('objeto')->insertGetId(['descricao' => $data['descricao'], 'categoria_id' => $data['categoria_id'], 'data_inicio' => $data['data_inicio'], 'data_fim' => $data['data_fim'], "pais" => $data['pais'], "distrito" => $data['distrito'], "cidade" => $data['cidade'], "freguesia" => $data['freguesia'], "rua" => $data['rua'], "localizacao" => $data['localizacao'], "imagem" => $data['imagem']]);
                #INSERIR O OBJETO NA TABELA DE OBJETOS PERDIDOS
                DB::table('objetop')->insert(['objeto_id' => $id_table_objeto, 'dono_id' => $regularId]);
                #INSERIR OS ATRIBUTOS DO OBJETO NA TABELA DOS VALORES DE ATRIBUTOS DOS OBJETOS
                $atributos = $data['atributos'];
                foreach ($atributos as $atributo) {
                    DB::table('valoratributos')->insert(['objeto_id' => $id_table_objeto, 'atributo_id' => $atributo['atributo_id'], 'valor' => $atributo['valor']]);
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }


    #PRECISA AINDA DE TER EM CONTA AS ALTERAÇOES DOS ATRIBUTOS/CATEGORIA
    #MESMO ESQUEMA QUE O REGISTAR OBJETO PERDIDO, MAS COM UPDATE EM VEZ DE INSERT, BUSCAR O ID EM VEZ DE SO O OBTER
    public function atualizarObjetoPerdido($regularId, $objetoPerdidoId, Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $data = $request->json()->all();
                if(!isset($data['distrito'])){
                    $data['distrito'] = null;
                }
                if(!isset($data['cidade'])){
                    $data['cidade'] = null;
                }
                if(!isset($data['freguesia'])){
                    $data['freguesia'] = null;
                }
                if(!isset($data['rua'])){
                    $data['rua'] = null;
                }
                $id_objeto = DB::table('objetop')->where('id', $objetoPerdidoId)->first();
                DB::table('objeto')->where('id', $id_objeto->objeto_id)->update(['descricao' => $data['descricao'], 'categoria_id' => $data['categoria_id'], 'data_inicio' => $data['data_inicio'], 'data_fim' => $data['data_fim'], "pais" => $data['pais'], "distrito" => $data['distrito'], "cidade" => $data['cidade'], "freguesia" => $data['freguesia'], "rua" => $data['rua'], "localizacao" => $data['localizacao'], "imagem" => $data['imagem']]);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
           }
        }
    }

    #REMOVE O OBJETO DA BASE DE DADOS
    public function removerObjetoPerdido($regularId, $objetoPerdidoId, Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {

                $objeto = DB::table('objetop')->where('id', $objetoPerdidoId)->first();
                DB::table('objeto')->where('id', $objeto->objeto_id)->delete();
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
          }
        }
    }


    #DANDO UM OBJETO, OBTER TODOS OS OBJETOS ACHADOS POSSIVEIS QUE PERTENCEM A CATEGORIA DO OBJETO PERDIDO
    public function encontrarObjetoPorCategoria($regularId, $objetoPerdidoId, Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_entregues=array();
        $Id_objetos_encontrados=array();
        $Id_objetos_perdidos=array();
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objetoP = DB::table('objetop')->where('id', $objetoPerdidoId)->where('dono_id', $regularId)->first();
                if($objetoP != null){
                    #3 FORS PARA FILTRAR OS OBJETOS DISPONIVEIS
                    $objetos_entregues = DB::table('objetor')->get();
                    foreach ($objetos_entregues as $objeto_entregues) {
                        array_push($Id_objetos_entregues, $objeto_entregues->objeto_e_id);
                    }
                    $objetos_encontrados = DB::table('objetoe')->WhereNotIn('id', $Id_objetos_entregues)->get();
                    foreach ($objetos_encontrados as $objeto_encontrados) {
                        array_push($Id_objetos_encontrados, $objeto_encontrados->objeto_id);
                    }
                    $objetos_perdidos = DB::table('objetop')->get();
                    foreach ($objetos_perdidos as $objeto_perdidos) {
                        array_push($Id_objetos_perdidos, $objeto_perdidos->objeto_id);
                    }
                    #OBTER O OBJETO DADO, SENDO POSSIVEL EXTRAIR A CATEGORIA
                    $objeto = DB::table('objeto')->where('id', $objetoP->objeto_id)->first();
                    #BUSCAR OS OBJETOS DISPONIVEIS, QUE PERTENCEM A CATEGORIA DO OBJETO DADO
                    $objetos = DB::table('objeto')->where('categoria_id', $objeto->categoria_id)->whereNotIn('id',$Id_objetos_perdidos)->whereIn('id', $Id_objetos_encontrados)->orderBy('id', 'asc')->get();
                    $json = array('objetos_encontrados' => $objetos);
                    return response()->json($json);
                } else {
                    #ALTERAR PARA ERRO 403/404
                    echo "Esse objeto não existe ou não é seu";
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
          }
        }
    }


    #MESMO ESQUEMA DA FUNCAO ANTERIOR, MAS COM A DESCRICAO DO OBJETO EM VEZ DA CATEGORIA
    public function encontrarObjetoPorDescricao($regularId, $objetoPerdidoId, Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_entregues=array();
        $Id_objetos_encontrados=array();
        $Id_objetos_perdidos=array();
        $utilizador_dono_DB = DB::table('regular')->where('id', $regularId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objetoP = DB::table('objetop')->where('id', $objetoPerdidoId)->where('dono_id', $regularId)->first();
                if($objetoP != null){
                    $objetos_entregues = DB::table('objetor')->get();
                    foreach ($objetos_entregues as $objeto_entregues) {
                        array_push($Id_objetos_entregues, $objeto_entregues->objeto_e_id);
                    }
                    $objetos_encontrados = DB::table('objetoe')->WhereNotIn('id', $Id_objetos_entregues)->get();
                    foreach ($objetos_encontrados as $objeto_encontrados) {
                        array_push($Id_objetos_encontrados, $objeto_encontrados->objeto_id);
                    }
                    $objetos_perdidos = DB::table('objetop')->get();
                    foreach ($objetos_perdidos as $objeto_perdidos) {
                        array_push($Id_objetos_perdidos, $objeto_perdidos->objeto_id);
                    }
                    $objeto = DB::table('objeto')->where('id', $objetoP->objeto_id)->first();
                    $objetos = DB::table('objeto')->where('descricao', 'like','%' . $objeto->descricao)->whereIn('id', $Id_objetos_encontrados)->whereNotIn('id',$Id_objetos_perdidos)->orderBy('id', 'asc')->orWhere('descricao', 'like','%' . $objeto->descricao . '%')->whereIn('id', $Id_objetos_encontrados)->whereNotIn('id',$Id_objetos_perdidos)->orderBy('id', 'asc')->orWhere('descricao', 'like',$objeto->descricao  . '%')->whereIn('id', $Id_objetos_encontrados)->whereNotIn('id',$Id_objetos_perdidos)->orderBy('id', 'asc')->get();
                    $json = array('objetos_encontrados' => $objetos);
                    return response()->json($json);
                } else {
                    #ALTERAR PARA ERRO 403/404
                    echo "Esse objeto não existe ou não é seu";
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
          }
        }
    }
}
