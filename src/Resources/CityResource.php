<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Requests\City\GetAllCityRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityByNameRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityBySearchRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityRequest;
use FelipeVa\ApiColombia\Requests\City\GetPagedCityRequest;
use Saloon\Contracts\Response;

class CityResource extends Resource
{
    /**
     * @return mixed|Listed<City>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllCityRequest())->dto();
    }

    /**
     * @param int $cityId
     * @return mixed|City
     */
    public function get(int $cityId): mixed
    {
        return $this->connector->send(new GetCityRequest($cityId))->dto();
    }

    /**
     * @param string $cityName
     * @return mixed|Listed<City>
     */
    public function getByName(string $cityName): mixed
    {
        return $this->connector->send(new GetCityByNameRequest($cityName))->dto();
    }

    /**
     * @param string $searchValue
     * @return mixed|Listed<City>
     */
    public function search(string $searchValue): mixed
    {
        return $this->connector->send(new GetCityBySearchRequest($searchValue))->dto();
    }

    /**
     * @param int $page
     * @param int $pageSize
     * @return mixed|Paged<City>
     */
    public function paged(int $page, int $pageSize): mixed
    {
        return $this->connector->send(new GetPagedCityRequest($page, $pageSize))->dto();
    }
}
