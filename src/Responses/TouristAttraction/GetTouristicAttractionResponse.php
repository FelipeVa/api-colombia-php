<?php

namespace FelipeVa\ApiColombia\Responses\TouristAttraction;

use FelipeVa\ApiColombia\Objects\TouristAttraction;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type TouristAttractionData from TouristAttraction
 */
class GetTouristicAttractionResponse
{
    public static function make(Response $response): TouristAttraction
    {
        /** @var TouristAttractionData $data */
        $data = $response->json();

        return TouristAttraction::from($data);
    }
}
