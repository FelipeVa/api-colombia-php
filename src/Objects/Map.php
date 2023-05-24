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
class Map implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  string[]|null  $urlImages
     */
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $departmentId = null,
        public ?array $urlImages = null,
        public ?string $urlSource = null,
        public ?Department $department = null,
    ) {
    }

    public static function from(array $data): Map
    {
        return new self(...array_merge($data, [
            'department' => is_null($data['department']) ? null : Department::from($data['department']),
        ]));
    }
}
