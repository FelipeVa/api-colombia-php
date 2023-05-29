<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Region;
use FelipeVa\ApiColombia\Requests\Region\GetAllRegionRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionRequest;

class RegionResource extends Resource
{
    /**
     * @return mixed|Listed<Region>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllRegionRequest())->dto();
    }

    /**
     * @param int $regionId
     * @return mixed|Region
     */
    public function get(int $regionId): mixed
    {
        return $this->connector->send(new GetRegionRequest($regionId))->dto();
    }

    /**
     * @param int $regionId
     * @return mixed|Region
     */
    public function departments(int $regionId): mixed
    {
        return $this->connector->send(new GetRegionDepartmentRequest($regionId))->dto();
    }
}
