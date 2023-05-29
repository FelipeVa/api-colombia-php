<?php

namespace FelipeVa\ApiColombia\Requests\President;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\President;
use FelipeVa\ApiColombia\Responses\President\GetAllPresidentResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetPresidentBySearchRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $searchValue)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/President/search/$this->searchValue";
    }

    /**
     * @return Listed<President>
     */
    public function createDtoFromResponse(Response $response): Listed
    {
        return GetAllPresidentResponse::make($response);
    }
}
