<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use FelipeVa\ApiColombia\Helpers\Arr;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * TODO: typo in MapData departament
 * @phpstan-type MapData array{id: int, name: string|null, description: string|null, departamentId: int|null, urlImages: string[]|null, urlSource: string|null, departament: null}
 * @phpstan-type CityData array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departmentId: int, department: null, touristAttractions: null, presidents: null}
 * @phpstan-type CategoryNaturalAreaData array{id: int, name: string|null, description: string|null, naturalAreas: null}
 * @phpstan-type NaturalAreaData array{id: int, name: string, categoryNaturalAreaId: int, areaGroupId: int|null, departmentId: int|null, department: null, daneCode: int|null, landArea: int|null, maritimeArea: int|null, categoryNaturalArea: CategoryNaturalAreaData|null}
 * @phpstan-type DepartmentData array{id: int, name: string|null, description: string|null, cityCapitalId: int|null, municipalities: int|null, surface: int, population: int|null, phonePrefix: string|null, countryId: int, cityCapital:CityData|null, country: string|null, cities: CityData[]|null, regionId: int|null, region: string|null, naturalAreas: NaturalAreaData[]|null, maps: MapData[]|null}
 *
 * @implements DataTransferObject<DepartmentData>
 */
class Department implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  NaturalArea[]|null  $naturalAreas
     * @param  City[]|null  $cities
     * @param  Map[]|null  $maps
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
        public ?array $cities = null,
        public ?string $region = null,
        public ?array $naturalAreas = null,
        public ?array $maps = null,
    ) {
    }

    public static function from(array $data): Department
    {
        $cities = $data['cities'] ? Arr::purgeNull($data['cities']) : null;
        $naturalAreas = $data['naturalAreas'] ? Arr::purgeNull($data['naturalAreas']) : null;
        $maps = $data['maps'] ? Arr::purgeNull($data['maps']) : null;

        return new self(...array_merge($data, [
            'cityCapital' => is_null($data['cityCapital']) ? null : City::from($data['cityCapital']),
            'naturalAreas' => empty($naturalAreas) ? null : array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $naturalAreas),
            'cities' => empty($cities) ? null : array_map(fn ($city): City => City::from($city), $cities),
            'maps' => empty($maps) ? null : array_map(fn ($map): Map => Map::from($map), $maps),
        ]));
    }
}
