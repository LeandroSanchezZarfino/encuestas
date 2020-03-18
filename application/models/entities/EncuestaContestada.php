<?php

namespace Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EncuestaContestada
 * @package Entities
 * @Entity
 * @Table(name="encuesta_contestada")
 */
class EncuestaContestada extends Persistible {
    /**
     * @var Encuesta
     * @ManyToOne(targetEntity="Encuesta")
     * @JoinColumn(name="encuesta_id", referencedColumnName="id")
     */
    private $encuesta;
    /**
     * @var string
     * @Column(name="nombreCompleto", type="text")
     */
    private $nombreCompleto;
    /**
     * @var ArrayCollection|Respuesta[]
     * @OneToMany(targetEntity="Respuesta", mappedBy="encuestaContestada", cascade={"all"}, fetch="EXTRA_LAZY")
     */
    private $respuestas;

    /**
     * EncuestaContestada constructor.
     * @param Encuesta $encuesta
     * @param string $nombreCompleto
     */
    public function __construct(Encuesta $encuesta, string $nombreCompleto)
    {
        $this->encuesta = $encuesta;
        $this->nombreCompleto = $nombreCompleto;
        $this->respuestas = new ArrayCollection();
    }

    /**
     * @return Encuesta
     */
    public function getEncuesta(): Encuesta
    {
        return $this->encuesta;
    }

    /**
     * @return string
     */
    public function getNombreCompleto(): string
    {
        return $this->nombreCompleto;
    }

    public function agregarRespuesta(Respuesta $respuesta){
        $this->respuestas->add($respuesta);
        $respuesta->setEncuestaContestada($this);
    }

}