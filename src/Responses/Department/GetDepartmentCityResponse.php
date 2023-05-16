<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CityData from City
 */
class GetDepartmentCityResponse
{
    /**
     * @return array<int, City>
     */
    public static function make(Response $response): array
    {
        /** @var CityData[] $data */
        $data = $response->json();

        return array_map(fn ($city): City => City::from($city), $data);
    }
}
