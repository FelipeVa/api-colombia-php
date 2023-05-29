<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Objects\TouristAttraction;
use FelipeVa\ApiColombia\Requests\Department\GetAllDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentByNameRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentBySearchRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentCityRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentTouristAttractionRequest;
use FelipeVa\ApiColombia\Requests\Department\GetPagedDepartmentRequest;

final class DepartmentResource extends Resource
{
    /**
     * @return mixed|Listed<Department>
     */
    public function all(): mixed
    {
        return $this->connector->send(new GetAllDepartmentRequest())->dto();
    }

    /**
     * @return mixed|Department
     */
    public function get(int $departmentId): mixed
    {
        return $this->connector->send(new GetDepartmentRequest($departmentId))->dto();
    }

    /**
     * @return mixed|Listed<Department>
     */
    public function getByName(string $departmentName): mixed
    {
        return $this->connector->send(new GetDepartmentByNameRequest($departmentName))->dto();
    }

    /**
     * @return mixed|Listed<Department>
     */
    public function search(string $searchValue): mixed
    {
        return $this->connector->send(new GetDepartmentBySearchRequest($searchValue))->dto();
    }

    /**
     * @return mixed|Paged<Department>
     */
    public function paged(int $page, int $pageSize): mixed
    {
        return $this->connector->send(new GetPagedDepartmentRequest($page, $pageSize))->dto();
    }

    /**
     * @return mixed|Listed<City>
     */
    public function cities(int $departmentId): mixed
    {
        return $this->connector->send(new GetDepartmentCityRequest($departmentId))->dto();
    }

    /**
     * @return mixed|Listed<NaturalArea>
     */
    public function naturalAreas(int $departmentId): mixed
    {
        return $this->connector->send(new GetDepartmentNaturalAreaRequest($departmentId))->dto();
    }

    /**
     * @return mixed|Listed<TouristAttraction>
     */
    public function touristAttractions(int $departmentId): mixed
    {
        return $this->connector->send(new GetDepartmentTouristAttractionRequest($departmentId))->dto();
    }
}
