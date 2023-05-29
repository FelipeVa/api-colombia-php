<?php

namespace FelipeVa\ApiColombia\Responses\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Objects\Listed;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CategoryNaturalAreaData from CategoryNaturalArea
 */
final class GetAllCategoryNaturalAreaResponse
{
    /**
     * @return Listed<CategoryNaturalArea>
     */
    public static function make(Response $response): Listed
    {
        /** @var array<int, CategoryNaturalAreaData> $json */
        $json = $response->json();

        /** @var Listed<CategoryNaturalArea> $data */
        $data = Listed::from([
            'data' => array_map(fn ($categoryNaturalArea): CategoryNaturalArea => CategoryNaturalArea::from($categoryNaturalArea), $json),
        ]);

        return $data;
    }
}
