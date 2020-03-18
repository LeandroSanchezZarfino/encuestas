<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseController.php';

class LoginController extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function usuarioModel() : UsuarioModel{
        return parent::cargar('model', "UsuarioModel");
    }

    public function ingresar(){
        if(self::hayUsuarioLogueado()){
            redirect("principal");
        }
        else
            self::smarty()->display("login.tpl");
    }

    public function login($internal = false){
        $unUsuario = parent::recuperarPost('user');
        $contrasenia = parent::recuperarPost('password');
        $contrasenia = hash("sha256", $contrasenia);
        /** @var UsuarioModel $modelUsuario */
        $modelUsuario = parent::cargar('model', "UsuarioModel");
        try{
            $modelUsuario->loguear($unUsuario, $contrasenia);
            header('Location:'.base_url()."principal");
        }
        catch (Exception $ex){
            parent::smarty()->assign("error",$ex->getMessage());
            $this->ingresar();
        }
    }
   

    public function logout(){
        $this->session->sess_destroy();
        redirect("",false);
    }
}

