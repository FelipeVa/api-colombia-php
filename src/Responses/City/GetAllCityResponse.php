<?php

namespace FelipeVa\ApiColombia\Responses\City;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Listed;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CityData from City
 */
class GetAllCityResponse
{
    /**
     * @return Listed<City>
     */
    public static function make(Response $response): Listed
    {
        /** @var CityData[] $json */
        $json = $response->json();

        /** @var Listed<City> $data */
        $data = Listed::from([
            'data' => array_map(fn ($city): City => City::from($city), $json),
        ]);

        return $data;
    }
}
