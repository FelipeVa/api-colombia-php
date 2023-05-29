<?php

namespace FelipeVa\ApiColombia\Responses\Country;

use FelipeVa\ApiColombia\Objects\Country;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type CountryData from Country
 */
final class GetCountryResponse
{
    public static function make(Response $response): Country
    {
        /** @var CountryData $data */
        $data = $response->json();

        return new Country(...$data);
    }
}
