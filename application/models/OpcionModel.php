<?php


class OpcionModel extends Model {
    /**
     * @return OpcionModel
     */
    public static function get($controller){
        return $controller->OpcionModel;
    }

    public function opcionDeId($id) : \Entities\Opcion {
        return parent::buscar(\Entities\Opcion::class, $id);
    }
}