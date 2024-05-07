<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForTesteController extends Controller
{
    public function utilizador(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $_SESSION['user_email'] = 'mbrosio0@illinois.edu';
    }

    public function regular1(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $_SESSION['user_email'] = 'measun6@telegraph.co.uk';
    }

    public function regular2(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $_SESSION['user_email'] = 'moneillb@elegantthemes.com';
    }

    public function policia(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $_SESSION['user_email'] = 'jsquelcht@apache.org';
    }

    public function policia2(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $_SESSION['user_email'] = 'amuddlen@comsenz.com';
    }

    public function avaliador(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $_SESSION['avaliador_id'] = 1;
    }
}
