<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilizadoresPoliciaController extends Controller
{
    public function verHistoricoObjetosEncontrados($policiaId){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_perdidos=array();
        $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
        if ($utilizador_policia_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objetos_perdidos = DB::table('objetoe')->where('policia_id', $policiaId)->get();
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

    public function verHistoricoObjetosEntregues($policiaId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_encontrados=array();
        $utilizador_dono_DB = DB::table('policia')->where('id', $policiaId)->first();
        if ($utilizador_dono_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        }else{
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
        if ($utilizador_DB->email == $_SESSION['user_email']) {
            $objetos_encontrados_possiveis = DB::table('objetoe')->where('policia_id', $policiaId)->get();
            foreach($objetos_encontrados_possiveis as $objeto_encontrado){
                $objetos_encontrado_entregue = DB::table('objetor')->where('objeto_e_id', $objeto_encontrado->id)->first();
                if($objetos_encontrado_entregue != null){
                    array_push($Id_objetos_encontrados, $objeto_encontrado->objeto_id);
                }
            }
            $objetos_perdidos_final = DB::table('objeto')->whereIn('id', $Id_objetos_encontrados)->orderBy('id', 'asc')->get();
            $json = array('objetos_perdidos_encontrados' => $objetos_perdidos_final );
            return response()->json($json);
        } else {
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para aceder aos dados desse utilizador";
        } 
        }
    }



    public function verObjetosPerdidos($policiaId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Id_objetos_perdidos_entregues=array();
        $Id_objetos_perdidos=array();
        $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
        if ($utilizador_policia_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objetos_entregues = DB::table('objetor')->get();
                foreach ($objetos_entregues as $objeto_entregues) {
                    array_push($Id_objetos_perdidos_entregues, $objeto_entregues->objeto_p_id);
                }
                $objetos_perdidos = DB::table('objetop')->whereNotIn('id',$Id_objetos_perdidos_entregues )->get();
                foreach ($objetos_perdidos as $objeto_perdido) {
                    array_push($Id_objetos_perdidos, $objeto_perdido->objeto_id);
                }
                $objetos_encontrados_final = DB::table('objeto')->whereIn('id', $Id_objetos_perdidos)->orderBy('id', 'asc')->get();
                $json = array('objetos_encontrados' => $objetos_encontrados_final);
                return response()->json($json);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }


    #ADICIONAR AINDA PARA CASO ALGUM OBJETO JA ESTAR NA TABELA DE CORRESPONDENTES OU OBJETOS EM LEILAO, NAO ADICIONAR
    public function registarPossivelDono($policiaId, $foundObjectId, $regularId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
        if ($utilizador_policia_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objeto_encontrado = DB::table('objetoe')->where('id', $foundObjectId)->first();
                if($objeto_encontrado != null){
                    $utilizador_regular_DB = DB::table('regular')->where('id', $regularId)->first();
                    if ($utilizador_regular_DB != null){
                        DB::table('PossivelDono')->insert(['objeto_e_id' => $foundObjectId,'regular_id' => $regularId]);
                    }
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }



    #ADICIONAR AINDA PARA CASO ALGUM OBJETO JA ESTAR NA TABELA DE CORRESPONDENTES
    public function registarObjetoCorrespondente($policiaId, $foundObjectId, $lostObjectId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
        if ($utilizador_policia_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objeto_encontrado = DB::table('objetoe')->where('id', $foundObjectId)->first();
                if($objeto_encontrado != null){
                    $objeto_perdido = DB::table('objetop')->where('id', $lostObjectId)->first();
                    if ($objeto_perdido != null){
                        DB::table('objetor')->insert(['entrege' => 'N', 'objeto_e_id' => $foundObjectId,'objeto_p_id' => $lostObjectId]);
                    }
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }

    public function registarEntrega($policiaId, $foundObjectId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
        if ($utilizador_policia_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
                $objeto_encontrado = DB::table('objetoe')->where('id', $foundObjectId)->first();
                if ($objeto_encontrado != null) {
                    $objeto_correspondente = DB::table('objetor')->where('objeto_e_id', $foundObjectId)->first();
                    if ($objeto_correspondente != null) {
                        DB::table('objetor')->where('objeto_e_id', $foundObjectId)->update(['entrege' => 'S']);
                    }
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }
}
