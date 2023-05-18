<?php

namespace FelipeVa\ApiColombia\Responses\NaturalArea;

use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Objects\Paged;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type PagedData from Paged
 */
class GetPagedNaturalAreaResponse
{
    /**
     * TODO: fix workaround for phpstan
     *
     * @return Paged<NaturalArea>
     */
    public static function make(Response $response): Paged
    {
        /** @var PagedData $data */
        $data = $response->json();

        /** @var Paged<NaturalArea> $paginated */
        $paginated = Paged::from(array_merge($data, [
            'data' => is_null($data['data'])
                ? []
                : array_map(fn ($naturalArea): NaturalArea => NaturalArea::from($naturalArea), $data['data']),
        ]));

        return $paginated;
    }
}
