<?php

namespace FelipeVa\ApiColombia\Requests\Department;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Responses\Department\GetDepartmentByNameResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/*
 * @TODO: review endpoint, is currently throwing a 404
 */
class GetDepartmentByNameRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $departmentName)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/Department/name/$this->departmentName";
    }

    public function createDtoFromResponse(Response $response): Department
    {
        return GetDepartmentByNameResponse::make($response);
    }
}
