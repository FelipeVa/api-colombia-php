<?php

namespace FelipeVa\ApiColombia\Responses\Map;

use FelipeVa\ApiColombia\Objects\Map;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type MapData from Map
 */
class GetMapResponse
{
    public static function make(Response $response): Map
    {
        /** @var MapData $data */
        $data = $response->json();

        return Map::from($data);
    }
}
