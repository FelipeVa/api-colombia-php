<?php

namespace FelipeVa\ApiColombia\Requests\TouristAttraction;

use FelipeVa\ApiColombia\Objects\TouristAttraction;
use FelipeVa\ApiColombia\Responses\TouristAttraction\GetAllTouristicAttractionResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * TODO: this throws a 404
 */
class GetTouristicAttractionBySearchRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $searchValue)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/TouristicAttraction/search/$this->searchValue";
    }

    /**
     * @return array<int, TouristAttraction>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetAllTouristicAttractionResponse::make($response);
    }
}
