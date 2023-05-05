<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Department;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CityDataWithoutDepartment from City
 */
class GetDepartmentCityResponse
{
    /**
     * @param Response $response
     * @return array<int, City>
     */
    public static function make(Response $response): array
    {
        /** @var CityDataWithoutDepartment[] $data */
        $data = $response->json();

        return array_map(fn ($city) => new City(...$city), $data);
    }
}
