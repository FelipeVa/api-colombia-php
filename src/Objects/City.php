<?php

namespace FelipeVa\ApiColombia\Objects;

/**
 * @phpstan-type CityData array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departamentId: int, departament: DepartmentData|null, touristAttractions: null, presidents: null}
 * @phpstan-type CityDataWithoutDepartment array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departamentId: int, departament: null, touristAttractions: null, presidents: null}
 */
class City
{
    /**
     * @param  array<int, mixed>  $touristAttractions
     * @param  array<int, mixed>  $presidents
     */
    public function __construct(
        public int $id,
        public int $departamentId,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $surface = null,
        public ?int $population = null,
        public ?string $postalCode = null,
        public ?Department $departament = null,
        public ?array $touristAttractions = null,
        public ?array $presidents = null,
    ) {
    }
}
