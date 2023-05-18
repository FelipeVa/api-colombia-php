<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use FelipeVa\ApiColombia\Helpers\Arr;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-import-type DepartmentData from Department
 *
 * @phpstan-type PresidentData array{id: int, name: string, image: string|null, lastName: string|null, startPeriodDate: string|null, endPeriodDate: string|null, politicalParty: string|null, description: string|null, cityId: int, city: null}
 * @phpstan-type CityData array{id: int, name: string|null, description: string|null, surface: int|null, population: int|null, postalCode: string|null, departmentId: int, department: DepartmentData|null, touristAttractions: null, presidents: PresidentData[]|null}
 *
 * @implements DataTransferObject<CityData>
 */
class City implements DataTransferObject, WithResponse
{
    use HasResponse;

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
        $presidents = $data['presidents'] ? Arr::purgeNull($data['presidents']) : null;

        return new self(...array_merge($data, [
            'department' => is_null($data['department']) ? null : Department::from($data['department']),
            'presidents' => empty($presidents) ? null : array_map(fn ($president): President => President::from($president), $presidents),
        ]));
    }
}
