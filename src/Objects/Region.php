<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-import-type DepartmentData from Department
 *
 * @phpstan-type RegionData array{id: int, name: string|null, description: string|null, departments: DepartmentData[]|null}
 *
 * @implements DataTransferObject<RegionData>
 */
class Region implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  array<int, Department>|null  $departments
     */
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?string $description = null,
        public ?array $departments = null,
    ) {
    }

    public static function from(array $data): Region
    {
        return new Region(...array_merge($data, [
            'departments' => $data['departments']
                ? array_map(fn ($department): Department => Department::from($department), $data['departments'])
                : null,
        ]));
    }
}
