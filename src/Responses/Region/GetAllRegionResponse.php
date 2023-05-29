<?php

namespace FelipeVa\ApiColombia\Responses\Region;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Region;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type RegionData from Region
 */
final class GetAllRegionResponse
{
    /**
     * @return Listed<Region>
     */
    public static function make(Response $response): Listed
    {
        /** @var RegionData[] $json */
        $json = $response->json();

        /** @var Listed<Region> $data */
        $data = Listed::from([
           'data' => array_map(fn ($region): Region => Region::from($region), $json),
        ]);

        return $data;
    }
}
