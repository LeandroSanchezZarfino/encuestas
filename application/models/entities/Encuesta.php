<?php
namespace Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Encuesta
 * @package Entities
 * @Entity
 * @Table(name="encuesta")
 */
class Encuesta extends Activable {
    /**
     * @var \DateTime
     * @Column(name="fechaDeCreacion", type="datetime")
     */
    private $fechaDeCreacion;
    /**
     * @var string
     * @Column(name="nombre", type="text")
     */
    private $nombre;
    /**
     * @var ArrayCollection|Pregunta[]
     * @OneToMany(targetEntity="Pregunta", mappedBy="encuesta", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    private $preguntas;


    /**
     * @return \DateTime
     */
    public function getFechaDeCreacion(): \DateTime
    {
        return $this->fechaDeCreacion;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }
}