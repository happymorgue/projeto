<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvaliadorController extends Controller
{

    #METODOS SOBRE AS CATEGORIAS E OS ATRIBUTOS
    public function updateCategoriaPUT($avaliadorId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR A CATEGORIA
        DB::table('categoria')->where('id', $data['categoriaId'])->update(['nome' => $data['nome'], 'descricao'=> $data['descricao']]);
    }

    public function createCategoria($avaliadorId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR A CATEGORIA
        DB::table('categoria')->insert(['nome' => $data['nome'], 'descricao'=>  $data['descricao']]);
    }

    public function getCategoria($avaliadorId, $categoriaId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR A CATEGORIA
        $categoria = DB::table('categoria')->where('id', $categoriaId)->get();
        return response()->json($categoria, 200);
    }

    public function updateCategoriaPOST($avaliadorId, $categoriaId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR A CATEGORIA
        if(isset($data['descricao'])){
            DB::table('categoria')->where('id', $categoriaId)->update(['nome'=> $data['nome'], 'descricao'=>  $data['descricao']]);
        }else{
            DB::table('categoria')->where('id', $categoriaId)->update(['nome'=> $data['nome']]);
        }
    }

    public function deleteCategoria($avaliadorId, $categoriaId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR A CATEGORIA
        DB::table('categoria')->where('id', $categoriaId)->delete();
    }

    public function getCategorias(){
        $categorias = DB::table('categoria')->orderBy('id','asc')->get();
        return response()->json($categorias, 200);
    }

    public function getAtributos(){
        $atributos = DB::table('atributo')->orderBy('categoria_id','asc')->orderBy('id','asc')->get();
        foreach($atributos as $atributo){
            $categoria=DB::table('categoria')->where('id',$atributo->categoria_id)->orderBy('id','asc')->pluck('nome');
            $atributo->categoria=$categoria[0];
        }
        return response()->json($atributos, 200);
    }

    public function updateAtributoPUT($avaliadorId, $categoriaId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->where('id', $data['atributoId'])->where('categoria_id',$categoriaId)->update(['nome'=>  $data['nome'], 'tipo_dados'=>  $data['tipo_dados']]);
    }

    public function createAtributo($avaliadorId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->insert(['nome'=>  $data['nome'], 'tipo_dados'=>  $data['tipo_dados'], 'categoria_id'=>  $data['categoria_id']]);
    }

    public function getAtributo($avaliadorId, $atributoId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        $atributo = DB::table('atributo')->where('id', $atributoId)->first();
        $json = array('nome' => $atributo->nome, 'tipo_dados' => $atributo->tipo_dados);
        return response()->json($json);
    }

    public function updateAtributoPOST($avaliadorId, $atributoId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->where('id', $atributoId)->update(['nome'=>  $data['nome'], 'tipo_dados'=>  $data['tipo_dados']]);
    }

    public function deleteAtributo($avaliadorId,$atributoId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->where('id', $atributoId)->delete();
    }




    #METODOS DE AVALIADOR SOBRE LEILOES
    public function avaliarObjeto($avaliadorId, $objetoId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE AVALIAR UM OBJETO

        #ATUALIZAR O VALOR DO OBJETO QUE VAI A LEILAO
        DB::table('objetoleilao')->where('id', $objetoId)->update(['valor' => $data['valor']]);
    }

    public function obterObjetosLeiloar(Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE AVALIAR UM OBJETO

        #ATUALIZAR O VALOR DO OBJETO QUE VAI A LEILAO
        $objetos=DB::table('objetoleilao')->where('valor',null)->orderBy('id','asc')->get();
        $objetos_id = DB::table('objetoleilao')->where('valor',null)->orderBy('id','asc')->pluck('objeto_e_id');

        $objetos_achados_id = DB::table('objetoe')->whereIn('id',$objetos_id)->orderBy('id','asc')->pluck('objeto_id');

        $objetos_achados = DB::table('objeto')->whereIn('id',$objetos_achados_id)->orderBy('id','asc')->get();

        foreach($objetos_achados as $objeto_achado){
            $nomeCat=DB::table('categoria')->where('id',$objeto_achado->categoria_id)->orderBy('id','asc')->pluck('nome');
            $objAchadoId=DB::table('objetoe')->where('objeto_id',$objeto_achado->id)->orderBy('id','asc')->pluck('id');
            $objeto_achado->e_id=$objAchadoId[0];
            $objeto_achado->categoria=$nomeCat[0];
        }

        foreach($objetos as $objeto){
            foreach($objetos_achados as $objeto_achado){
                if($objeto->objeto_e_id == $objeto_achado->e_id){
                    $objeto->categoria = $objeto_achado->categoria;
                    $objeto->descricao = $objeto_achado->descricao;
                    $objeto->data = $objeto_achado->data_fim;
                }
            }
        }

        $json=array('objetos'=>$objetos);
        return response()->json($json);
    }

    public function obterObjetosLeiloarAvaliados(Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE AVALIAR UM OBJETO

        #ATUALIZAR O VALOR DO OBJETO QUE VAI A LEILAO
        $objetos_em_leilao = DB::table('leilao')->orderBy('id','asc')->pluck('objeto_leilao_id');

        $objetos=DB::table('objetoleilao')->whereNotNull('valor')->whereNotIn('id', $objetos_em_leilao)->orderBy('id','asc')->get();
        $objetos_id = DB::table('objetoleilao')->whereNotNull('valor')->whereNotIn('id', $objetos_em_leilao)->orderBy('id','asc')->pluck('objeto_e_id');

        $objetos_achados_id = DB::table('objetoe')->whereIn('id',$objetos_id)->orderBy('id','asc')->pluck('objeto_id');

        $objetos_achados = DB::table('objeto')->whereIn('id',$objetos_achados_id)->orderBy('id','asc')->get();

        foreach($objetos_achados as $objeto_achado){
            $nomeCat=DB::table('categoria')->where('id',$objeto_achado->categoria_id)->orderBy('id','asc')->pluck('nome');
            $objAchadoId=DB::table('objetoe')->where('objeto_id',$objeto_achado->id)->orderBy('id','asc')->pluck('id');
            $objeto_achado->e_id=$objAchadoId[0];
            $objeto_achado->categoria=$nomeCat[0];
        }

        foreach($objetos as $objeto){
            foreach($objetos_achados as $objeto_achado){
                if($objeto->objeto_e_id == $objeto_achado->e_id){
                    $objeto->categoria = $objeto_achado->categoria;
                    $objeto->descricao = $objeto_achado->descricao;
                    $objeto->data = $objeto_achado->data_fim;
                }
            }
        }

        $json=array('objetos'=>$objetos);
        return response()->json($json);
    }

    

    public function criarLeilao($avaliadorId, $objetoId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE CRIAR UM LEILAO

        #OBTER O OBJETO QUE VAI SER LEILOADO
        $objetoLeiloado=DB::table('objetoleilao')->where('id', $objetoId)->first();

        #SE O OBJETO EXISTIR, CRIA-SE O LEILAO COM O VALOR BASE DO OBJETO
        if ($objetoLeiloado != null && DB::table('leilao')->where('objeto_leilao_id', $objetoId)->first() == null){
            DB::table('leilao')->insert(['data_inicio' => $data['data_inicio'], 'data_fim' => $data['data_fim'], 'valor' => $objetoLeiloado->valor, 'estado' => $data['estado'], 'objeto_leilao_id' => $objetoId]);
        }else{
            #MUDAR O ERRO
            echo "Esse objeto não existe ou já foi leiloado";
        }
    }


    public function verLeiloesI(){
                $leiloes = DB::table('leilao')->where('estado','I')->get();
                foreach ($leiloes as $leilao) {
                    $objetoleilao = DB::table('objetoleilao')->where('id', $leilao->objeto_leilao_id)->first();
                    $objetoE = DB::table('objetoe')->where('id', $objetoleilao->objeto_e_id)->first();
                    $objeto = DB::table('objeto')->where('id', $objetoE->objeto_id)->first();
                    $leilao->objeto = $objeto;
                    $licitacoes = DB::table('licitacao')->where('leilao_id', $leilao->id)->orderBy('id', 'desc')->get(['data_licitacao', 'valor', 'licitante_id']);
                    $leilao->licitacoes = $licitacoes;
                }

                
                $json = array('leiloes' => $leiloes);
                #ADICIONAR CASO EM QUE NAO EXISTAM LEILOES PARA NAO SER NULL A RESPOSTA
                    return response()->json($json);

    }

    public function verLeiloesA(){
                $leiloes = DB::table('leilao')->where('estado','A')->get();
                foreach ($leiloes as $leilao) {
                    $objetoleilao = DB::table('objetoleilao')->where('id', $leilao->objeto_leilao_id)->first();
                    $objetoE = DB::table('objetoe')->where('id', $objetoleilao->objeto_e_id)->first();
                    $objeto = DB::table('objeto')->where('id', $objetoE->objeto_id)->first();
                    $leilao->objeto = $objeto;
                    $licitacoes = DB::table('licitacao')->where('leilao_id', $leilao->id)->orderBy('id', 'desc')->get(['data_licitacao', 'valor', 'licitante_id']);
                    $leilao->licitacoes = $licitacoes;
                }

                
                $json = array('leiloes' => $leiloes);
                #ADICIONAR CASO EM QUE NAO EXISTAM LEILOES PARA NAO SER NULL A RESPOSTA
                    return response()->json($json);

    }


    public function iniciarLeilao($avaliadorId, $leilaoId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE INICIAR UM LEILAO
        #OBTER O LEILAO
        $leilao=DB::table('leilao')->where('id', $leilaoId)->first();

        #SE O LEILAO JA TIVER TERMINADO, NAO SE PODE INICIAR
        if ($leilao != null && $leilao->estado != 'T') {
            DB::table('leilao')->where('id', $leilaoId)->update(['estado' => 'A']);

            $utilizador_ids=DB::table('subscricao')->where('leilao_id', $leilaoId)->pluck('licitante_id')->toArray();
            foreach($utilizador_ids as $utilizador_id){
                $utilizador_dono_DB = DB::table('regular')->where('id', $utilizador_id)->first();
                $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
                $mensagem = "O leilão foi iniciado!";
                $data = Date('Y-m-d');
                DB::table('notificacao')->insert([
                    'data_criacao' => $data,
                    'utilizador_id' => $utilizador_DB->id,
                    'vista' => 'N',
                    'mensagem' => $mensagem,
                    'leilao_id' => $leilaoId,
                                
                ]);
            }
        }else{
            #MUDAR O ERRO
            echo "Esse leilão não existe ou já terminou";
        }
    }

    public function terminarLeilao($avaliadorId, $leilaoId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE TERMINAR UM LEILAO
        #OBTER O LEILAO
        $leilao=DB::table('leilao')->where('id', $leilaoId)->first();
        if ($leilao != null) {
            DB::table('leilao')->where('id', $leilaoId)->update(['estado' => 'T']);
            $maior_licitacao=DB::table('licitacao')->where('leilao_id', $leilaoId)->orderBy('valor', 'desc')->first();
            DB::table('leilao')->where('id', $leilaoId)->update(['vencedor' => $maior_licitacao->licitante_id]);

            $utilizador_ids=DB::table('subscricao')->where('leilao_id', $leilaoId)->pluck('licitante_id')->toArray();
            foreach($utilizador_ids as $utilizador_id){
                $utilizador_dono_DB = DB::table('regular')->where('id', $utilizador_id)->first();
                $utilizador_DB = DB::table('utilizador')->where('id', $utilizador_dono_DB->user_id)->first();
                $mensagem = "O leilão foi terminado!";
                $data = Date('Y-m-d');
                DB::table('notificacao')->insert([
                    'data_criacao' => $data,
                    'utilizador_id' => $utilizador_DB->id,
                    'vista' => 'N',
                    'mensagem' => $mensagem,
                    'leilao_id' => $leilaoId,
                                
                ]);
            }
        }else{
            #MUDAR O ERRO
            echo "Esse leilão não existe";
        }
    }


    #METODOS DE ADMIN

    public function desativarUtilizador($avaliadorId, $utilizadorId){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE DESATIVAR UM UTILIZADOR
        #OBTER O UTILIZADOR COM O ID
        $utilizador = DB::table("utilizador")->where("id", $utilizadorId)->first();

        #SE O UTILIZADOR EXISTIR, DESATIVA-SE
        if ($utilizador != null) {
            DB::table('utilizador')->where('id', $utilizadorId)->update(['ativo' => 'N']);
        }else{
            #MUDAR O ERRO
            echo "Esse utilizador não existe";
        }
    }

    public function ativarUtilizador($avaliadorId, $utilizadorId){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE DESATIVAR UM UTILIZADOR
        #OBTER O UTILIZADOR COM O ID
        $utilizador = DB::table("utilizador")->where("id", $utilizadorId)->first();

        #SE O UTILIZADOR EXISTIR, ATIVA-SE
        if ($utilizador != null) {
            DB::table('utilizador')->where('id', $utilizadorId)->update(['ativo' => 'S']);
        }else{
            #MUDAR O ERRO
            echo "Esse utilizador não existe";
        }
    }

    public function login($email, $password){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $email = trim($email);
        $password = trim($password);
        $avaliador = DB::table("avaliador")->where("email", $email)->first();
        if($avaliador != null){
            if($avaliador->password == $password){
                $_SESSION["avaliador_id"] = $avaliador->id;
                echo "login feito";
            }else{
                echo "password errada";
            }
        }else{
            echo "email errado";
        }
    }

    public function logout(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if(isset($_SESSION["avaliador_id"])){
            session_destroy();
        }
        
    }

    public function apagarAvaliador($avaliadorId){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if ($_SESSION["avaliador_id"] != null && $avaliadorId == $_SESSION["avaliador_id"]) {
            DB::table('avaliador')->where('id', $avaliadorId)->delete();
        }else{
            echo "Não tem permissões para apagar esse avaliador";
        }
    }

    public function obterAvaliador($avaliadorId){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if ($_SESSION["avaliador_id"] != null) {
            $avaliador = DB::table('avaliador')->where('id', $avaliadorId)->first();
            return response()->json($avaliador);
        }else{
            echo "Não tem permissões para apagar esse avaliador";
        }
    }

    public function atualizarAvaliadorPUT(Request $request){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if ($_SESSION["avaliador_id"] != null) {
            $data = $request->json()->all();
            $avaliador = DB::table('avaliador')->where('id', $data['id'])->update(['nome' => $data['nome'], 'email' => $data['email'], 'password' => $data['password'], 'telemovel' => $data['telemovel']]);
            return response()->json($avaliador);
        }else{
            echo "Não tem permissões para apagar esse avaliador";
        }
    }

    public function atualizarAvaliadorPOST($avaliadorID,Request $request){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if ($_SESSION["avaliador_id"] != null) {
            $data = $request->json()->all();
            $avaliador = DB::table('avaliador')->where('id', $avaliadorID)->update(['nome' => $data['nome'], 'email' => $data['email'], 'password' => $data['password'], 'telemovel' => $data['telemovel']]);
            return response()->json($avaliador);
        }else{
            echo "Não tem permissões para apagar esse avaliador";
        }
    }

    public function stats1(){
        $number_obj_per=DB::table('objetop')->count();
        $number_obj_enc=DB::table('objetoe')->count();
        $number_obj_rel=DB::table('objetor')->count();
        $number_obj_rel_entregues=DB::table('objetor')->where('entregue','S')->count();
        $number_leilao=DB::table('leilao')->count();
        $number_leilao_acabado=DB::table('leilao')->whereNotNull('vencedor')->count();


        return response()->json(['number_obj_per' => $number_obj_per, 'number_obj_enc' => $number_obj_enc, 'number_obj_rel' => $number_obj_rel, 'number_obj_rel_entregues' => $number_obj_rel_entregues, 'number_leilao' => $number_leilao, 'number_leilao_acabado' => $number_leilao_acabado]);
    }

    public function stats2(){
        $number_regular=DB::table('regular')->count();
        $number_policia=DB::table('policia')->count();


        return response()->json(['number_regular' => $number_regular, 'number_policia' => $number_policia]);
    }

    public function stats3(){
        $number_objeto=DB::table('objeto')->count();
        $number_objeto_c=DB::table('objetor')->count();


        return response()->json(['number_objeto' => $number_objeto, 'number_objeto_c' => $number_objeto_c]);
    }

    public function stats4(){
        $number_leiloes=DB::table('leilao')->count();
        $number_leiloes_ativos=DB::table('leilao')->where('estado','A')->count();
        $number_leiloes_passados=DB::table('leilao')->where('estado','T')->count();
        $number_leiloes_futuros=DB::table('leilao')->where('estado','I')->count();


        return response()->json(['number_leiloes' => $number_leiloes, 'number_leiloes_ativos' => $number_leiloes_ativos, 'number_leiloes_passados' => $number_leiloes_passados, 'number_leiloes_futuros' => $number_leiloes_futuros]);
    }

}
