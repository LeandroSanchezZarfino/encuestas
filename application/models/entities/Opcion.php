<?php
namespace Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Opcion
 * @package Entities
 * @Entity
 * @Table(name="opcion")
 */
class Opcion extends Activable {
    /**
     * @var Pregunta
     * @ManyToOne(targetEntity="Pregunta", inversedBy="opciones")
     * @JoinColumn(name="pregunta_id", referencedColumnName="id")
     */
    private $pregunta;
    /**
     * @var string
     * @Column(name="descripcion", type="text")
     */
    private $descripcion;
    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="Traduccion", mappedBy="opcion", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    private $traducciones;

    public function __construct()
    {
        $this->traducciones = new ArrayCollection();
    }

    /**
     * @return Pregunta
     */
    public function getPregunta(): Pregunta
    {
        return $this->pregunta;
    }

    /**
     * @param Pregunta $pregunta
     */
    public function setPregunta(Pregunta $pregunta)
    {
        $this->pregunta = $pregunta;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return ArrayCollection
     */
    public function getTraducciones(): ArrayCollection
    {
        return $this->traducciones;
    }
}