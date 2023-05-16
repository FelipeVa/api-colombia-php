<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 *
 * @phpstan-type NaturalAreaData array{id: int, name: string, categoryNaturalAreaId: int, areaGroupId: int|null, departmentId: int|null, daneCode: int|null, department: array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital: null, country: string|null, cities: string|null, regionId: int|null, region: string|null, naturalAreas: null, maps: string|null}|null, landArea: int|null, maritimeArea: int|null, categoryNaturalArea: string|null}
 *
 * @implements DataTransferObject<NaturalAreaData>
 */
class NaturalArea implements DataTransferObject, WithResponse
{
    use HasResponse;

    public function __construct(
        public int $id,
        public string $name,
        public int $categoryNaturalAreaId,
        public ?Department $department = null,
        public ?int $areaGroupId = null,
        public ?int $departmentId = null,
        public ?int $daneCode = null,
        public ?float $landArea = null,
        public ?int $maritimeArea = null,
        public ?string $categoryNaturalArea = null,
    ) {
    }

    public static function from(array $data): NaturalArea
    {
        return new NaturalArea(...array_merge($data, [
            'department' => !is_null($data['department']) ? Department::from($data['department']) : null,
        ]));
    }
}
