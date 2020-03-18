<?php
namespace Entities;

/**
 * Class SintesisEncuesta
 * @package Entities
 * @Entity
 * @Table(name="sintesis_encuesta")
 */
class SintesisEncuesta extends Persistible {
    /**
     * @var \DateTime
     * @Column(name="fechaDeCreacion", type="datetime")
     */
    private $timeStamp;
    /**
     * @var Usuario
     * @ManyToOne(targetEntity="Usuario")
     * @JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    private $usuario;
    /**
     * @var Usuario
     * @ManyToOne(targetEntity="EncuestaContestada")
     * @JoinColumn(name="encuestaContestada_id", referencedColumnName="id")
     */
    private $encuestaContestada;
    /**
     * @var string
     * @Column(type="text")
     */
    private $validador;
    /**
     * @var string
     * @Column(type="text")
     */
    private $json;
    /**
     * @var string
     * @Column(type="text")
     */
    private $medioDeTransporte;
    /**
     * @var string
     * @Column(type="text")
     */
    private $lugarDeEntrada;
    /**
     * @var string
     * @Column(type="text")
     */
    private $fechaDeIngreso;
    /**
     * @var string
     * @Column(type="text")
     */
    private $numeroEntrada;
    /**
     * @var string
     * @Column(type="text")
     */
    private $asientoCabina;
    /**
     * @var string
     * @Column(type="text")
     */
    private $nombreCompleto;
    /**
     * @var string
     * @Column(type="text")
     */
    private $numeroPasaporte;
    /**
     * @var string
     * @Column(type="text")
     */
    private $sexo;
    /**
     * @var string
     * @Column(type="text")
     */
    private $ultimosPaises;
    /**
     * @var string
     * @Column(type="text")
     */
    private $destino;
    /**
     * @var string
     * @Column(type="text")
     */
    private $sintomas;
    /**
     * @var string
     * @Column(type="text")
     */
    private $direccionContacto;
    /**
     * @var string
     * @Column(type="text")
     */
    private $emailContacto;
    /**
     * @var string
     * @Column(type="text")
     */
    private $ciudad;
    /**
     * @var string
     * @Column(type="text")
     */
    private $estado;
    /**
     * @var string
     * @Column(type="text")
     */
    private $telefono;
    /**
     * @var string
     * @Column(type="text")
     */
    private $personaDeContacto;
    /**
     * @var string
     * @Column(type="text")
     */
    private $ciudadPersonaDeContacto;
    /**
     * @var string
     * @Column(type="text")
     */
    private $paisPersonaContacto;
    /**
     * @var string
     * @Column(type="text")
     */
    private $ciudadPersonaContacto;
    /**
     * @var string
     * @Column(type="text")
     */
    private $telefonoPersonaContacto;

}