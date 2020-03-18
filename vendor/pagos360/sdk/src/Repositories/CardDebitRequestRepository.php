<?php


namespace Pagos360\Repositories;


use Pagos360\Filters\AdhesionFilters;
use Pagos360\ModelFactory;
use Pagos360\Models\Adhesion;
use Pagos360\Models\CardAdhesion;
use Pagos360\Models\CardDebitRequest;
use Pagos360\PaginatedResponse;
use Pagos360\Types;

class CardDebitRequestRepository extends AbstractRepository
{
    const MODEL = CardDebitRequest::class;
    const BLOCK_PREFIX = 'card_debit_request';
    const API_URI = 'card-debit-request';
    const DEFAULT_ITEMS_PER_PAGE = 25;

    const EDITABLE = false;
    const FIELDS = [
        "id" => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::INT,
            self::PROPERTY_PATH => 'id',
        ],
        "type" => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'type',
        ],
        "state" => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'state',
        ],
        "createdAt" => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::DATETIME,
            self::PROPERTY_PATH => 'created_at',
        ],
        "cardAdhesionId" => [
            self::FLAG_REQUIRED => true,
            self::TYPE => Types::INT,
            self::PROPERTY_PATH => 'card_adhesion_id',
        ],
        "month" => [
            self::FLAG_REQUIRED => true,
            self::TYPE => Types::INT,
            self::PROPERTY_PATH => 'month',
        ],
        "year" => [
            self::FLAG_REQUIRED => true,
            self::TYPE => Types::INT,
            self::PROPERTY_PATH => 'year',
        ],
        "amount" => [
            self::FLAG_REQUIRED => true,
            self::TYPE => Types::FLOAT,
            self::PROPERTY_PATH => 'amount',
        ],
        "description" => [
            self::FLAG_REQUIRED => true,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'description',
        ],

    ];

    /**
     * @param int $id
     * @return CardDebitRequest
     */
    public function get(int $id): CardDebitRequest
    {
        $url = sprintf('%s/%s', self::API_URI, $id);
        $fromApi = $this->restClient->get($url);

        return ModelFactory::build(CardDebitRequest::class, $fromApi);
    }

    /**
     * @param int $page
     * @param int $itemsPerPage
     * @return PaginatedResponse
     */
    public function getPage(
        int $page = 1,
        int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE
    ): PaginatedResponse {
        $url = sprintf('%s', self::API_URI);
        $queryString = $this->buildPagedQueryString(
            $page,
            $itemsPerPage,
            null
        );
        $paginatedResponse = $this->restClient->get($url, $queryString);

        $pagination = $this->getPaginationFromPaginatedResponse(
            $paginatedResponse
        );
        $data = $this->parseDatafromPaginatedResponse(
            self::MODEL,
            $paginatedResponse
        );

        return new PaginatedResponse($pagination, $data);
    }

    /**
     * @param CardDebitRequest $cardDebitRequest
     * @return CardDebitRequest
     */
    public function create(CardDebitRequest $cardDebitRequest): CardDebitRequest
    {
        $serialized = $this->buildBodyToSave(
            $cardDebitRequest,
            self::BLOCK_PREFIX,
            self::FIELDS
        );

        $fromApi = $this->restClient->post(self::API_URI, $serialized);

        return ModelFactory::build(CardDebitRequest::class, $fromApi);
    }
}