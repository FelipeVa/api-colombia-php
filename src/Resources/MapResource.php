<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\Map\GetAllMapRequest;
use FelipeVa\ApiColombia\Requests\Map\GetMapRequest;
use Saloon\Contracts\Response;

class MapResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllMapRequest());
    }

    public function get(int $mapId): Response
    {
        return $this->connector->send(new GetMapRequest($mapId));
    }
}
