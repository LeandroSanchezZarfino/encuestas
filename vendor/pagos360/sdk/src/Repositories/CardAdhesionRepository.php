<?php


namespace Pagos360\Repositories;


use MercadoPago\Card;
use Pagos360\Filters\AdhesionFilters;
use Pagos360\ModelFactory;
use Pagos360\Models\Adhesion;
use Pagos360\Models\CardAdhesion;
use Pagos360\PaginatedResponse;
use Pagos360\Types;

class CardAdhesionRepository extends AbstractRepository
{
    const MODEL = CardAdhesion::class;
    const BLOCK_PREFIX = 'card_adhesion';
    const API_URI = 'card-adhesion';
    const DEFAULT_ITEMS_PER_PAGE = 25;

    const EDITABLE = false;
    const FIELDS = [
        "id" => [
            self::FLAG_READONLY => false,
            self::TYPE => Types::INT,
            self::PROPERTY_PATH => 'id',
        ],
        "state" => [
            self::FLAG_READONLY => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'state',
        ],
        "createdAt" => [
            self::FLAG_READONLY => false,
            self::TYPE => Types::DATETIME,
            self::PROPERTY_PATH => 'created_at',
        ],
        "adhesionHolderName" => [
            self::FLAG_REQUIRED => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'adhesion_holder_name',
        ],
        "externalReference" => [
            self::FLAG_REQUIRED => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'external_reference',
        ],
        "cardNumber" => [
            self::FLAG_REQUIRED => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'card_number',
        ],
        "cardHolderName" => [
            self::FLAG_REQUIRED => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'card_holder_name',
        ],
        "card" => [
            self::FLAG_REQUIRED => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'card',
        ],
        "email" => [
            self::FLAG_REQUIRED => false,
            self::TYPE => Types::EMAIL,
            self::PROPERTY_PATH => 'email',
        ],
        "lastFourDigits" => [
            self::FLAG_READONLY => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'last_four_digits',
        ],
        "description" => [
            self::FLAG_REQUIRED => false,
            self::TYPE => Types::STRING,
            self::PROPERTY_PATH => 'description',
        ],
    ];

    /**
     * @param int $id
     * @return CardAdhesion
     */
    public function get(int $id): CardAdhesion
    {
        $url = sprintf('%s/%s', self::API_URI, $id);
        $fromApi = $this->restClient->get($url);

        return ModelFactory::build(CardAdhesion::class, $fromApi);
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
     * @param AdhesionFilters|null $filters
     * @param int                  $page
     * @param int                  $itemsPerPage
     * @return PaginatedResponse
     */
    public function getFilteredPage(
        ?AdhesionFilters $filters,
        int $page = 1,
        int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE
    ): PaginatedResponse {
        $queryString = $this->buildPagedQueryString(
            $page,
            $itemsPerPage,
            $filters
        );
        $paginatedResponse = $this->restClient->get(
            self::API_URI,
            $queryString
        );

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
     * @param CardAdhesion $adhesion
     * @return CardAdhesion
     */
    public function create(CardAdhesion $adhesion): CardAdhesion
    {
        $serialized = $this->buildBodyToSave(
            $adhesion,
            self::BLOCK_PREFIX,
            self::FIELDS
        );
        $fromApi = $this->restClient->post(self::API_URI, $serialized);

        return ModelFactory::build(CardAdhesion::class, $fromApi);
    }
}