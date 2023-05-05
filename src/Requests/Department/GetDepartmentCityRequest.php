<?php

namespace FelipeVa\ApiColombia\Requests\Department;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Responses\Department\GetDepartmentCityResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetDepartmentCityRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $departmentId)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/Department/$this->departmentId/cities";
    }

    /**
     * @return array<int, City>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetDepartmentCityResponse::make($response);
    }
}
