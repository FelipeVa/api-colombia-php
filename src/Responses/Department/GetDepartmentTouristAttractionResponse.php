<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\TouristAttraction;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type TouristAttractionData from TouristAttraction
 */
class GetDepartmentTouristAttractionResponse
{
    /**
     * @return Listed<TouristAttraction>
     */
    public static function make(Response $response): Listed
    {
        /** @var TouristAttractionData[] $json */
        $json = $response->json();

        /** @var Listed<TouristAttraction> $data */
        $data = Listed::from([
            'data' => array_map(fn ($touristAttraction): TouristAttraction => TouristAttraction::from($touristAttraction), $json),
        ]);

        return $data;
    }
}
