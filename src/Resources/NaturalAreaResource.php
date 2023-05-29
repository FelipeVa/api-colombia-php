<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetAllNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetNaturalAreaByNameRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetNaturalAreaBySearchRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetPagedNaturalAreaRequest;
use Saloon\Contracts\Response;

class NaturalAreaResource extends Resource
{
    /**
     * @return mixed|Listed<NaturalArea>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllNaturalAreaRequest())->dto();
    }

    /**
     * @param int $naturalAreaId
     * @return mixed|NaturalArea
     */
    public function get(int $naturalAreaId): mixed
    {
        return $this->connector->send(new GetNaturalAreaRequest($naturalAreaId))->dto();
    }

    /**
     * @param string $naturalAreaName
     * @return mixed|Listed<NaturalArea>
     */
    public function getByName(string $naturalAreaName): mixed
    {
        return $this->connector->send(new GetNaturalAreaByNameRequest($naturalAreaName))->dto();
    }

    /**
     * @param string $searchValue
     * @return mixed|Listed<NaturalArea>
     */
    public function search(string $searchValue): mixed
    {
        return $this->connector->send(new GetNaturalAreaBySearchRequest($searchValue))->dto();
    }

    /**
     * @param int $page
     * @param int $pageSize
     * @return mixed|Paged<NaturalArea>
     */
    public function paged(int $page, int $pageSize): mixed
    {
        return $this->connector->send(new GetPagedNaturalAreaRequest($page, $pageSize))->dto();
    }
}
