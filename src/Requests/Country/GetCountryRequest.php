<?php

namespace FelipeVa\ApiColombia\Requests\Country;

use FelipeVa\ApiColombia\Objects\Country;
use FelipeVa\ApiColombia\Responses\Country\GetCountryResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetCountryRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $country)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/Country/{$this->country}";
    }

    public function createDtoFromResponse(Response $response): Country
    {
        return GetCountryResponse::make($response);
    }
}
