<?php

namespace FelipeVa\ApiColombia\Requests\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Responses\CategoryNaturalArea\GetAllCategoryNaturalAreaResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetAllCategoryNaturalAreaRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/CategoryNaturalArea';
    }

    /**
     * @return array<int, CategoryNaturalArea>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return GetAllCategoryNaturalAreaResponse::make($response);
    }
}
