<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\City\GetAllCityRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityByNameRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityBySearchRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityRequest;
use FelipeVa\ApiColombia\Requests\City\GetPagedCityRequest;
use FelipeVa\ApiColombia\Requests\Department\GetPagedDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionDepartmentRequest;
use Saloon\Contracts\Response;

class CityResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllCityRequest());
    }

    public function get(int $cityId): Response
    {
        return $this->connector->send(new GetCityRequest($cityId));
    }

    public function getByName(string $cityName): Response
    {
        return $this->connector->send(new GetCityByNameRequest($cityName));
    }

    public function search(string $searchValue): Response
    {
       return $this->connector->send(new GetCityBySearchRequest($searchValue));
    }

    public function paged(int $page, int $pageSize): Response
    {
        return $this->connector->send(new GetPagedCityRequest($page, $pageSize));
    }
}
