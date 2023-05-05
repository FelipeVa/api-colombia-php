<?php

namespace FelipeVa\ApiColombia\Requests\Region;

use FelipeVa\ApiColombia\Objects\Region;
use FelipeVa\ApiColombia\Responses\Region\GetRegionResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetRegionRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $regionId)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/Region/$this->regionId";
    }

    public function createDtoFromResponse(Response $response): Region
    {
        return GetRegionResponse::make($response);
    }
}
