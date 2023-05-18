<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\TouristAttraction\GetAllTouristicAttractionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetPagedTouristicAttractionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionByNameRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionBySearchRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionRequest;
use Saloon\Contracts\Response;

class TouristAttractionResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllTouristicAttractionRequest());
    }

    public function get(int $touristicAttractionId): Response
    {
        return $this->connector->send(new GetTouristicAttractionRequest($touristicAttractionId));
    }

    public function getByName(string $presidentName): Response
    {
        return $this->connector->send(new GetTouristicAttractionByNameRequest($presidentName));
    }

    public function search(string $searchValue): Response
    {
        return $this->connector->send(new GetTouristicAttractionBySearchRequest($searchValue));
    }

    public function paged(int $page, int $pageSize): Response
    {
        return $this->connector->send(new GetPagedTouristicAttractionRequest($page, $pageSize));
    }
}
