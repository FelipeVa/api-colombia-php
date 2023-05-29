<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-type DepartmentData  array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital: null, country: string|null, cities: null, regionId: int|null, region: string|null, naturalAreas: null, maps: null}
 * @phpstan-type CategoryNaturalAreaData array{id: int, name: string|null, description: string|null, naturalAreas: null}
 * @phpstan-type NaturalAreaData array{id: int, name: string, categoryNaturalAreaId: int, areaGroupId: int|null, departmentId: int|null, daneCode: int|null, department: DepartmentData|null, landArea: int|null, maritimeArea: int|null, categoryNaturalArea: CategoryNaturalAreaData|null}
 *
 * @implements DataTransferObject<NaturalAreaData>
 */
final class NaturalArea implements DataTransferObject, WithResponse
{
    use HasResponse;

    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $categoryNaturalAreaId,
        public readonly ?Department $department = null,
        public readonly ?int $areaGroupId = null,
        public readonly ?int $departmentId = null,
        public readonly ?int $daneCode = null,
        public readonly ?float $landArea = null,
        public readonly ?float $maritimeArea = null,
        public readonly ?CategoryNaturalArea $categoryNaturalArea = null,
    ) {
    }

    public static function from(array $data): NaturalArea
    {
        return new self(...array_merge($data, [
            'department' => is_null($data['department']) ? null : Department::from($data['department']),
            'categoryNaturalArea' => is_null($data['categoryNaturalArea']) ? null : CategoryNaturalArea::from($data['categoryNaturalArea']),
        ]));
    }
}
