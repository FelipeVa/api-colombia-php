<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type NaturalAreaData from NaturalArea
 * @phpstan-import-type DepartmentDataNaturalArea from Department
 */
class GetDepartmentNaturalAreaResponse
{
    /**
     * @return array<int, NaturalArea>
     */
    public static function make(Response $response): array
    {
        /** @var array<int, array{naturalAreas: NaturalAreaData[]}> $data */
        $data = $response->json();
        $data = $data[0]['naturalAreas'] ?? [];

        if (empty($data)) {
            return [];
        }

        return array_map(fn ($naturalArea) => new NaturalArea(...$naturalArea), $data);
    }
}
