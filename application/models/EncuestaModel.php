<?php


class EncuestaModel extends Model {
    /**
     * @return EncuestaModel
     */
    public static function get($controller){
        return $controller->EncuestaModel;
    }

    public function buscarEncuestaPorId($id) : \Entities\Encuesta {
        return parent::buscar(\Entities\Encuesta::class, $id);
    }
}