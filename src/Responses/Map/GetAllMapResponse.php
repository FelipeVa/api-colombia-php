<?php

namespace FelipeVa\ApiColombia\Responses\Map;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Map;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type MapData from Map
 * @phpstan-import-type CityData from City
 */
final class GetAllMapResponse
{
    /**
     * @return Listed<Map>
     */
    public static function make(Response $response): Listed
    {
        /** @var MapData[] $json */
        $json = $response->json();

        /** @var Listed<Map> $data */
        $data = Listed::from([
            'data' => array_map(fn ($map): Map => Map::from($map), $json),
        ]);

        return $data;
    }
}
