<?php

namespace FelipeVa\ApiColombia\Responses\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CategoryNaturalAreaData from CategoryNaturalArea
 */
final class GetCategoryNaturalAreaNaturalAreaResponse
{
    /**
     * @return Listed<NaturalArea>
     */
    public static function make(Response $response): Listed
    {
        /** @var CategoryNaturalAreaData $json */
        $json = $response->json();
        $naturalAreas = $json['naturalAreas'] ?? [];

        /** @var Listed<NaturalArea> $data */
        $data = Listed::from([
            'data' => array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $naturalAreas),
        ]);

        return $data;
    }
}
