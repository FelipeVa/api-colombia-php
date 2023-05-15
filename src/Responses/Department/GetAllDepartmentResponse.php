<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Department;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type DepartmentData from Department
 */
class GetAllDepartmentResponse
{
    /**
     * @return array<int, Department>
     */
    public static function make(Response $response): array
    {
        /** @var array<int, DepartmentData> $data */
        $data = $response->json();

        return array_map(fn ($department): Department => new Department(...array_merge($department, [
            'cityCapital' => $department['cityCapital'] ? new City(...$department['cityCapital']) : null,
        ])), $data);
    }
}
