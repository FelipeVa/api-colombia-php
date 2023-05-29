<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Listed;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type DepartmentData from Department
 */
final class GetAllDepartmentResponse
{
    /**
     * @return Listed<Department>
     */
    public static function make(Response $response): Listed
    {
        /** @var array<int, DepartmentData> $json */
        $json = $response->json();

        /** @var Listed<Department> $data */
        $data = Listed::from([
            'data' => array_map(fn ($department): Department => Department::from($department), $json),
        ]);

        return $data;
    }
}
