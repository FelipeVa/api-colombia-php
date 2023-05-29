<?php

namespace FelipeVa\ApiColombia\Requests\CategoryNaturalArea;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Responses\CategoryNaturalArea\GetCategoryNaturalAreaNaturalAreaResponse;
use FelipeVa\ApiColombia\Responses\CategoryNaturalArea\GetCategoryNaturalAreaResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetCategoryNaturalAreaAllNaturalAreaRequest extends Request
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

    /**
     * @param Response $response
     * @return Listed<NaturalArea>
     */
    public function createDtoFromResponse(Response $response): Listed
    {
        return GetCategoryNaturalAreaNaturalAreaResponse::make($response);
    }
}
