<?php

namespace FelipeVa\ApiColombia\Responses\Region;

use FelipeVa\ApiColombia\Objects\Region;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type RegionData from Region
 */
class GetRegionResponse
{
    public static function make(Response $response): Region
    {
        /** @var RegionData $data */
        $data = $response->json();

        return new Region(...$data);
    }
}
