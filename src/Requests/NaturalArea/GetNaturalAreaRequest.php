<?php

namespace FelipeVa\ApiColombia\Requests\NaturalArea;

use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Responses\NaturalArea\GetNaturalAreaResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetNaturalAreaRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $naturalAreaId)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/NaturalArea/$this->naturalAreaId";
    }

    public function createDtoFromResponse(Response $response): NaturalArea
    {
        return GetNaturalAreaResponse::make($response);
    }
}
