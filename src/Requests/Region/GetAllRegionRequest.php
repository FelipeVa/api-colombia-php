<?php

namespace FelipeVa\ApiColombia\Requests\Region;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Region;
use FelipeVa\ApiColombia\Responses\Region\GetAllRegionResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetAllRegionRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/Region';
    }

    /**
     * @return Listed<Region>
     */
    public function createDtoFromResponse(Response $response): Listed
    {
        return GetAllRegionResponse::make($response);
    }
}
