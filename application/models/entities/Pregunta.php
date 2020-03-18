<?php
namespace Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Pregunta
 * @package Entities
 * @Entity
 * @Table(name="pregunta")
 */
class Pregunta extends Activable {
    /**
     * @var string
     * @Column(name="tipoPregunta", type="text")
     */
    private $tipoPregunta;
    /**
     * @var string
     * @Column(name="descripcion", type="text")
     */
    private $descripcion;
    /**
     * @var string
     * @Column(name="sintesis", type="text")
     */
    private $sintesis;
    /**
     * @var ArrayCollection|Traduccion[]
     * @OneToMany(targetEntity="Traduccion", mappedBy="pregunta", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    private $traducciones;
    /**
     * @var ArrayCollection|Opcion[]
     * @OneToMany(targetEntity="Opcion", mappedBy="pregunta", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    private $opciones;
    /**
     * @var Encuesta
     * @ManyToOne(targetEntity="Encuesta", inversedBy="preguntas")
     * @JoinColumn(name="encuesta_id", referencedColumnName="id")
     */
    private $encuesta;

    public function __construct()
    {
        $this->traducciones = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getTipoPregunta(): string
    {
        return $this->tipoPregunta;
    }

    /**
     * @param string $tipoPregunta
     */
    public function setTipoPregunta(string $tipoPregunta)
    {
        $this->tipoPregunta = $tipoPregunta;
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
     * @return ArrayCollection|Traduccion[]
     */
    public function getTraducciones()
    {
        return $this->traducciones;
    }

    /**
     * @return ArrayCollection|Opcion[]
     */
    public function getOpciones()
    {
        return $this->opciones;
    }

}