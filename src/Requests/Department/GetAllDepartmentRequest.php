<?php

namespace FelipeVa\ApiColombia\Requests\Department;

use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Responses\Department\GetAllDepartmentResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetAllDepartmentRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/Department';
    }

    /**
     * @return array<int, Department>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetAllDepartmentResponse::make($response);
    }
}
