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

    public function __construct(EncuestaContestada $contestada) {
        $this->encuestaContestada = $contestada;
        $this->sintetizar($contestada);

    }

    private function sintetizar(EncuestaContestada $contestada){
        $respuestas = $contestada->getRespuestas();
        foreach ($respuestas as $respuesta){
            $unaPregunta = $respuesta->getPregunta();
            if($unaPregunta->tenesSintesis() && property_exists(SintesisEncuesta::class, $unaPregunta->getSintesis())){
                $sintesis = $unaPregunta->getSintesis();
                if(!is_null($this->$sintesis) && !empty($this->$sintesis)){
                    $this->$sintesis = $this->$sintesis.", ".$respuesta->respuestaSintetica();
                }
                else{
                    $this->$sintesis = $respuesta->respuestaSintetica();
                }
            }
        }
    }

    /**
     * @return \DateTime
     */
    public function getTimeStamp(): \DateTime
    {
        return $this->timeStamp;
    }

    /**
     * @param \DateTime $timeStamp
     */
    public function setTimeStamp(\DateTime $timeStamp)
    {
        $this->timeStamp = $timeStamp;
    }

    /**
     * @return Usuario
     */
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     */
    public function setUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return Usuario
     */
    public function getEncuestaContestada(): Usuario
    {
        return $this->encuestaContestada;
    }

    /**
     * @param Usuario $encuestaContestada
     */
    public function setEncuestaContestada(Usuario $encuestaContestada)
    {
        $this->encuestaContestada = $encuestaContestada;
    }

    /**
     * @return string
     */
    public function getValidador(): string
    {
        return $this->validador;
    }

    /**
     * @param string $validador
     */
    public function setValidador(string $validador)
    {
        $this->validador = $validador;
    }

    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->json;
    }

    /**
     * @param string $json
     */
    public function setJson(string $json)
    {
        $this->json = $json;
    }

    /**
     * @return string
     */
    public function getMedioDeTransporte(): string
    {
        return $this->medioDeTransporte;
    }

    /**
     * @param string $medioDeTransporte
     */
    public function setMedioDeTransporte(string $medioDeTransporte)
    {
        $this->medioDeTransporte = $medioDeTransporte;
    }

    /**
     * @return string
     */
    public function getLugarDeEntrada(): string
    {
        return $this->lugarDeEntrada;
    }

    /**
     * @param string $lugarDeEntrada
     */
    public function setLugarDeEntrada(string $lugarDeEntrada)
    {
        $this->lugarDeEntrada = $lugarDeEntrada;
    }

    /**
     * @return string
     */
    public function getFechaDeIngreso(): string
    {
        return $this->fechaDeIngreso;
    }

    /**
     * @param string $fechaDeIngreso
     */
    public function setFechaDeIngreso(string $fechaDeIngreso)
    {
        $this->fechaDeIngreso = $fechaDeIngreso;
    }

    /**
     * @return string
     */
    public function getNumeroEntrada(): string
    {
        return $this->numeroEntrada;
    }

    /**
     * @param string $numeroEntrada
     */
    public function setNumeroEntrada(string $numeroEntrada)
    {
        $this->numeroEntrada = $numeroEntrada;
    }

    /**
     * @return string
     */
    public function getAsientoCabina(): string
    {
        return $this->asientoCabina;
    }

    /**
     * @param string $asientoCabina
     */
    public function setAsientoCabina(string $asientoCabina)
    {
        $this->asientoCabina = $asientoCabina;
    }

    /**
     * @return string
     */
    public function getNombreCompleto(): string
    {
        return $this->nombreCompleto;
    }

    /**
     * @param string $nombreCompleto
     */
    public function setNombreCompleto(string $nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
    }

    /**
     * @return string
     */
    public function getNumeroPasaporte(): string
    {
        return $this->numeroPasaporte;
    }

    /**
     * @param string $numeroPasaporte
     */
    public function setNumeroPasaporte(string $numeroPasaporte)
    {
        $this->numeroPasaporte = $numeroPasaporte;
    }

    /**
     * @return string
     */
    public function getSexo(): string
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     */
    public function setSexo(string $sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return string
     */
    public function getUltimosPaises(): string
    {
        return $this->ultimosPaises;
    }

    /**
     * @param string $ultimosPaises
     */
    public function setUltimosPaises(string $ultimosPaises)
    {
        $this->ultimosPaises = $ultimosPaises;
    }

    /**
     * @return string
     */
    public function getDestino(): string
    {
        return $this->destino;
    }

    /**
     * @param string $destino
     */
    public function setDestino(string $destino)
    {
        $this->destino = $destino;
    }

    /**
     * @return string
     */
    public function getSintomas(): string
    {
        return $this->sintomas;
    }

    /**
     * @param string $sintomas
     */
    public function setSintomas(string $sintomas)
    {
        $this->sintomas = $sintomas;
    }

    /**
     * @return string
     */
    public function getDireccionContacto(): string
    {
        return $this->direccionContacto;
    }

    /**
     * @param string $direccionContacto
     */
    public function setDireccionContacto(string $direccionContacto)
    {
        $this->direccionContacto = $direccionContacto;
    }

    /**
     * @return string
     */
    public function getEmailContacto(): string
    {
        return $this->emailContacto;
    }

    /**
     * @param string $emailContacto
     */
    public function setEmailContacto(string $emailContacto)
    {
        $this->emailContacto = $emailContacto;
    }

    /**
     * @return string
     */
    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    /**
     * @param string $ciudad
     */
    public function setCiudad(string $ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return string
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     */
    public function setTelefono(string $telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return string
     */
    public function getPersonaDeContacto(): string
    {
        return $this->personaDeContacto;
    }

    /**
     * @param string $personaDeContacto
     */
    public function setPersonaDeContacto(string $personaDeContacto)
    {
        $this->personaDeContacto = $personaDeContacto;
    }

    /**
     * @return string
     */
    public function getCiudadPersonaDeContacto(): string
    {
        return $this->ciudadPersonaDeContacto;
    }

    /**
     * @param string $ciudadPersonaDeContacto
     */
    public function setCiudadPersonaDeContacto(string $ciudadPersonaDeContacto)
    {
        $this->ciudadPersonaDeContacto = $ciudadPersonaDeContacto;
    }

    /**
     * @return string
     */
    public function getPaisPersonaContacto(): string
    {
        return $this->paisPersonaContacto;
    }

    /**
     * @param string $paisPersonaContacto
     */
    public function setPaisPersonaContacto(string $paisPersonaContacto)
    {
        $this->paisPersonaContacto = $paisPersonaContacto;
    }

    /**
     * @return string
     */
    public function getCiudadPersonaContacto(): string
    {
        return $this->ciudadPersonaContacto;
    }

    /**
     * @param string $ciudadPersonaContacto
     */
    public function setCiudadPersonaContacto(string $ciudadPersonaContacto)
    {
        $this->ciudadPersonaContacto = $ciudadPersonaContacto;
    }

    /**
     * @return string
     */
    public function getTelefonoPersonaContacto(): string
    {
        return $this->telefonoPersonaContacto;
    }

    /**
     * @param string $telefonoPersonaContacto
     */
    public function setTelefonoPersonaContacto(string $telefonoPersonaContacto)
    {
        $this->telefonoPersonaContacto = $telefonoPersonaContacto;
    }

}