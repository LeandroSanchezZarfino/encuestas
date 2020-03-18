<?php
namespace Entities;
require_once 'Persistible.php';
/** @MappedSuperclass */
abstract class Activable extends Persistible{
    /** @Column(type="boolean", name="activo") */
    private $activo;
    
    public function __construct(){
        $this->activo = ACTIVO;
    }
    
    public function activar(){
        $this->activo = ACTIVO;
    }
    
    public function desactivar(){
        $this->activo = NO_ACTIVO;
    }
    
    public function activo() : bool{
        return $this->activo;
    }
}

