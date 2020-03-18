<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseController.php';
class Receptor extends BaseController {

    public function __construct(){
        parent::__construct();
        parent::cargar("model", "EncuestaModel");
        parent::cargar("model", "PreguntaModel");
        parent::cargar("model", "OpcionModel");
    }

    public function guardarEncuesta(){
        $datosDeLaEncuesta = parent::recuperarPost();
        $datosDeLaEncuesta = [
            1 => 1,
            2 => "Buenos Aires",
            3 => [1,2,3],
        ];
        $encuesta = EncuestaModel::get($this)->buscarEncuestaPorId(1);
        $encuestaContestada = $this->generarEncuestaContestada($datosDeLaEncuesta, $encuesta);
        $sintesis = $this->generarSintesisEncuesta($datosDeLaEncuesta, $encuestaContestada);

        EncuestaModel::get($this)->agregar($encuestaContestada);
        EncuestaModel::get($this)->agregar($sintesis);
    }

    private function generarEncuestaContestada($datosDeLaEncuesta, \Entities\Encuesta $encuesta) : \Entities\EncuestaContestada {
        $encuestaContestada =  new \Entities\EncuestaContestada(
            $encuesta,
            $datosDeLaEncuesta[1]
        );
        $this->generarRespuestas($encuestaContestada, $datosDeLaEncuesta);
        return $encuestaContestada;
    }

    private function generarRespuestas(\Entities\EncuestaContestada $contestada, $datosDeLaEncuesta){
        foreach ($datosDeLaEncuesta as $preguntaContestada) {
            $pregunta = PreguntaModel::get($this)->preguntaDeId($preguntaContestada[0]);
            $respuesta = new \Entities\Respuesta();
            $respuesta->setPregunta($pregunta);
            $this->asociarOpcionesODescripcionARespuesta($respuesta, $preguntaContestada);
        }
    }

    private function asociarOpcionesODescripcionARespuesta(\Entities\Respuesta $respuesta, $preguntaContestada){
        if(is_array($preguntaContestada[1])){
            foreach ($preguntaContestada[1] as $unaOpcion){
                $opcion = OpcionModel::get($this)->opcionDeId($unaOpcion);
                $respuesta->setOpcion($opcion);
            }
        }
        else{
            if(is_string($preguntaContestada[1]) && !empty($preguntaContestada[1])){
                $respuesta->setDescripcionLibre($preguntaContestada[1]);
            }
            else{
                $opcion = OpcionModel::get($this)->opcionDeId($preguntaContestada[1]);
                $respuesta->setOpcion($opcion);
            }
        }
    }

    private function generarSintesisEncuesta($datosDeLaEncuesta, \Entities\EncuestaContestada $encuestaContestada) : \Entities\SintesisEncuesta {
        $sintesis = new \Entities\SintesisEncuesta($encuestaContestada);
        return $sintesis;
    }
}