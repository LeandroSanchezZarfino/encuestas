<?php
namespace Entities;

/**
 * Class Respuesta
 * @package Entities
 * @Entity
 * @Table(name="respuesta")
 */
class Respuesta extends Persistible {
    /**
     * @var EncuestaContestada
     * @ManyToOne(targetEntity="EncuestaContestada")
     * @JoinColumn(name="encuestaContestada_id", referencedColumnName="id")
     */
    private $encuestaContestada;
    /**
     * @var Pregunta
     * @ManyToOne(targetEntity="Pregunta")
     * @JoinColumn(name="pregunta_id", referencedColumnName="id")
     */
    private $pregunta;
    /**
     * @var Opcion
     * @ManyToOne(targetEntity="Opcion")
     * @JoinColumn(name="opcion_id", referencedColumnName="id", nullable=true)
     */
    private $opcion;
    /**
     * @var string
     * @Column(name="descripcionLibre", type="text")
     */
    private $descripcionLibre;

    /**
     * @return EncuestaContestada
     */
    public function getEncuestaContestada(): EncuestaContestada
    {
        return $this->encuestaContestada;
    }

    /**
     * @param EncuestaContestada $encuestaContestada
     */
    public function setEncuestaContestada(EncuestaContestada $encuestaContestada)
    {
        $this->encuestaContestada = $encuestaContestada;
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
     * @return Opcion
     */
    public function getOpcion(): Opcion
    {
        return $this->opcion;
    }

    /**
     * @param Opcion $opcion
     */
    public function setOpcion(Opcion $opcion)
    {
        $this->opcion = $opcion;
    }

    /**
     * @return string
     */
    public function getDescripcionLibre(): string
    {
        return $this->descripcionLibre;
    }

    /**
     * @param string $descripcionLibre
     */
    public function setDescripcionLibre(string $descripcionLibre)
    {
        $this->descripcionLibre = $descripcionLibre;
    }
}