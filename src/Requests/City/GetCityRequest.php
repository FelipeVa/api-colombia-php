<?php

namespace FelipeVa\ApiColombia\Requests\City;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Responses\City\GetCityResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetCityRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $cityId)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/City/$this->cityId";
    }

    public function createDtoFromResponse(Response $response): City
    {
        return GetCityResponse::make($response);
    }
}
