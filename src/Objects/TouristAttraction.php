<?php

namespace FelipeVa\ApiColombia\Objects;

/**
 * @phpstan-import-type CityDataWithoutDepartment from City
 *
 * @phpstan-type TouristAttractionData array{id: int, name: string, description: string|null, images: array<int, string>|null, latitude: string|null, longitude: string|null, cityId: int|null, city: CityDataWithoutDepartment|null}
 */
class TouristAttraction
{
    /**
     * @param  array<int, string>|null  $images
     */
    public function __construct(
        public int $id,
        public string $name,
        public ?string $description = null,
        public ?array $images = null,
        public ?string $latitude = null,
        public ?string $longitude = null,
        public ?int $cityId = null,
        public ?City $city = null,
    ) {
    }
}
