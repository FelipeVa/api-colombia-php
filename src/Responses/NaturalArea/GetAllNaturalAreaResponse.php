<?php

namespace FelipeVa\ApiColombia\Responses\NaturalArea;

use FelipeVa\ApiColombia\Objects\NaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type NaturalAreaData from NaturalArea
 */
class GetAllNaturalAreaResponse
{
    /**
     * @return array<int, NaturalArea>
     */
    public static function make(Response $response): array
    {
        /** @var NaturalAreaData[] $data */
        $data = $response->json();

        if ($data === []) {
            return [];
        }

        return array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $data);
    }
}
