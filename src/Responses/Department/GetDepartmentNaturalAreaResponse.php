<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\NaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type NaturalAreaData from NaturalArea
 */
class GetDepartmentNaturalAreaResponse
{
    /**
     * @return array<int, NaturalArea>
     */
    public static function make(Response $response): array
    {
        /** @var array<int, array{naturalAreas: NaturalAreaData[]|null}> $data */
        $data = $response->json();
        $naturalAreas = $data[0]['naturalAreas'];

        if (is_null($naturalAreas)) {
            return [];
        }

        return array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $naturalAreas);
    }
}
