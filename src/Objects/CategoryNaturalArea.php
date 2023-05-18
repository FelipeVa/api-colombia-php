<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use FelipeVa\ApiColombia\Helpers\Arr;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-type NaturalAreaData array{id: int, name: string, categoryNaturalAreaId: int, areaGroupId: int|null, departmentId: int|null, daneCode: int|null, department: array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital: null, country: string|null, cities: null, regionId: int|null, region: string|null, naturalAreas: null, maps: string|null}|null, landArea: int|null, maritimeArea: int|null, categoryNaturalArea: string|null}
 * @phpstan-type CategoryNaturalAreaData array{id: int, name: string|null, description: string|null, naturalAreas: NaturalAreaData[]|null}
 *
 * @implements DataTransferObject<CategoryNaturalAreaData>
 */
class CategoryNaturalArea implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param int $id
     * @param string|null $name
     * @param string|null $description
     * @param array<int, NaturalArea>|null $naturalAreas
     */
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?string $description = null,
        public ?array $naturalAreas = null,
    ) {
    }

    public static function from(array $data): CategoryNaturalArea
    {
        $naturalAreas = $data['naturalAreas'] ? Arr::purgeNull($data['naturalAreas']) : null;

        return new self(...array_merge($data, [
            'naturalAreas' => empty($naturalAreas) ? null : array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $naturalAreas),
        ]));
    }
}
