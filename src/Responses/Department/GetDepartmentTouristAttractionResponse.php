<?php

namespace FelipeVa\ApiColombia\Responses\Department;

use FelipeVa\ApiColombia\Objects\City;
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

        if (empty($data)) {
            return [];
        }

        return array_map(fn ($touristAttraction) => new TouristAttraction(...array_merge($touristAttraction, [
            'city' => $touristAttraction['city'] ? new City(...$touristAttraction['city']) : null,
        ])), $data);
    }
}
