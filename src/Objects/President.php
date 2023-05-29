<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-type CityData array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departmentId: int, department: null, touristAttractions: null, presidents: null}
 * @phpstan-type PresidentData array{id: int, name: string, image: string|null, lastName: string|null, startPeriodDate: string|null, endPeriodDate: string|null, politicalParty: string|null, description: string|null, cityId: int, city: CityData|null}
 *
 * @implements DataTransferObject<PresidentData>
 */
final class President implements DataTransferObject, WithResponse
{
    use HasResponse;

    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $cityId,
        public readonly ?string $image = null,
        public readonly ?string $lastName = null,
        public readonly ?string $startPeriodDate = null,
        public readonly ?string $endPeriodDate = null,
        public readonly ?string $politicalParty = null,
        public readonly ?string $description = null,
        public readonly ?City $city = null,
    ) {
    }

    public static function from(array $data): President
    {
        return new self(...array_merge($data, [
            'city' => is_null($data['city']) ? null : City::from($data['city']),
        ]));
    }
}
