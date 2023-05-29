<?php

namespace FelipeVa\ApiColombia\Responses\Region;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Region;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type RegionData from Region
 */
final class GetRegionDepartmentResponse
{
    /**
     * @return Listed<Department>
     */
    public static function make(Response $response): Listed
    {
        /** @var RegionData $json */
        $json = $response->json();
        $departments = $json['departments'] ?? [];

        /** @var Listed<Department> $data */
        $data = Listed::from([
            'data' => array_map(fn ($department): Department => Department::from($department), $departments),
        ]);

        return $data;
    }
}
