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
        DB::table('categoria')->where('id', $categoriaId)->update(['nome'=> $data['nome'], 'descricao'=>  $data['descricao']]);
    }

    public function deleteCategoria($avaliadorId, $categoriaId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR A CATEGORIA
        DB::table('categoria')->where('id', $categoriaId)->delete();
    }

    public function updateAtributoPUT($avaliadorId, $categoriaId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->where('id', $data['atributoId'])->where('categoria_id',$categoriaId)->update(['nome'=>  $data['nome'], 'tipo_dados'=>  $data['tipo_dados']]);
    }

    public function createAtributo($avaliadorId, $categoriaId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->insert(['nome'=>  $data['nome'], 'tipo_dados'=>  $data['tipo_dados'], 'categoria_id'=>  $categoriaId]);
    }

    public function getAtributo($avaliadorId, $categoriaId, $atributoId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        $atributo = DB::table('atributo')->where('id', $atributoId)->where('categoria_id',$categoriaId)->first();
        $json = array('nome' => $atributo->nome, 'tipo_dados' => $atributo->tipo_dados, 'categoria' => DB::table('categoria')->where('id', $categoriaId)->first());
        return response()->json($json);
    }

    public function updateAtributoPOST($avaliadorId, $categoriaId, $atributoId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->where('id', $atributoId)->where('categoria_id',$categoriaId)->update(['nome'=>  $data['nome'], 'tipo_dados'=>  $data['tipo_dados']]);
    }

    public function deleteAtributo($avaliadorId, $categoriaId, $atributoId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE ALTERAR O ATRIBUTO
        DB::table('atributo')->where('id', $atributoId)->where('categoria_id',$categoriaId)->delete();
    }




    #METODOS DE AVALIADOR SOBRE LEILOES
    public function avaliarObjeto($avaliadorId, $objetoId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE AVALIAR UM OBJETO

        #ATUALIZAR O VALOR DO OBJETO QUE VAI A LEILAO
        DB::table('objetoleilao')->where('id', $objetoId)->update(['valor' => $data['valor']]);
    }

    public function criarLeilao($avaliadorId, $objetoId,Request $request){
        $data = $request->json()->all();
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE CRIAR UM LEILAO

        #OBTER O OBJETO QUE VAI SER LEILOADO
        $objetoLeiloado=DB::table('objetoleilao')->where('id', $objetoId)->first();

        #SE O OBJETO EXISTIR, CRIA-SE O LEILAO COM O VALOR BASE DO OBJETO
        if ($objetoLeiloado != null) {
            DB::table('leilao')->insert(['data_inicio' => $data['data_inicio'], 'data_fim' => $data['data_fim'], 'valor' => $objetoLeiloado->valor, 'estado' => $data['estado'], 'objeto_leilao_id' => $objetoId]);
        }else{
            #MUDAR O ERRO
            echo "Esse objeto não existe";
        }
    }

    public function iniciarLeilao($avaliadorId, $leilaoId,Request $request){
        #DEPOIS ADICIONAR AQUI A PARTE DE AUTENTICACAO DO AVALIADOR, PARA VER SE ELE CONSEGUE INICIAR UM LEILAO
        #OBTER O LEILAO
        $leilao=DB::table('leilao')->where('id', $leilaoId)->first();

        #SE O LEILAO JA TIVER TERMINADO, NAO SE PODE INICIAR
        if ($leilao != null && $leilao->estado != 'T') {
            DB::table('leilao')->where('id', $leilaoId)->update(['estado' => 'A']);
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

}
