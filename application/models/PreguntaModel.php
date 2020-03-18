<?php


class PreguntaModel extends Model {
    /**
     * @return PreguntaModel
     */
    public static function get($controller){
        return $controller->PreguntaModel;
    }

    public function preguntaDeId($id) : \Entities\Pregunta {
        return parent::buscar(\Entities\Pregunta::class, $id);
    }
}