<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @template T
 *
 * @phpstan-type PagedData array{page: int, pageSize: int, totalRecords: int, data: array<int, T>|null}
 *
 * @implements DataTransferObject<PagedData>
 */
class Paged implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  T[]|null  $data
     */
    public function __construct(
        public int $page,
        public int $pageSize,
        public int $totalRecords,
        public ?array $data = null,
    ) {

    }

    /**
     * @param PagedData $data
     * @return Paged<T>
     */
    public static function from(array $data): Paged
    {
        return new Paged(...$data);
    }
}
