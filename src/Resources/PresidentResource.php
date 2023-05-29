<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Objects\President;
use FelipeVa\ApiColombia\Requests\President\GetAllPresidentRequest;
use FelipeVa\ApiColombia\Requests\President\GetPagedPresidentRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentByNameRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentBySearchRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentRequest;

final class PresidentResource extends Resource
{
    /**
     * @return mixed|Listed<President>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllPresidentRequest())->dto();
    }

    /**
     * @return mixed|President
     */
    public function get(int $presidentId): mixed
    {
        return $this->connector->send(new GetPresidentRequest($presidentId))->dto();
    }

    /**
     * @return mixed|Listed<President>
     */
    public function getByName(string $presidentName): mixed
    {
        return $this->connector->send(new GetPresidentByNameRequest($presidentName))->dto();
    }

    /**
     * @return mixed|Listed<President>
     */
    public function search(string $searchValue): mixed
    {
        return $this->connector->send(new GetPresidentBySearchRequest($searchValue))->dto();
    }

    /**
     * @return mixed|Paged<President>
     */
    public function paged(int $page, int $pageSize): mixed
    {
        return $this->connector->send(new GetPagedPresidentRequest($page, $pageSize))->dto();
    }
}
