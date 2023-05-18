<?php

namespace FelipeVa\ApiColombia\Responses\City;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Paged;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type PagedData from Paged
 */
class GetPagedCityResponse
{
    /**
     * TODO: fix workaround for phpstan
     *
     * @return Paged<City>
     */
    public static function make(Response $response): Paged
    {
        /** @var PagedData $data */
        $data = $response->json();

        /** @var Paged<City> $paginated */
        $paginated = Paged::from(array_merge($data, [
            'data' => is_null($data['data'])
                ? []
                : array_map(fn ($city): City => City::from($city), $data['data']),
        ]));

        return $paginated;
    }
}
