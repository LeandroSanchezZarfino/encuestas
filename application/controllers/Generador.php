<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseController.php';
class Generador extends BaseController {

    public function __construct(){
        parent::__construct();
        parent::cargar("model", "EncuestaModel");
    }

    public function mostrarEncuesta(){
        $encuesta = EncuestaModel::get($this)->buscarEncuestaPorId(1);
        
    }
}