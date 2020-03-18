<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseController.php';
class Receptor extends BaseController {

    public function __construct(){
        parent::__construct();
        parent::cargar("model", "EncuestaModel");
    }

    public function guardarEncuesta(){
        $datosDeLaEncuesta = parent::recuperarPost();
        $encuesta = EncuestaModel::get($this)->buscarEncuestaPorId(1);
        $encuestaContestada = $this->generarEncuestaContestada($datosDeLaEncuesta, $encuesta);
        $sintesis = $this->generarSintesisEncuesta($datosDeLaEncuesta, $encuestaContestada);

        EncuestaModel::get($this)->agregar($encuestaContestada);
        EncuestaModel::get($this)->agregar($sintesis);
    }

    private function generarEncuestaContestada($datosDeLaEncuesta, \Entities\Encuesta $encuesta) : \Entities\EncuestaContestada {
        $encuestaContestada =  new \Entities\EncuestaContestada(
            $encuesta,
            $datosDeLaEncuesta['nombre']." ".$datosDeLaEncuesta['apellido']
        );
        $this->generarRespuestas($encuestaContestada, $datosDeLaEncuesta);
        return $encuestaContestada;
    }

    private function generarRespuestas(\Entities\EncuestaContestada $contestada, $datosDeLaEncuesta){

    }

    private function generarSintesisEncuesta($datosDeLaEncuesta, $encuestaContestada) : \Entities\SintesisEncuesta {
        return new \Entities\SintesisEncuesta();
    }
}