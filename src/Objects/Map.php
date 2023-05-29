<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-import-type DepartmentData from Department
 *
 * @phpstan-type MapData array{id: int, name: string|null, description: string|null, departmentId: int|null, urlImages: string[]|null, urlSource: string|null, department: DepartmentData|null}
 *
 * @implements DataTransferObject<MapData>
 */
final class Map implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  string[]|null  $urlImages
     */
    public function __construct(
        public readonly int $id,
        public readonly ?string $name = null,
        public readonly ?string $description = null,
        public readonly ?int $departmentId = null,
        public readonly ?array $urlImages = null,
        public readonly ?string $urlSource = null,
        public readonly ?Department $department = null,
    ) {
    }

    public static function from(array $data): Map
    {
        return new self(...array_merge($data, [
            'department' => is_null($data['department']) ? null : Department::from($data['department']),
        ]));
    }
}
