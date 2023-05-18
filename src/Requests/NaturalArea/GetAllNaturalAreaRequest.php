<?php

namespace FelipeVa\ApiColombia\Requests\NaturalArea;

use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Responses\NaturalArea\GetAllNaturalAreaResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetAllNaturalAreaRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/NaturalArea';
    }

    /**
     * @return array<int, NaturalArea>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetAllNaturalAreaResponse::make($response);
    }
}
