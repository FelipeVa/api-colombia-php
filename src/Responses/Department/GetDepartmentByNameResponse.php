<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Department;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type DepartmentData from Department
 */
class GetDepartmentByNameResponse
{
    public static function make(Response $response): Department
    {
        /** @var DepartmentData $data */
        $data = $response->json()[0];

        return new Department(...array_merge($data, [
            'cityCapital' => $data['cityCapital'] ? new City(...$data['cityCapital']) : null,
        ]));
    }
}
