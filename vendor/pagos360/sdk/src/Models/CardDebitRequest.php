<?php


namespace Pagos360\Models;


class CardDebitRequest extends AbstractModel
{
    /**
     * ID de Solicitud de Débito.
     *
     * @var int
     */
    protected $id;

    /**
     * Tipo de Solicitud.
     *
     * @var string
     */
    protected $type;

    /**
     * Estado de la Solicitud de Débito.
     * Los posibles valores son: "pending", "paid", "expired", "reverted",
     * "canceled", "rejected".
     * Documentación pública: http://bit.ly/30U4qwk
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
     * ID de la Adhesión asociada a la Solicitud de Débito en Tarjeta
     *
     * @var int
     */
    protected $cardAdhesionId;

    /**
     * Mes en el que se ejecuta el Debito Automático. Formato: mm
     *
     * @var int
     */
    protected $month;

    /**
     * Año en el que se ejecuta el Debito Automático. Formato: aaaa
     *
     * @var int
     */
    protected $year;

    /**
     * Importe a ser Debitado Automáticamente. Formato: 00000000.00 (hasta 8 enteros y 2 decimales, utilizando punto “.” como separador decimal)
     * @var float
     */
    protected $amount;

    /**
     * Descripción o concepto de la Solicitud de Débito (hasta 255 caracteres).
     *
     * @var string
     */
    protected $description;

    /**
     * @var CardAdhesion
     */
    protected $cardAdhesion;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type) : self
    {
        $this->type = $type;
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
     * @param \DateTimeInterface $createdAt
     */
    public function setCreatedAt(\DateTimeInterface $createdAt) : self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getCardAdhesionId(): int
    {
        return $this->cardAdhesionId;
    }

    /**
     * @param int $cardAdhesionId
     */
    public function setCardAdhesionId(int $cardAdhesionId) : self
    {
        $this->cardAdhesionId = $cardAdhesionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     */
    public function setMonth(int $month) : self
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year) : self
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount) : self
    {
        $this->amount = $amount;
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
     */
    public function setDescription(string $description) : self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return CardAdhesion
     */
    public function getCardAdhesion(): CardAdhesion
    {
        return $this->cardAdhesion;
    }

    /**
     * @param CardAdhesion $cardAdhesion
     */
    public function setCardAdhesion(CardAdhesion $cardAdhesion) : self
    {
        $this->cardAdhesion = $cardAdhesion;
        return $this;
    }
}