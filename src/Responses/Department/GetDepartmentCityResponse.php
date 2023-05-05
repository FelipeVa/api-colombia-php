<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CityDataWithoutDepartment from City
 */
class GetDepartmentCityResponse
{
    /**
     * @return array<int, City>
     */
    public static function make(Response $response): array
    {
        /** @var CityDataWithoutDepartment[] $data */
        $data = $response->json();

        return array_map(fn ($city) => new City(...$city), $data);
    }
}
