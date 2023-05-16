<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\TouristAttraction;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type TouristAttractionData from TouristAttraction
 */
class GetDepartmentTouristAttractionResponse
{
    /**
     * @return array<int, TouristAttraction>
     */
    public static function make(Response $response): array
    {
        /** @var TouristAttractionData[] $data */
        $data = $response->json();

        if ($data === []) {
            return [];
        }

        return array_map(fn ($touristAttraction): TouristAttraction => TouristAttraction::from($touristAttraction), $data);
    }
}
