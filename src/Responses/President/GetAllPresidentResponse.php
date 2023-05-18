<?php

namespace FelipeVa\ApiColombia\Responses\President;

use FelipeVa\ApiColombia\Objects\President;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type PresidentData from President
 */
class GetAllPresidentResponse
{
    /**
     * @return array<int, President>
     */
    public static function make(Response $response): array
    {
        /** @var array<int, PresidentData> $data */
        $data = $response->json();

        if ($data === []) {
            return [];
        }

        return array_map(fn ($president): President => President::from($president), $data);
    }
}
