<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @template T
 *
 * @phpstan-type ListedData array{data: array<int, T>}
 *
 * @implements DataTransferObject<ListedData>
 */
class Listed implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param T[] $data
     */
    public function __construct(
        public array $data = [],
    ) {
    }


    /**
     * @param ListedData $data
     * @return Listed<T>
     */
    public static function from(array $data): Listed
    {
        return new self(...$data);
    }
}
