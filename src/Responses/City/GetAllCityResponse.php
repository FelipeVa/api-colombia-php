<?php

namespace FelipeVa\ApiColombia\Responses\City;

use FelipeVa\ApiColombia\Objects\City;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CityData from City
 */
class GetAllCityResponse
{
    /**
     * @return array<int, City>
     */
    public static function make(Response $response): array
    {
        /** @var CityData[] $data */
        $data = $response->json();

        if ($data === []) {
            return [];
        }

        return array_map(fn ($city): City => City::from($city), $data);
    }
}
