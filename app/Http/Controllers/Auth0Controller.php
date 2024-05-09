<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

class Auth0Controller extends Controller
{
    #Varivel da autenticacao que sera usada para verificar o estado do utilizador, atribuir as credenciais, e se necessario remover as credenciais com o logout
    private $auth0;

    #Construtor da classe que define o processo de autenticacao, tudo inicia aqui
    public function __construct()
    {
        #Configuracao do Auth0, com os dados da conta (cookie secret->string de valores aleatorios; domain clientId e clientSecret->dados da conta Auth0; redirectUri->url de retorno apos login)
        $configuration = new SdkConfiguration(
            domain: 'dev-c5xznpgxsg1a5slt.eu.auth0.com',
            clientId: '92F8bftfLRDygWdNmRqvmzQClaZY8ySA',
            clientSecret: '4_hP2pLCw1dmbiS346hvRRF9AZDC9Ee9RQP2KsSMxzcgqStzcM0T9ggr2E2lxVub',
            redirectUri: 'http://' . $_SERVER['HTTP_HOST'] . '/callback',
            cookieSecret: '4f60eb5de6b5904ad4b8e31d9193e7ea4a3013b476ddb5c259ee9077c05e1457'
        );

        #Instanciar a autenticacao, na variavel global auth0
        $this->auth0 = new Auth0($configuration);
    }

    #Metodo para verificar se o utilizador esta autenticado, caso nao esteja, redirecionar para a pagina de login do Auth0
    public function login()
    {
        #Buscar as credênciais, e caso não haja nenhum token de acesso, redirecionar para a pagina de Login do Auth0
        $session = $this->auth0->getCredentials();
        if (null === $session || $session->accessTokenExpired) {
            header('Location: ' . $this->auth0->login());
            exit;
        } else {
            $user = $this->auth0->getCredentials()?->user;
            #Associar o email do utilizador à sessão
            $_SESSION['user_email'] = $user['name'];
            $this->callback();
        }
    }

    #Pagina de retorno à aplicação apos registo ou login
    public function callback()
    {
        session_start();
        #Obter os parametros de troca de credenciais
        if (null != $this->auth0->getExchangeParameters()) {
            $this->auth0->exchange();
        }
        #Obter as credenciais do utilizador
        try {
            $user = $this->auth0->getCredentials()?->user;
            $_SESSION['user_email'] = $user['name'];
        } catch (\Exception $e) {
            echo '<script type="text/javascript">';
            echo 'alert("Conta desativada");';
            echo 'window.location.href="/homeGeral";'; // Redirect after alert
            echo '</script>';
            exit;
        }
        Session::put('user_email', $user['name']);
        #Verificar se um utilizador com esse email ja existe
        $utilizador_DB = DB::table('utilizador')->where('email', $_SESSION['user_email'])->first();
        if (null == $utilizador_DB) {
            #Se nao existir, verifica se no registo qual o user tipo que escolheu, ou em caso de nao haver, fica o Regular como default
            if ($_SESSION["user_tipo"] == 'Regular') {
                #Iniciar a transacao para que nao haja qualquer engano na logica das insercoes nas tabelas
                DB::transaction(function () {
                    #Inserir na tabela utilizador, obtendo o id da linha criada
                    $id_table_user = DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
                    #Inserir na tabela regular, um utilizador com esse id
                    DB::table('regular')->insert(['user_id' => $id_table_user]);
                });
                #Redirecionar o utilizador para a sua home (Por agora esta /dono por estar na fase teste, depois sera /home)
                header('Location: /homeGeral');
                exit;
            } elseif ($_SESSION["user_tipo"] == 'Policia') {
                DB::transaction(function () {
                    $id_table_user = DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
                    DB::table('policia')->insert(['user_id' => $id_table_user]);
                });
                header('Location: /homePolicia');
                exit;
            } else {
                DB::transaction(function () {
                    $id_table_user = DB::table('utilizador')->insertGetId(['email' => $_SESSION['user_email'], 'ativo' => 'S']);
                    DB::table('regular')->insert(['user_id' => $id_table_user]);
                });
                header('Location: /homeGeral');
                exit;
            }
        } else {
            #Se o utilizador ja exisir, buscar em cada uma das tabelas possiveis para averiguar qual o seu tipo
            $utilizador_DB_regular = DB::table('regular')->where('user_id', $utilizador_DB->id)->first();
            $utilizador_DB_policia = DB::table('policia')->where('user_id', $utilizador_DB->id)->first();

            #Redirecionar o utilizador consoante o seu tipo na base de dados
            if (null != $utilizador_DB_regular) {
                header('Location: /homeGeral');
                exit;
            } elseif (null != $utilizador_DB_policia) {
                header('Location: /homePolicia');
                exit;
            }

        }
    }

    #Metodo para fazer logout do utilizador
    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        #Realizar o Logout e devolver o utilizador a pagina home da aplicacao, sem qualquer credencial
        header('Location: ' . $this->auth0->logout());
        session_destroy();
        header('Location: /');
        exit;
    }

    #DEPOIS FAZER
    public function deleteUserFromAuth0(){
                $client = new Client([
            'base_uri' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com',
        ]);

        $response = $client->post('oauth/token', [
            'json' => [
                'client_id' => '92F8bftfLRDygWdNmRqvmzQClaZY8ySA',
                'client_secret' => '4_hP2pLCw1dmbiS346hvRRF9AZDC9Ee9RQP2KsSMxzcgqStzcM0T9ggr2E2lxVub',
                'audience' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com/api/v2/',
                'grant_type' => 'client_credentials',
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        $token = $data['access_token'];



        $client = new Client([
            'base_uri' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com/api/v2/',
            'headers' => ['authorization' => 'Bearer ' . $token]
        ]);

        $email = $this->auth0->getCredentials()?->user['name'];

        // Get the user's ID
        $response = $client->get('users-by-email', [
            'query' => ['email' => $email]
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        if (count($data) > 0) {
            $userId = $data[0]['user_id'];

            // Delete the user
            $client->delete("users/$userId");
        }
        $this->logout();
    }

    public function deactivateUserFromAuth0(){
                $client = new Client([
            'base_uri' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com',
        ]);

        $response = $client->post('oauth/token', [
            'json' => [
                'client_id' => '92F8bftfLRDygWdNmRqvmzQClaZY8ySA',
                'client_secret' => '4_hP2pLCw1dmbiS346hvRRF9AZDC9Ee9RQP2KsSMxzcgqStzcM0T9ggr2E2lxVub',
                'audience' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com/api/v2/',
                'grant_type' => 'client_credentials',
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        $token = $data['access_token'];



        $client = new Client([
            'base_uri' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com/api/v2/',
            'headers' => ['authorization' => 'Bearer ' . $token]
        ]);

        $email = $this->auth0->getCredentials()?->user['name'];

        // Get the user's ID
        $response = $client->get('users-by-email', [
            'query' => ['email' => $email]
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        if (count($data) > 0) {
            $userId = $data[0]['user_id'];

            // deactivate the user
            $client->patch("users/$userId",[
                'json' => [
                    'blocked' => true
                ]
            ]);
        }
        DB::table('utilizador')->where('email', $email )->update(['ativo' => 'N']);
        $this->logout();
    }

    public function activateUserFromAuth0($email){
                $client = new Client([
            'base_uri' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com',
        ]);

        $response = $client->post('oauth/token', [
            'json' => [
                'client_id' => '92F8bftfLRDygWdNmRqvmzQClaZY8ySA',
                'client_secret' => '4_hP2pLCw1dmbiS346hvRRF9AZDC9Ee9RQP2KsSMxzcgqStzcM0T9ggr2E2lxVub',
                'audience' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com/api/v2/',
                'grant_type' => 'client_credentials',
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        $token = $data['access_token'];



        $client = new Client([
            'base_uri' => 'https://dev-c5xznpgxsg1a5slt.eu.auth0.com/api/v2/',
            'headers' => ['authorization' => 'Bearer ' . $token]
        ]);

        // Get the user's ID
        $response = $client->get('users-by-email', [
            'query' => ['email' => $email]
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        if (count($data) > 0) {
            $userId = $data[0]['user_id'];

            // Delete the user
            $client->patch("users/$userId",[
                'json' => [
                    'blocked' => false
                ]
            ]);
        }
        DB::table('utilizador')->where('email', $email )->update(['ativo' => 'S']);
    }

    #Metodo para registar um utilizador, consoante o tipo que escolheu
    public function register($tipo)
    {
        session_start();
        #Registar o tipo de utilizador, para quando ele fizer o register no Auth0, volte ao callback para ser tratado os dados na base de dados Postgre
        $_SESSION["user_tipo"] = $tipo;
        $session = $this->auth0->getCredentials();
        if (null === $session || $session->accessTokenExpired) {
            #Redirecionar o utilizador para a pagina de registo do Auth0
            header('Location: ' . $this->auth0->login(null, array("screen_hint" => "signup")));
            exit;
        }
    }

    #Consoante a pagina que o utilizador escolheu, começar o processo de registo 
    public function register_dono()
    {
        $this->register('Regular');
    }

    public function register_policia()
    {
        $this->register('Policia');
    }
}
