<?php

namespace FelipeVa\ApiColombia\Requests\Department;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Responses\Department\GetDepartmentCityResponse;
use FelipeVa\ApiColombia\Responses\Department\GetDepartmentNaturalAreaResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetDepartmentNaturalAreaRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $departmentId)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/Department/$this->departmentId/naturalareas";
    }

    /**
     * @return array<int, NaturalArea>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetDepartmentNaturalAreaResponse::make($response);
    }
}
