<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\Department\GetAllDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentByNameRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentBySearchRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentCityRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentTouristAttractionRequest;
use FelipeVa\ApiColombia\Requests\Department\GetPagedDepartmentRequest;
use Saloon\Contracts\Response;

class DepartmentResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllDepartmentRequest());
    }

    public function get(int $departmentId): Response
    {
        return $this->connector->send(new GetDepartmentRequest($departmentId));
    }

    public function getByName(string $departmentName): Response
    {
        return $this->connector->send(new GetDepartmentByNameRequest($departmentName));
    }

    public function search(string $searchValue): Response
    {
        return $this->connector->send(new GetDepartmentBySearchRequest($searchValue));
    }

    public function paged(int $page, int $pageSize): Response
    {
        return $this->connector->send(new GetPagedDepartmentRequest($page, $pageSize));
    }

    public function cities(int $departmentId): Response
    {
        return $this->connector->send(new GetDepartmentCityRequest($departmentId));
    }

    public function naturalAreas(int $departmentId): Response
    {
        return $this->connector->send(new GetDepartmentNaturalAreaRequest($departmentId));
    }

    public function touristAttractions(int $departmentId): Response
    {
        return $this->connector->send(new GetDepartmentTouristAttractionRequest($departmentId));
    }
}
