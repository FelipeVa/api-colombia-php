<?php

namespace FelipeVa\ApiColombia\Responses\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Objects\TouristAttraction;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CategoryNaturalAreaData from CategoryNaturalArea
 */
class GetCategoryNaturalAreaResponse
{
    public static function make(Response $response): CategoryNaturalArea
    {
        /** @var CategoryNaturalAreaData $data */
        $data = $response->json();

        return CategoryNaturalArea::from($data);
    }
}
