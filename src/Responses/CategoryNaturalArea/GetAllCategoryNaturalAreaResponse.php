<?php

namespace FelipeVa\ApiColombia\Responses\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CategoryNaturalAreaData from CategoryNaturalArea
 */
class GetAllCategoryNaturalAreaResponse
{
    /**
     * @return CategoryNaturalArea[]
     */
    public static function make(Response $response): array
    {
        /** @var array<int, CategoryNaturalAreaData> $data */
        $data = $response->json();

        if ($data === []) {
            return [];
        }

        return array_map(fn ($categoryNaturalArea): CategoryNaturalArea => CategoryNaturalArea::from($categoryNaturalArea), $data);
    }
}
