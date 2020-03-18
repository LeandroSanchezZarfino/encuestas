<?php
namespace Entities;

/**
 * Class Permiso
 * @package Entities
 * @Entity
 * @Table(name="permiso")
 */
class Permiso extends Persistible {
    /**
     * @var string
     * @Column(name="nombre", type="text")
     */
    private $nombre;
    /**
     * @var bool
     * @Column(name="visible", type="boolean")
     */
    private $visible;

    public function __construct()
    {
        $this->visible = false;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }
}