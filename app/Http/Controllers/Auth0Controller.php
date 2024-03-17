<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;

class Auth0Controller extends Controller
{
    #Varivel da autenticacao
    private $auth0;

    #Construtor da classe que define o processo de autenticacao
    public function __construct()
    {
        $configuration = new SdkConfiguration(
            domain: 'dev-c5xznpgxsg1a5slt.eu.auth0.com',
            clientId: '92F8bftfLRDygWdNmRqvmzQClaZY8ySA',
            clientSecret: '4_hP2pLCw1dmbiS346hvRRF9AZDC9Ee9RQP2KsSMxzcgqStzcM0T9ggr2E2lxVub',
            redirectUri: 'http://' . $_SERVER['HTTP_HOST'] . '/callback',
            cookieSecret: '4f60eb5de6b5904ad4b8e31d9193e7ea4a3013b476ddb5c259ee9077c05e1457'
        );

        $this->auth0 = new Auth0($configuration);
    }

    public function login()
    {
        #Buscar as credênciais, e caso não haja nenhum token de acesso, redirecionar para a pagina de Login do Auth0
        $session = $this->auth0->getCredentials();
        if (null === $session || $session->accessTokenExpired) {
            header('Location: ' . $this->auth0->login());
            exit;
        } else {
            $user = $this->auth0->getCredentials()?->user;
            $_SESSION['user_email'] = $user['name'];
        }
    }

    #Pagina de retorno à aplicação apos registo ou login
    public function callback(Request $request)
    {
        session_start();
        if (null != $this->auth0->getExchangeParameters()) {
            $this->auth0->exchange();
        }

        #Obter as credenciais do utilizador
        $user = $this->auth0->getCredentials()?->user;
        $_SESSION['user_email'] = $user['name'];

        #Verificar se um utilizador com esse email ja existe
        $utilizador_DB = \DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if (null == $utilizador_DB) {
            #Se nao existir, verifica se no registo qual o user tipo que escolheu, ou em caso de nao haver, fica o Dono como default
            if ($_SESSION["user_tipo"] == 'Dono') {
                #Iniciar a transacao para que nao haja qualquer engano na logica das insercoes nas tabelas
                \DB::transaction(function () {
                    #Inserir na tabela utilizador, obtendo o id da linha criada
                    $id_table_user = \DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
                    #Inserir na tabela regular, obtendo o id da linha criada
                    $id_table_regular = \DB::table('regular')->insertGetId(['user_id' => $id_table_user]);
                    #Por fim, inserir na tabela dono
                    \DB::table('dono')->insert(['user_id' => $id_table_user, 'regular_id' => $id_table_regular]);
                });
                #Redirecionar o utilizador para a sua home
                header('Location: /dono');
                exit;
            } elseif ($_SESSION["user_tipo"] == 'Licitante') {
                \DB::transaction(function () {
                    $id_table_user = \DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
                    $id_table_regular = \DB::table('regular')->insertGetId(['user_id' => $id_table_user]);
                    \DB::table('licitante')->insert(['user_id' => $id_table_user, 'regular_id' => $id_table_regular]);
                });
                header('Location: /licitante');
                exit;
            } elseif ($_SESSION["user_tipo"] == 'Policia') {
                \DB::transaction(function () {
                    $id_table_user = \DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
                    \DB::table('policia')->insert(['user_id' => $id_table_user]);
                });
                header('Location: /policia');
                exit;
            } else {
                \DB::transaction(function () {
                    $id_table_user = \DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
                    $id_table_regular = \DB::table('regular')->insertGetId(['user_id' => $id_table_user]);
                    \DB::table('dono')->insert(['user_id' => $id_table_user, 'regular_id' => $id_table_regular]);
                });
                header('Location: /dono');
                exit;
            }
        } else {
            #Se o utilizador ja exisir, buscar em cada uma das tabelas possiveis para averiguar qual o seu tipo
            $utilizador_DB_dono = \DB::table('dono')->where('user_id', $utilizador_DB->id)->first();
            $utilizador_DB_licitante = \DB::table('licitante')->where('user_id', $utilizador_DB->id)->first();
            //$utilizador_DB_policia = \DB::table('Policia')->where('user_id', $utilizador_DB['id'])->first();

            #Redirecionar o utilizador consoante o seu tipo na base de dados
            if (null != $utilizador_DB_dono) {
                header('Location: /dono');
                exit;
            } elseif (null != $utilizador_DB_licitante) {
                header('Location: /licitante');
                exit;
            } else {
                header('Location: /policia');
                exit;
            }

        }
    }

    public function logout()
    {
        #Realizar o Logout e devolver o utilizador a pagina home da aplicacao
        header('Location: ' . $this->auth0->logout());
        header('Location: /');
        exit;
    }

    public function register($tipo)
    {
        session_start();
        #Registar o tipo de utilizador, para quando ele fizer o register no Auth0, volte ao callback para ser tratado os dados na base de dados Postgre
        $_SESSION["user_tipo"] = $tipo;
        $session = $this->auth0->getCredentials();
        if (null === $session || $session->accessTokenExpired) {
            header('Location: ' . $this->auth0->login(null, array("screen_hint" => "signup")));
            exit;
        }
    }

    public function register_dono()
    {
        $this->register('Dono');
    }

    public function register_licitante()
    {
        $this->register('Licitante');
    }

    public function register_policia()
    {
        $this->register('Policia');
    }
}
