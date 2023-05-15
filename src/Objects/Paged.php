<?php

namespace FelipeVa\ApiColombia\Objects;

/**
 * @template T
 *
 * @phpstan-type PagedData array{page: int, pageSize: int, totalRecords: int, data?: array<int, T>}
 */
class Paged
{
    /**
     * @param  array<int, T>|null  $data
     */
    public function __construct(
        public int $page,
        public int $pageSize,
        public int $totalRecords,
        public ?array $data = null,
    ) {

    }
}
