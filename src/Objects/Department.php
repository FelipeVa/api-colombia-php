<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-type DepartmentData array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital: array{id: int, name: string, description: string, surface: int, population: int, postalCode: string, department: null, departmentId: int, touristAttractions: null, presidents: null }|null, country: string|null, cities: string|null, regionId: int|null, region: string|null, naturalAreas: array{id: int, name: string, categoryNaturalAreaId: int, areaGroupId: int|null, departmentId: int|null, department: null, daneCode: int|null, landArea: int|null, maritimeArea: int|null, categoryNaturalArea: string|null}[]|null, maps: string|null}
 *
 * @implements DataTransferObject<DepartmentData>
 */
class Department implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param NaturalArea[]|null $naturalAreas
     */
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
        public ?array $naturalAreas = null,
        public ?string $maps = null,
    ) {
    }

    public static function from(array $data): Department
    {
        return new Department(...array_merge($data, [
            'cityCapital' => !is_null($data['cityCapital']) ? City::from($data['cityCapital']) : null,
            'naturalAreas' => $data['naturalAreas'] ? array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $data['naturalAreas']) : null,
        ]));
    }
}
