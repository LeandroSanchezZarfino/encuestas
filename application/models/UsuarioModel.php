<?php
use Entities\Usuario;

class UsuarioModel extends Model{

    public static $className = "UsuarioModel";

    /**
     * @return UsuarioModel
     */
    public static function get($controller){
        return $controller->UsuarioModel;
    }

    public function __construct(){
        parent::__construct();
    }


    public function existeUsuario($unUsuario, $unaContrasenia = null) : bool{
        return (parent::existe(Usuario::class, ['nombreDeUsuario'=>$unUsuario])) ;
    }

    private function validaContrasenia($unUsuario, $unaContrasenia) : bool{
        $unResultado = $this->ejecutarSql("SELECT * FROM usuario u where u.usuario='{$unUsuario}' and u.contrasenia='{$unaContrasenia}'");
        return (count($unResultado)>0);
    }
    
    public function loguear($unUsuario, $unaContrasenia){
        if($this->existeUsuario($unUsuario, $unaContrasenia)){
            if($this->usuarioEstaActivo($unUsuario)){
                if($this->validaContrasenia($unUsuario, $unaContrasenia)){
                        $this->iniciarSesion($unUsuario, $unaContrasenia);
                }
                else{
                    throw new Exception("Password incorrecto");
                }
            }
            else{
                throw new Exception("La cuenta se encuentra bloqueada o ha caducado.");
            }
        }
        else{
            throw new Exception("Usuario inexistente");
        }
    }

    private function iniciarSesion($usuario, $contrasenia){
        $usuario = $this->usuarioSegunNombreDeUsuario($usuario);
        $this->session->set_userdata("id", $usuario->getId());
    }
    
    public function usuarioLogueado(){
        return $this->usuario($this->session->userdata('id'));
    }
    
    public function hayUsuarioLogueado() : bool{
        return ($this->session->userdata('id')!=null);
    }

    public function usuarioEstaActivo($unUsuario) : bool{
        return parent::existe(Usuario::class, ['nombreDeUsuario'=>$unUsuario,'activo'=>1]) ;
    }

    public function usuarioSegunNombreDeUsuario($usuario) : Usuario {
        return parent::buscar(Usuario::class, ['nombreDeUsuario' => $usuario]);
    }
    
    public function usuario($usuarioid) : Usuario{
        return $this->buscar(Usuario::class, $usuarioid);
    }
}