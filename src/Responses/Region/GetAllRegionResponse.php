<?php

namespace FelipeVa\ApiColombia\Responses\Region;

use FelipeVa\ApiColombia\Objects\Region;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type RegionData from Region
 */
final class GetAllRegionResponse
{
    /**
     * @return array<int, Region>
     */
    public static function make(Response $response): array
    {
        /** @var RegionData[] $data */
        $data = $response->json();

        return array_map(fn ($region): Region => Region::from($region), $data);
    }
}
