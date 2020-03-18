<?php
namespace Entities;
/**
 * @author Ezequiel
 * @Entity
 * @Table(name="traduccion")
 */
class Traduccion extends Activable {
    /**
     * @var Pregunta
     * @ManyToOne(targetEntity="Pregunta", inversedBy="traducciones")
     * @JoinColumn(name="pregunta_id", referencedColumnName="id", nullable=true)
     */
    private $pregunta;
    /**
     * @var Opcion
     * @ManyToOne(targetEntity="Opcion", inversedBy="traducciones")
     * @JoinColumn(name="opcion_id", referencedColumnName="id", nullable=true)
     */
    private $opcion;
    /**
     * @var string
     * @Column(name="idioma", type="text")
     */
    private $idioma;
    /**
     * @var string
     * @Column(name="descripcion", type="text")
     */
    private $descripcion;

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
    public function getIdioma(): string
    {
        return $this->idioma;
    }

    /**
     * @param string $idioma
     */
    public function setIdioma(string $idioma)
    {
        $this->idioma = $idioma;
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
}

