<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @TODO: typo here departamentId
 * @phpstan-import-type DepartmentData from Department
 *
 * @phpstan-type MapData array{id: int, name: string|null, description: string|null, departamentId: int|null, urlImages: string[]|null, urlSource: string|null, departament: DepartmentData|null}
 *
 * @implements DataTransferObject<MapData>
 */
class Map implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param string[] $urlImages
     */
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $departamentId = null,
        public ?array $urlImages = null,
        public ?string $urlSource = null,
        public ?Department $departament = null,
    ) {
    }

    public static function from(array $data): Map
    {
        return new self(...array_merge($data, [
           'departament' => is_null($data['departament']) ? null : Department::from($data['departament']),
        ]));
    }
}
