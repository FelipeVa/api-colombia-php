<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Objects\TouristAttraction;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetAllTouristicAttractionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetPagedTouristicAttractionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionByNameRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionBySearchRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionRequest;
use Saloon\Contracts\Response;

class TouristAttractionResource extends Resource
{
    /**
     * @return mixed|Listed<TouristAttraction>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllTouristicAttractionRequest())->dto();
    }

    /**
     * @param int $touristicAttractionId
     * @return mixed|TouristAttraction
     */
    public function get(int $touristicAttractionId): mixed
    {
        return $this->connector->send(new GetTouristicAttractionRequest($touristicAttractionId))->dto();
    }

    /**
     * @param string $presidentName
     * @return mixed|Listed<TouristAttraction>
     */
    public function getByName(string $presidentName): mixed
    {
        return $this->connector->send(new GetTouristicAttractionByNameRequest($presidentName))->dto();
    }

    /**
     * @param string $searchValue
     * @return mixed|Listed<TouristAttraction>
     */
    public function search(string $searchValue): mixed
    {
        return $this->connector->send(new GetTouristicAttractionBySearchRequest($searchValue))->dto();
    }

    /**
     * @param int $page
     * @param int $pageSize
     * @return mixed|Paged<TouristAttraction>
     */
    public function paged(int $page, int $pageSize): mixed
    {
        return $this->connector->send(new GetPagedTouristicAttractionRequest($page, $pageSize))->dto();
    }
}
