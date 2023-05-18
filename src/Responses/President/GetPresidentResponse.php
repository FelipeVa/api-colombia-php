<?php

namespace FelipeVa\ApiColombia\Responses\President;

use FelipeVa\ApiColombia\Objects\President;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type PresidentData from President
 */
class GetPresidentResponse
{
    public static function make(Response $response): President
    {
        /** @var PresidentData $data */
        $data = $response->json();

        return President::from($data);
    }
}
