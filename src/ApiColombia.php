<?php

declare(strict_types=1);

namespace FelipeVa\ApiColombia;

use FelipeVa\ApiColombia\Resources\CityResource;
use FelipeVa\ApiColombia\Resources\CountryResource;
use FelipeVa\ApiColombia\Resources\DepartmentResource;
use FelipeVa\ApiColombia\Resources\PresidentResource;
use FelipeVa\ApiColombia\Resources\RegionResource;
use Saloon\Http\Connector;

class ApiColombia extends Connector
{
    public function __construct(
        protected string $apiVersion = 'v1'
    )
    {

    }

    /**
     * Resolve the base URL of the service.
     */
    public function resolveBaseUrl(): string
    {
        return "https://api-colombia.com/api/{$this->apiVersion}";
    }

    /**
     * Define default headers
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function countries(): CountryResource
    {
        return new CountryResource($this);
    }

    public function regions(): RegionResource
    {
        return new RegionResource($this);
    }

    public function departments(): DepartmentResource
    {
        return new DepartmentResource($this);
    }

    public function cities(): CityResource
    {
        return new CityResource($this);
    }

    public function presidents(): PresidentResource
    {
        return new PresidentResource($this);
    }
}
