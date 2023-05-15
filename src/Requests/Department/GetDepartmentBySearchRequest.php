<?php

namespace FelipeVa\ApiColombia\Requests\Department;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Responses\Department\GetDepartmentBySearchResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetDepartmentBySearchRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $searchValue)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/Department/search/$this->searchValue";
    }

    /**
     * @return array<int, Department>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetDepartmentBySearchResponse::make($response);
    }
}
