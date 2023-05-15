<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Paged;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type DepartmentData from Department
 * @phpstan-import-type PagedData from Paged
 */
class GetPagedDepartmentResponse
{
    /**
     * @return Paged<Department>
     */
    public static function make(Response $response): Paged
    {
        /** @var PagedData $data */
        $data = $response->json();

        return new Paged(
            page: $data['page'],
            pageSize: $data['pageSize'],
            totalRecords: $data['totalRecords'],
            data: empty($data['data']) ? [] : array_map(fn ($department): Department => new Department(...array_merge($department, [
                'cityCapital' => $department['cityCapital'] ? new City(...$department['cityCapital']) : null,
            ])), $data['data']),
        );
    }
}
