<?php

namespace FelipeVa\ApiColombia\Requests\City;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Responses\City\GetAllCityResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetCityByNameRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $cityName)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/City/name/$this->cityName";
    }

    /**
     * @return array<int, City>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetAllCityResponse::make($response);
    }
}
