<?php

namespace FelipeVa\ApiColombia\Requests\President;

use FelipeVa\ApiColombia\Objects\President;
use FelipeVa\ApiColombia\Responses\President\GetPresidentResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetPresidentRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $presidentId)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/President/$this->presidentId";
    }

    public function createDtoFromResponse(Response $response): President
    {
        return GetPresidentResponse::make($response);
    }
}
