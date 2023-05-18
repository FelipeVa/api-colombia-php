<?php

namespace FelipeVa\ApiColombia\Requests\President;

use FelipeVa\ApiColombia\Objects\President;
use FelipeVa\ApiColombia\Responses\President\GetAllPresidentResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetPresidentByNameRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $cityName)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/President/name/$this->cityName";
    }

    /**
     * @return array<int, President>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetAllPresidentResponse::make($response);
    }
}
