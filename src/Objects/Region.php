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
final class Region implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  array<int, Department>|null  $departments
     */
    public function __construct(
        public readonly int $id,
        public readonly ?string $name = null,
        public readonly ?string $description = null,
        public readonly ?array $departments = null,
    ) {
    }

    public static function from(array $data): Region
    {
        return new self(...array_merge($data, [
            'departments' => $data['departments']
                ? array_map(fn ($department): Department => Department::from($department), $data['departments'])
                : null,
        ]));
    }
}
