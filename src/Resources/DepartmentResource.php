<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\Department\GetAllDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentCityRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentRequest;
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

    public function cities(int $departmentId): Response
    {
        return $this->connector->send(new GetDepartmentCityRequest($departmentId));
    }

    public function naturalAreas(int $departmentId): Response
    {
        return $this->connector->send(new GetDepartmentNaturalAreaRequest($departmentId));
    }
}
