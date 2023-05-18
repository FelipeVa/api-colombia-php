<?php

namespace FelipeVa\ApiColombia\Requests\TouristAttraction;

use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Objects\TouristAttraction;
use FelipeVa\ApiColombia\Responses\TouristAttraction\GetPagedTouristicAttractionResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

/**
 * TODO: throws 404 from api
 */
class GetPagedTouristicAttractionRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(public int $page, public int $pageSize)
    {

    }

    public function resolveEndpoint(): string
    {
        return '/TouristicAttraction/pagedList';
    }

    /**
     * @return array{Page: int, PageSize: int}
     */
    protected function defaultQuery(): array
    {
        return [
            'Page' => $this->page,
            'PageSize' => $this->pageSize,
        ];
    }

    /**
     * @return Paged<TouristAttraction>
     */
    public function createDtoFromResponse(Response $response): Paged
    {
        return GetPagedTouristicAttractionResponse::make($response);
    }
}
