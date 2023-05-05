<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\Region\GetAllRegionRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionRequest;
use Saloon\Contracts\Response;

class RegionResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllRegionRequest());
    }

    public function get(int $regionId): Response
    {
        return $this->connector->send(new GetRegionRequest($regionId));
    }

    public function departments(int $regionId): Response
    {
        return $this->connector->send(new GetRegionDepartmentRequest($regionId));
    }
}
