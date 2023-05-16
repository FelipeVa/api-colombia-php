<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;

/**
 * @phpstan-import-type CityData from City
 *
 * @phpstan-type TouristAttractionData array{id: int, name: string, description: string|null, images: array<int, string>|null, latitude: string|null, longitude: string|null, cityId: int|null, city: CityData|null}
 *
 * @implements DataTransferObject<TouristAttractionData>
 */
class TouristAttraction implements DataTransferObject
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

    public static function from(array $data): TouristAttraction
    {
        return new TouristAttraction(...array_merge($data, [
            'city' => !is_null($data['city']) ? City::from($data['city']) : null,
        ]));
    }
}
