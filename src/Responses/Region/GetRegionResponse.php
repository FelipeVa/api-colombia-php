<?php

namespace FelipeVa\ApiColombia\Responses\Region;

use FelipeVa\ApiColombia\Objects\Region;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type RegionData from Region
 */
final class GetRegionResponse
{
    public static function make(Response $response): Region
    {
        /** @var RegionData $data */
        $data = $response->json();

        return Region::from($data);
    }
}
