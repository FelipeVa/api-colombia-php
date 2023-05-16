<?php

namespace FelipeVa\ApiColombia\Requests\City;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Paged;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetPagedCityRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(public int $page, public int $pageSize)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/City/pagedList?Page=$this->page&PageSize=$this->pageSize";
    }

    /**
     * @return Paged<City>
     */
    public function createDtoFromResponse(Response $response): Paged
    {
        return GetPagedCityResponse::make($response);
    }
}
