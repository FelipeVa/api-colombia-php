<?php

namespace FelipeVa\ApiColombia\Responses\NaturalArea;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type NaturalAreaData from NaturalArea
 * @phpstan-import-type CityData from City
 */
final class GetNaturalAreaResponse
{
    public static function make(Response $response): NaturalArea
    {
        /** @var NaturalAreaData $data */
        $data = $response->json();

        return NaturalArea::from($data);
    }
}
