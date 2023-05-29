<?php

namespace FelipeVa\ApiColombia\Requests\Map;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Map;
use FelipeVa\ApiColombia\Responses\Map\GetAllMapResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetAllMapRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/Map';
    }

    /**
     * @return Listed<Map>
     */
    public function createDtoFromResponse(Response $response): Listed
    {
        return GetAllMapResponse::make($response);
    }
}
