<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type NaturalAreaData from NaturalArea
 */
final class GetDepartmentNaturalAreaResponse
{
    /**
     * @return Listed<NaturalArea>
     */
    public static function make(Response $response): Listed
    {
        /** @var array<int, array{naturalAreas: NaturalAreaData[]|null}> $json */
        $json = $response->json();
        /** @var NaturalAreaData[] $naturalAreas */
        $naturalAreas = $json[0]['naturalAreas'];

        /** @var Listed<NaturalArea> $data */
        $data = Listed::from([
            'data' => array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $naturalAreas),
        ]);

        return $data;
    }
}
