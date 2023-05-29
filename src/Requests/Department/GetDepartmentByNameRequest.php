<?php

namespace FelipeVa\ApiColombia\Requests\Department;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Responses\Department\GetAllDepartmentResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetDepartmentByNameRequest extends Request
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

    /**
     * @return Listed<Department>
     */
    public function createDtoFromResponse(Response $response): Listed
    {
        return GetAllDepartmentResponse::make($response);
    }
}
