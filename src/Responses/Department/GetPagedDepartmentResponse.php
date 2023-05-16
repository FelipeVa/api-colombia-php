<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Paged;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type PagedData from Paged
 */
class GetPagedDepartmentResponse
{
    /**
     * TODO: fix workaround for phpstan
     *
     * @return Paged<Department>
     */
    public static function make(Response $response): Paged
    {
        /** @var PagedData $data */
        $data = $response->json();

        /** @var Paged<Department> $paginated */
        $paginated = Paged::from(array_merge($data, [
            'data' => is_null($data['data'])
                ? []
                : array_map(fn ($department): Department => Department::from($department), $data['data']),
        ]));

        return $paginated;
    }
}
