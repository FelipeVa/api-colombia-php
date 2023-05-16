<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;

/**
 * @phpstan-import-type DepartmentData from Department
 *
 * @phpstan-type CityData array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departmentId: int, department: DepartmentData|null, touristAttractions: null, presidents: null}
 * @phpstan-type CityDataWithoutDepartment array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departmentId: int, department: null, touristAttractions: null, presidents: null}
 *
 * @implements DataTransferObject<CityData>
 */
class City implements DataTransferObject
{
    /**
     * @param  null|array<int, TouristAttraction>|array<int, null>  $touristAttractions
     * @param  mixed[]|null  $presidents
     */
    public function __construct(
        public int $id,
        public int $departmentId,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $surface = null,
        public ?int $population = null,
        public ?string $postalCode = null,
        public ?Department $department = null,
        public ?array $touristAttractions = null,
        public ?array $presidents = null,
    ) {
    }

    public static function from(array $data): City
    {
        return new City(...array_merge($data, [
            'department' => !is_null($data['department']) ? Department::from($data['department']) : null,
        ]));
    }
}
