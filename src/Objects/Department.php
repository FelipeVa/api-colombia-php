<?php

namespace FelipeVa\ApiColombia\Objects;

/**
 * @TODO: type here
 * @phpstan-type DepartmentData array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital: array{id: int, name: string, description: string, surface: int, population: int, postalCode: string, departamentId: int, touristAttractions: null, presidents: null }|null, country: string|null, cities: string|null, regionId: int|null, region: string|null, naturalAreas: string|null, maps: string|null }
 * @phpstan-type DepartmentDataWithOutCity array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital: null, country: string|null, cities: string|null, regionId: int|null, region: string|null, naturalAreas: string|null, maps: string|null }
 * @phpstan-type DepartmentDataNaturalArea array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital: null, country: string|null, cities: string|null, regionId: int|null, region: string|null, naturalAreas: array{id: int, name: string, categoryNaturalAreaId: int, areaGroupId: int|null, departmentId: int|null, daneCode: int|null, landArea: int|null, maritimeArea: int|null, categoryNaturalArea: string|null}|null, maps: string|null }
 */
class Department
{
    public function __construct(
        public int $id,
        public int $surface,
        public int $countryId,
        public ?int $regionId = null,
        public ?string $name = null,
        public ?string $phonePrefix = null,
        public ?int $population = null,
        public ?int $municipalities = null,
        public ?int $cityCapitalId = null,
        public ?string $description = null,
        public ?City $cityCapital = null,
        public ?string $country = null,
        public ?string $cities = null,
        public ?string $region = null,
        public ?string $naturalAreas = null,
        public ?string $maps = null,
    ) {
    }
}
