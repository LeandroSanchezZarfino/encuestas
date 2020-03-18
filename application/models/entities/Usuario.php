<?php

namespace Entities;

/**
 * Class Usuario
 * @package Entities
 * @Entity
 * @Table(name="usuario")
 */
class Usuario extends \Entities\Activable {
    /**
     * @var string
     * @Column(name="nombre", type="text")
     */
    private $nombre;
    /**
     * @var string
     * @Column(name="apellido", type="text")
     */
    private $apellido;
    /**
     * @var string
     * @Column(name="nombreDeUsuario", type="text")
     */
    private $nombreDeUsuario;
    /**
     * @var string
     * @Column(name="contrasenia", type="text")
     */
    private $contrasenia;
    /**
     * @var Rol
     * @ManyToOne(targetEntity="Rol")
     * @JoinColumn(name="rol_id", referencedColumnName="id")
     */
    private $rol;

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido(string $apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return string
     */
    public function getNombreDeUsuario(): string
    {
        return $this->nombreDeUsuario;
    }

    /**
     * @param string $nombreDeUsuario
     */
    public function setNombreDeUsuario(string $nombreDeUsuario)
    {
        $this->nombreDeUsuario = $nombreDeUsuario;
    }

    /**
     * @return string
     */
    public function getContrasenia(): string
    {
        return $this->contrasenia;
    }

    /**
     * @param string $contrasenia
     */
    public function setContrasenia(string $contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    /**
     * @return Rol
     */
    public function getRol(): Rol
    {
        return $this->rol;
    }

    /**
     * @param Rol $rol
     */
    public function setRol(Rol $rol)
    {
        $this->rol = $rol;
    }
}