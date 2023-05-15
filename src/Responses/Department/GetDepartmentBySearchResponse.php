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

        if (empty($data)) {
            return [];
        }

        return array_map(fn ($department) => new Department(...array_merge($department, [
            'cityCapital' => $department['cityCapital'] ? new City(...$department['cityCapital']) : null,
        ])), $data);
    }
}
