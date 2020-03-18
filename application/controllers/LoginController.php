<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseController.php';

class LoginController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    private function usuarioModel() : UsuarioModel{
        return parent::cargar('model', "UsuarioModel");
    }

    public function ingresar(){
        if(parent::hayUsuarioLogueado()){
            redirect("principal");
        }
        else self::smarty()->display("login.tpl");
    }

    public function login($internal = false){
        $unUsuario = parent::recuperarPost('user');
        $contrasenia = parent::recuperarPost('password');
        $contrasenia = hash("sha256", $contrasenia);
        /** @var UsuarioModel $modelUsuario */
        $modelUsuario = parent::cargar('model', "UsuarioModel");
        try{
            $modelUsuario->loguear($unUsuario, $contrasenia);
            header("Content-Type: text/json; charset=utf8");
            echo json_encode(array('msj' => "login-ok"));
        }
        catch (Exception $ex){
            if(!$internal){
                header("Content-Type: text/json; charset=utf8");
                echo json_encode(array('msj' => $ex->getMessage()));
            }
            else return $ex->getMessage();
        }
    }
   

    public function logout(){
        $this->session->sess_destroy();
        redirect("",false);
    }
}

