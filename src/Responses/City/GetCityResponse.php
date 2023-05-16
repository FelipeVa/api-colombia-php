<?php

namespace FelipeVa\ApiColombia\Responses\City;

use FelipeVa\ApiColombia\Objects\City;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CityData from City
 */
class GetCityResponse
{
    public static function make(Response $response): City
    {
        /** @var CityData $data */
        $data = $response->json();

        return City::from($data);
    }
}
