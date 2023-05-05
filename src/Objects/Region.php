<?php

namespace FelipeVa\ApiColombia\Objects;

/**
 * @phpstan-import-type DepartmentDataWithOutCity from Department
 *
 * @phpstan-type RegionData array{id: int, name: string|null, description: string|null, departments: array<int, DepartmentDataWithOutCity>|null}
 */
class Region
{
    /**
     * @param  array<int, Department>|array<int, DepartmentDataWithOutCity>|null  $departments
     */
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?string $description = null,
        public ?array $departments = null,
    ) {
    }
}
