<?php

namespace FelipeVa\ApiColombia\Responses\President;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\President;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type PresidentData from President
 */
class GetAllPresidentResponse
{
    /**
     * @return Listed<President>
     */
    public static function make(Response $response): Listed
    {
        /** @var array<int, PresidentData> $json */
        $json = $response->json();

        /** @var Listed<President> $data */
        $data = Listed::from([
            'data' => array_map(fn ($president): President => President::from($president), $json),
        ]);

        return $data;
    }
}
