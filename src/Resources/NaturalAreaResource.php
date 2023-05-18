<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\NaturalArea\GetAllNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetNaturalAreaByNameRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetNaturalAreaBySearchRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\NaturalArea\GetPagedNaturalAreaRequest;
use Saloon\Contracts\Response;

class NaturalAreaResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllNaturalAreaRequest());
    }

    public function get(int $naturalAreaId): Response
    {
        return $this->connector->send(new GetNaturalAreaRequest($naturalAreaId));
    }

    public function getByName(string $naturalAreaName): Response
    {
        return $this->connector->send(new GetNaturalAreaByNameRequest($naturalAreaName));
    }

    public function search(string $searchValue): Response
    {
        return $this->connector->send(new GetNaturalAreaBySearchRequest($searchValue));
    }

    public function paged(int $page, int $pageSize): Response
    {
        return $this->connector->send(new GetPagedNaturalAreaRequest($page, $pageSize));
    }
}
