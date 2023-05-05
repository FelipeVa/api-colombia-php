<?php

namespace FelipeVa\ApiColombia\Responses\Region;

use FelipeVa\ApiColombia\Objects\Region;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type RegionData from Region
 */
class GetAllRegionResponse
{
    /**
     * @param  array<int, RegionData>  $regions
     */
    public function __construct(
        public array $regions,
    ) {
    }

    /**
     * @return array<int, Region>
     */
    public static function make(Response $response): array
    {
        /** @var array<int, RegionData> $data */
        $data = $response->json();

        return array_map(fn ($region) => new Region(...$region), $data);
    }
}
