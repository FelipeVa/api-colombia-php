<?php

namespace FelipeVa\ApiColombia\Requests\TouristAttraction;

use FelipeVa\ApiColombia\Objects\TouristAttraction;
use FelipeVa\ApiColombia\Responses\TouristAttraction\GetAllTouristicAttractionResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetTouristicAttractionByNameRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $touristicAttractionName)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/TouristicAttraction/name/$this->touristicAttractionName";
    }

    /**
     * @return array<int, TouristAttraction>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetAllTouristicAttractionResponse::make($response);
    }
}
