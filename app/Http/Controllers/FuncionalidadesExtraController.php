<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionalidadesExtraController extends Controller
{
    public function convertUserEmailRegularId()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        #BUSCAR O UTILIZADOR COM O EMAIL NA SESSION, E CONVERTER PARA O ID DO UTILIZADOR REGULAR
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        $utilizador_reg_DB = DB::table('regular')->where('user_id', $utilizador_DB->id)->first();
        if ($utilizador_reg_DB != null) {
            return $utilizador_reg_DB->id;
        } else {
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para apagar esse utilizador";
        }
    }

    public function convertUserEmailPoliciaId()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        #BUSCAR O UTILIZADOR COM O EMAIL NA SESSION, E CONVERTER PARA O ID DO UTILIZADOR POLICIA
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        $utilizador_reg_DB = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();
        if ($utilizador_reg_DB != null) {
            return $utilizador_reg_DB->id;
        } else {
            #ALTERAR PARA ERRO 403/404
            echo "Não tem permissões para apagar esse utilizador";
        }
    }

    public function obterPostosPolicia()
    {
        #OBTER TODOS OS POSTOS DE POLICIA NA BASE DE DADOS
        $postos = DB::table('posto')->get();
        return response()->json($postos);
    }

    public function obterCategorias()
    {
        #OBTER TODAS AS CATEGORIAS NA BASE DE DADOS
        $categorias = DB::table('categoria')->get();
        return response()->json($categorias);
    }
    

    public function obterAtributos($categoriaId)
    {
        #OBTER TODAS OS ATRIBUTOS NA BASE DE DADOS
        $atributos = DB::table('atributo')->where('categoria_id', $categoriaId)->get();
        return response()->json($atributos);
    }

    public function uploadImage()
{
    // Check if the file was uploaded without error
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Get the file details
        $file_tmp_name = $_FILES['imagem']['tmp_name'];
        $file_type = $_FILES['imagem']['type'];

        // Generate a unique name for the file
        $file_name = time() . '_' . rand(1000, 9999);

        // Append the original extension to the new file name
        $file_extension = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $file_name .= '.' . $file_extension;

        // Define the directory where you want to save the image
        $upload_dir = 'public/imagens_objetos/';

        // Use the Storage facade to move the uploaded file to the specified directory
        if(Storage::putFileAs($upload_dir, new \Illuminate\Http\File($file_tmp_name), $file_name)) {
            return $file_name;
        } else {
            echo 'Error uploading image';
        }
    } else {
        echo 'No image uploaded or error in upload';
    }
}
}
