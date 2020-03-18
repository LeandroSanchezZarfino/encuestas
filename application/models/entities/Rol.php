<?php
namespace Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Rol
 * @package Entities
 * @Entity
 * @Table(name="rol")
 */
class Rol extends Persistible {
    /**
     * @var string
     * @Column(name="nombre", type="text")
     */
    private $nombre;
    /**
     * @var ArrayCollection|Permiso[]
     * @ManyToMany(targetEntity="Permiso", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    private $permisos;

    public function __construct()
    {
        $this->permisos = new ArrayCollection();
    }
}