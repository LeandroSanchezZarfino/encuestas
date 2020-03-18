<?php
namespace Entities;
/** @MappedSuperclass */
abstract class Persistible{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */private $id;
    
    public function getId() : int{
        return $this->id;
    }
}

