<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;

/**
 * @phpstan-type CityData array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departmentId: int, department: null, touristAttractions: null, presidents: null}
 *
 * @phpstan-type PresidentData array{id: int, name: string, image: string|null, lastName: string|null, startPeriodDate: string|null, endPeriodDate: string|null, politicalParty: string|null, description: string|null, cityId: int, city: CityData|null}
 *
 * @implements DataTransferObject<PresidentData>
 */
class President implements DataTransferObject
{
    public function __construct(
        public int $id,
        public string $name,
        public int $cityId,
        public ?string $image = null,
        public ?string $lastName = null,
        public ?string $startPeriodDate = null,
        public ?string $endPeriodDate = null,
        public ?string $politicalParty = null,
        public ?string $description = null,
        public ?City $city = null,
    ) {
    }

    public static function from(array $data): President
    {
        return new self(...array_merge($data, [
            'city' => is_null($data['city']) ? null : City::from($data['city']),
        ]));
    }
}
