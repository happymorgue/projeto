<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtilizadoresPoliciaController extends Controller
{
    #VER TODOS OS OBJETOS ENCONTRADOS PELO POLICIA
    public function verHistoricoObjetosEncontrados($policiaId){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $Ids_objetos_encontrados=array();
        $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
        if ($utilizador_policia_DB== null){
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
        } else {
            $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
            if ($utilizador_DB->email == $_SESSION['user_email']) {
            $objetos_encontrados = DB::table('objetoe')->where('policia_id', $policiaId)->get();
                foreach ($objetos_encontrados as $objetos_encontrado) {
                    array_push($Ids_objetos_encontrados, $objetos_encontrado->objeto_id);
                }
                $objetos_encontrados_final = DB::table('objeto')->whereIn('id', $Ids_objetos_encontrados)->orderBy('id', 'asc')->get();

                foreach ($objetos_encontrados_final as $objeto) {

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

                $json = array('objetos_encontrados' => $objetos_encontrados_final);
                return response()->json($json);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }


    #VER O HISTORICO DE TODOS OS OBJETOS QUE O POLICIA JA ENTREGOU
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
            foreach($objetos_encontrados_possiveis as $objeto_perdido){
                $objetos_encontrado = DB::table('objetor')->where('objeto_e_id', $objeto_perdido->id)->first();
                if($objetos_encontrado != null){
                    array_push($Id_objetos_encontrados, $objeto_perdido->objeto_id);
                }
            }
            $objetos_perdidos_final = DB::table('objeto')->whereIn('id', $Id_objetos_encontrados)->orderBy('id', 'asc')->get();

            foreach ($objetos_perdidos_final as $objeto) {

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

            $json = array('objetos_perdidos_encontrados' => $objetos_perdidos_final );
            return response()->json($json);
        } else {
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para aceder aos dados desse utilizador";
        } 
        }
    }



    #VER TODOS OS OBJETOS PERDIDOS PELOS DONOS, EXCETO OS QUE JA FORAM ENTREGUES 
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
                $json = array('objetos_perdidos' => $objetos_encontrados_final);
                return response()->json($json);
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }


    #REGISTAR UM OBJETO ACHADO, COM TODOS OS SEUS ATRIBUTOS
    public function registarObjetoAchado($policiaId, Request $request)
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
                $id_table_objetoE = DB::table('objetoe')->insertGetId(['objeto_id' => $id_table_objeto, 'policia_id' => $policiaId]);
                $atributos = $data['atributos'];
                foreach ($atributos as $atributo) {
                    DB::table('valoratributos')->insert(['objeto_id' => $id_table_objeto, 'atributo_id' => $atributo['atributo_id'], 'valor' => $atributo['valor']]);
                }
                if(isset($data['nutilizador'])){
                    DB::table('objetoe')->where('id', $id_table_objetoE)->update(['nutilizador_id' => $data['nutilizador']]);
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }


     #ATUALIZAR UM OBJETO ACHADO, COM TODOS OS SEUS ATRIBUTOS
    public function atualizarObjetoAchado($policiaId, $objetoId, Request $request)
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
                DB::table('objeto')->where('id', $objetoId)->update(['descricao' => $data['descricao'], 'categoria_id' => $data['categoria_id'], 'data_inicio' => $data['data_inicio'], 'data_fim' => $data['data_fim'], "pais" => $data['pais'], "distrito" => $data['distrito'], "cidade" => $data['cidade'], "freguesia" => $data['freguesia'], "rua" => $data['rua'], "localizacao" => $data['localizacao'], "imagem" => $data['imagem']]);
                $atributos = $data['atributos'];
                #APAGAR OS ATRIBUTOS PARA NAO HAVER CONFLITO NOS NOVOS ATRIBUTOS COM OS ANTERIORES, SE POR EXEMPLO, TIVESSE SIDO ALTERADA A CATEGORIA
                if(isset($data['atributos'])){
                    DB::table('valoratributos')->where('objeto_id', $objetoId)->delete();
                    foreach ($atributos as $atributo) {
                        DB::table('valoratributos')->insert(['objeto_id' => $objetoId, 'atributo_id' => $atributo['atributo_id'], 'valor' => $atributo['valor']]);
                    }
                }
                if(isset($data['nutilizador'])){
                    #TRATAMENTO DE ADICIONAR O NAO UTILIZADOR
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }

    public function removerObjetoAchado($policiaId, $objetoId, Request $request)
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
                DB::table('objeto')->where('id', $objetoId)->delete();
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
                        DB::table('possiveldono')->insert(['objeto_id' => $objeto_encontrado->objeto_id,'regular_id' => $regularId]);
                    }
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }



    #ADICIONAR AINDA PARA CASO ALGUM OBJETO JA ESTAR NA TABELA DE CORRESPONDENTES OU OBJETOS EM LEILAO, NAO REGISTAR
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
                        DB::table('objetor')->insert(['entregue' => 'N', 'objeto_e_id' => $foundObjectId,'objeto_p_id' => $lostObjectId]);
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
                        DB::table('objetor')->where('objeto_e_id', $foundObjectId)->update(['entregue' => 'S']);
                    }
                }
            } else {
                #ALTERAR PARA ERRO 403/404
                echo "Não tem permissões para aceder aos dados desse utilizador";
            }
        }
    }



    #METODOS DE CONTA DE POLICIA, E DE POSTOS DE POLICIA
    public function UpdatePoliciaPUT(Request $request)
    {
        $data=$request->json()->all();
        $policiaId=$data['id'];
        $idInterno=$data['idInterno'];
        $nome=$data['nome'];
        $postoId=$data['postoId'];
        if($policiaId != null ){
            $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
            if ($utilizador_policia_DB != null) {
                DB::table('policia')->where('id', $policiaId)->update(['idinterno' => $idInterno, 'nome' => $nome, 'posto_id' => $postoId]);
                return response()->json($data, 200);
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não existe esse utilizador";
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador com esse Id";
        }
        
    }

    public function getPolicia(Request $request, $policiaId)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if($policiaId != null ){
            $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
            if ($utilizador_policia_DB != null ) {
                $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
                if ($utilizador_DB != null) {
                    if ($utilizador_DB->email == $_SESSION['user_email']) {
                        #ADICIONAR PARA COLOCAR OS POSTOS E NAO SO O ID
                        return response()->json(array('id' => $utilizador_policia_DB->id, 'email' => $utilizador_DB->email, 'idInterno' => $utilizador_policia_DB->idinterno, 'nome' => $utilizador_policia_DB->nome, 'posto_id' => DB::table('posto')->where('id', $utilizador_policia_DB->posto_id)->first()));
                    } else {
                        #ALTERAR PARA ERRO 403/404
                        echo "Não tem permissões para aceder aos dados desse utilizador";
                    }
                }
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não existe esse utilizador";
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador com esse Id";
        }
        
    }

    public function UpdatePoliciaPOST($policiaId,Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $data=$request->json()->all();
        $idInterno=$data['idInterno'];
        $nome=$data['nome'];
        $postoId=$data['postoId'];
        if($policiaId != null ){
            $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
            if ($utilizador_policia_DB != null) {
                $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
                if ($utilizador_DB->email == $_SESSION['user_email']) {
                    DB::table('policia')->where('id', $policiaId)->update(['idinterno' => $idInterno, 'nome' => $nome, 'posto_id' => $postoId]);
                    return response()->json($data, 200);
                } else {
                    #ALTERAR PARA ERRO 403/404
                    echo "Não tem permissões para atualizar esse utilizador";
                }
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não existe esse utilizador";
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador com esse Id";
        }
        
    }

    public function DeletePolicia($policiaId,Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if($policiaId != null ){
            $utilizador_policia_DB = DB::table('policia')->where('id', $policiaId)->first();
            if ($utilizador_policia_DB != null) {
                $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_policia_DB->user_id)->first();
                if ($utilizador_DB->email == $_SESSION['user_email']) {
                    DB::table('policia')->where('id', $policiaId)->delete();
                } else {
                    #ALTERAR PARA ERRO 403/404
                    echo "Não tem permissões para apagar esse utilizador";
                }
            }else{
                #ALTERAR PARA ERRO 403/404
                echo "Não existe esse utilizador";
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador com esse Id";
        }
        
    }

    public function UpdatePostoPoliciaPUT(Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $data=$request->json()->all();
        $postoId=$data['postoId'];
        $morada=$data['morada'];
        $telefone=$data['telefone'];
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if ($utilizador_DB != null) {
            $utilizador_talvez_policia_DB = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();
            if ($utilizador_talvez_policia_DB != null) {
                DB::table('posto')->where('id', $postoId)->update(['morada' => $morada, 'telefone' => $telefone]);
                return response()->json($data, 200);
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
            
        }
        
    }

    public function CreatePostoPoliciaPOST(Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $data=$request->json()->all();
        $morada=$data['morada'];
        $telefone=$data['telefone'];
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if ($utilizador_DB != null) {
            $utilizador_talvez_policia_DB = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();
            if ($utilizador_talvez_policia_DB != null) {
                DB::table('posto')->insert(['morada' => $morada, 'telefone' => $telefone]);
                return response()->json($data, 200);
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
            
        }
        
    }

    public function getPoliciaPosto($policiaId,$postoId,Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if ($utilizador_DB != null) {
            $utilizador_talvez_policia_DB = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();
            if ($utilizador_talvez_policia_DB != null && $utilizador_talvez_policia_DB->id == $policiaId) {
                $postoPolicia = DB::table('posto')->where('id', $postoId)->first();
                return response()->json($postoPolicia, 200);
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
            
        }
        
    }

    public function getAllPoliciaPosto($policiaId,Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if ($utilizador_DB != null) {
            $utilizador_talvez_policia_DB = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();
            if ($utilizador_talvez_policia_DB != null && $utilizador_talvez_policia_DB->id == $policiaId) {
                $postoPolicia = DB::table('posto')->get();
                return response()->json($postoPolicia, 200);
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
            
        }
        
    }

    public function UpdatePostoPoliciaPOST($policiaId,$postoId,Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $data=$request->json()->all();
        $morada=$data['morada'];
        $telefone=$data['telefone'];
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if ($utilizador_DB != null) {
            $utilizador_talvez_policia_DB = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();
            if ($utilizador_talvez_policia_DB != null) {
                DB::table('posto')->where('id', $postoId)->update(['morada' => $morada, 'telefone' => $telefone]);
                return response()->json($data, 200);
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
            
        }
        
    }

    public function DeletePostoPolicia($policiaId,$postoId,Request $request)
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if ($utilizador_DB != null) {
            $utilizador_talvez_policia_DB = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();
            if ($utilizador_talvez_policia_DB != null) {
                DB::table('posto')->where('id', $postoId)->delete();
            }
        }else{
            #ALTERAR PARA ERRO 403/404
            echo "Não existe esse utilizador";
            
        }
        
    }
}
