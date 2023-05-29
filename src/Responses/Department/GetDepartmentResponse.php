<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\Department;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type DepartmentData from Department
 */
final class GetDepartmentResponse
{
    public static function make(Response $response): Department
    {
        /** @var DepartmentData $data */
        $data = $response->json();

        return Department::from($data);
    }
}
