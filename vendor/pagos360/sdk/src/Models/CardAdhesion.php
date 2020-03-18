<?php


namespace Pagos360\Models;


class CardAdhesion extends AbstractModel
{
    /**
     * ID de Adhesión.
     *
     * @var int
     */
    protected $id;

    /**
     * Estado de la Adhesión.
     * Los posibles valores son: "pending_to_sign", "signed", "canceled".
     * http://bit.ly/2X8rqVP
     *
     * @var string
     */
    protected $state;

    /**
     * Fecha y hora de creación.
     *
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Nombre del titular del servicio que se debitará.
     *
     * @var string
     */
    protected $adhesionHolderName;
    /**
     * Este atributo se puede utilizar como referencia para identificar la
     * Solicitud de Pago y sincronizar con tus sistemas de backend el origen de
     * la operación. Algunos valores comunmente utilizados son: ID de Cliente,
     * DNI, CUIT, ID de venta o Nro. de Factura entre otros.
     *
     * @var string|null
     */
    protected $externalReference;
    /**
     * Email del del titular de la tarjeta de crédito
     *
     * @var string
     */
    protected $email;
    /**
     * Descripción o concepto de la Adhesión.
     *
     * @var string
     */
    protected $description;
    /**
     * Número de la tarjeta en la que se ejecutarán los débitos.
     *
     * @var string
     */
    protected $cardNumber;
    /**
     * Nombre del titular de la tarjeta.
     *
     * @var string
     */
    protected $cardHolderName;
    /**
     * Ultimos 4 numeros de la Tarjeta
     *
     * @var string
     */
    protected $lastFourDigits;
    /**
     * Marca de la Tarjeta
     *
     * @var string
     */
    protected $card;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return self
     */
    public function setState(string $state) : self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getAdhesionHolderName(): string
    {
        return $this->adhesionHolderName;
    }

    /**
     * @param string $adhesionHolderName
     * @return self
     */
    public function setAdhesionHolderName(string $adhesionHolderName) : self
    {
        $this->adhesionHolderName = $adhesionHolderName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalReference(): ?string
    {
        return $this->externalReference;
    }

    /**
     * @param string|null $externalReference
     * @return self
     */
    public function setExternalReference(?string $externalReference) : self
    {
        $this->externalReference = $externalReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email) : self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description) : self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     * @return self
     */
    public function setCardNumber(string $cardNumber) : self
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardHolderName(): string
    {
        return $this->cardHolderName;
    }

    /**
     * @param string $cardHolderName
     * @return self
     */
    public function setCardHolderName(string $cardHolderName) : self
    {
        $this->cardHolderName = $cardHolderName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastFourDigits(): string
    {
        return $this->lastFourDigits;
    }

    /**
     * @param string $lastFourDigits
     * @return self
     */
    public function setLastFourDigits(string $lastFourDigits) : self
    {
        $this->lastFourDigits = $lastFourDigits;
        return $this;
    }

    /**
     * @return string
     */
    public function getCard(): string
    {
        return $this->card;
    }

    /**
     * @param string $card
     * @return self
     */
    public function setCard(string $card) : self
    {
        $this->card = $card;
        return $this;
    }
}