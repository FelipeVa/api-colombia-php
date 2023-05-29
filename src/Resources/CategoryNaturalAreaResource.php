<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Requests\CategoryNaturalArea\GetAllCategoryNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\CategoryNaturalArea\GetCategoryNaturalAreaAllNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\CategoryNaturalArea\GetCategoryNaturalAreaRequest;

final class CategoryNaturalAreaResource extends Resource
{
    /**
     * @return mixed|Listed<CategoryNaturalArea>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllCategoryNaturalAreaRequest())->dto();
    }

    /**
     * @return mixed|CategoryNaturalArea
     */
    public function get(int $categoryNaturalAreaId): mixed
    {
        return $this->connector->send(new GetCategoryNaturalAreaRequest($categoryNaturalAreaId))->dto();
    }

    /**
     * @return mixed|CategoryNaturalArea
     */
    public function naturalAreas(int $categoryNaturalAreaId): mixed
    {
        return $this->connector->send(new GetCategoryNaturalAreaAllNaturalAreaRequest($categoryNaturalAreaId))->dto();
    }
}
