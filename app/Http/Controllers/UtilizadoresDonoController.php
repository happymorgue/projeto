<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilizadoresDonoController extends Controller
{
    //


    #Metodo para encontrar os objetos correspondentes ao Dono que ja foram encontrados e entregues
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
                $objetos_entregues = DB::table('objetor')->get();
                foreach ($objetos_entregues as $objeto_entregues) {
                    array_push($Id_objetos_encontrados_entregues, $objeto_entregues->objeto_e_id);
                }
                $objetos_encontrados = DB::table('objetoe')->whereNotIn('id',$Id_objetos_encontrados_entregues )->get();
                foreach ($objetos_encontrados as $objeto_encontrado) {
                    array_push($Id_objetos_encontrados, $objeto_encontrado->objeto_id);
                }
                $objetos_encontrados_final = DB::table('objeto')->whereIn('id', $Id_objetos_encontrados)->orderBy('id', 'asc')->get();
                $json = array('objetos_perdidos' => $objetos_encontrados_final);
                return response()->json($json);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }

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
                $id_table_objeto = DB::table('objeto')->insertGetId(['descricao' => $data['descricao'], 'categoria_id' => $data['categoria_id'], 'data_inicio' => $data['data_inicio'], 'data_fim' => $data['data_fim'], "pais" => $data['pais'], "distrito" => $data['distrito'], "cidade" => $data['cidade'], "freguesia" => $data['freguesia'], "rua" => $data['rua'], "localizacao" => $data['localizacao'], "imagem" => $data['imagem']]);
                DB::table('objetop')->insert(['objeto_id' => $id_table_objeto, 'dono_id' => $regularId]);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }

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
