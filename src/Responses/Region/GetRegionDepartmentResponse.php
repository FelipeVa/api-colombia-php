<?php

namespace FelipeVa\ApiColombia\Responses\Region;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Region;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type RegionData from Region
 */
final class GetRegionDepartmentResponse
{
    /**
     * @return array<int, Department>
     */
    public static function make(Response $response): array
    {
        /** @var RegionData $data */
        $data = $response->json();

        if (is_null($data['departments'])) {
            return [];
        }

        return array_map(fn ($department): Department => Department::from($department), $data['departments']);
    }
}
