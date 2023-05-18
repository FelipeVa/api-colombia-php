<?php

namespace FelipeVa\ApiColombia\Responses\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CategoryNaturalAreaData from CategoryNaturalArea
 */
class GetAllCategoryNaturalAreaResponse
{
    public static function make(Response $response): CategoryNaturalArea
    {
        /** @var array<int, CategoryNaturalAreaData> $data */
        $data = $response->json();

        return CategoryNaturalArea::from($data);
    }
}
