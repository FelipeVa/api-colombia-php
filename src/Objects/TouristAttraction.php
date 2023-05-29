<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-import-type CityData from City
 *
 * @phpstan-type TouristAttractionData array{id: int, name: string, description: string|null, images: array<int, string>|null, latitude: string|null, longitude: string|null, cityId: int|null, city: CityData|null}
 *
 * @implements DataTransferObject<TouristAttractionData>
 */
final class TouristAttraction implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  array<int, string>|null  $images
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?array $images = null,
        public readonly ?string $latitude = null,
        public readonly ?string $longitude = null,
        public readonly ?int $cityId = null,
        public readonly ?City $city = null,
    ) {
    }

    public static function from(array $data): TouristAttraction
    {
        return new self(...array_merge($data, [
            'city' => is_null($data['city']) ? null : City::from($data['city']),
        ]));
    }
}
