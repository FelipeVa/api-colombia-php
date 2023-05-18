<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\CategoryNaturalArea\GetAllCategoryNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\CategoryNaturalArea\GetCategoryNaturalAreaAllNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\CategoryNaturalArea\GetCategoryNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetPagedTouristicAttractionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionByNameRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionBySearchRequest;
use Saloon\Contracts\Response;

class CategoryNaturalAreaResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllCategoryNaturalAreaRequest());
    }

    public function get(int $categoryNaturalAreaId): Response
    {
        return $this->connector->send(new GetCategoryNaturalAreaRequest($categoryNaturalAreaId));
    }

    public function naturalAreas(int $categoryNaturalAreaId): Response
    {
        return $this->connector->send(new GetCategoryNaturalAreaAllNaturalAreaRequest($categoryNaturalAreaId));
    }
}
