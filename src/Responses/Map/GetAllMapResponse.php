<?php

namespace FelipeVa\ApiColombia\Responses\Map;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Map;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type MapData from Map
 * @phpstan-import-type CityData from City
 */
class GetAllMapResponse
{
    /**
     * @return array<int, Map>
     */
    public static function make(Response $response): array
    {
        /** @var MapData[] $data */
        $data = $response->json();

        if ($data === []) {
            return [];
        }

        return array_map(fn ($map): Map => Map::from($map), $data);
    }
}
