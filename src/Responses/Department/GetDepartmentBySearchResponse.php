<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Department;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type DepartmentData from Department
 */
class GetDepartmentBySearchResponse
{
    /**
     * @return array<int, Department>
     */
    public static function make(Response $response): array
    {
        /** @var DepartmentData[] $data */
        $data = $response->json();

        if ($data === []) {
            return [];
        }

        return array_map(fn ($department): Department => Department::from($department), $data);
    }
}
