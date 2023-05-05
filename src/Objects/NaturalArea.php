<?php

namespace FelipeVa\ApiColombia\Objects;

/**
 * @phpstan-type NaturalAreaData array{id: int, name: string, categoryNaturalAreaId: int, areaGroupId: int|null, departmentId: int|null, daneCode: int|null, department: null, landArea: int|null, maritimeArea: int|null, categoryNaturalArea: string|null}
 */
class NaturalArea
{
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
}
