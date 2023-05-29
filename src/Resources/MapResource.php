<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Map;
use FelipeVa\ApiColombia\Requests\Map\GetAllMapRequest;
use FelipeVa\ApiColombia\Requests\Map\GetMapRequest;
use Saloon\Contracts\Response;

class MapResource extends Resource
{
    /**
     * @return mixed|Listed<Map>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllMapRequest())->dto();
    }

    /**
     * @param int $mapId
     * @return mixed|Map
     */
    public function get(int $mapId): mixed
    {
        return $this->connector->send(new GetMapRequest($mapId))->dto();
    }
}
