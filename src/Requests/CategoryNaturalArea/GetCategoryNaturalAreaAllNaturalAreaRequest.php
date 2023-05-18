<?php

namespace FelipeVa\ApiColombia\Requests\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Responses\CategoryNaturalArea\GetCategoryNaturalAreaResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetCategoryNaturalAreaAllNaturalAreaRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $categoryNaturalAreaId)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/CategoryNaturalArea/$this->categoryNaturalAreaId/NaturalAreas";
    }

    public function createDtoFromResponse(Response $response): CategoryNaturalArea
    {
        return GetCategoryNaturalAreaResponse::make($response);
    }
}
