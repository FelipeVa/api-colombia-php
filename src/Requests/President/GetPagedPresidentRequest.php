<?php

namespace FelipeVa\ApiColombia\Requests\President;

use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Objects\President;
use FelipeVa\ApiColombia\Responses\President\GetPagedPresidentResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class GetPagedPresidentRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(public int $page, public int $pageSize)
    {

    }

    public function resolveEndpoint(): string
    {
        return '/President/pagedList';
    }

    /**
     * @return array<string, int>
     */
    protected function defaultQuery(): array
    {
        return [
            'Page' => $this->page,
            'PageSize' => $this->pageSize,
        ];
    }

    /**
     * @return Paged<President>
     */
    public function createDtoFromResponse(Response $response): Paged
    {
        return GetPagedPresidentResponse::make($response);
    }
}
