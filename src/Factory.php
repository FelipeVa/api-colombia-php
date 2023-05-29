<?php

declare(strict_types=1);

namespace FelipeVa\ApiColombia;

use FelipeVa\ApiColombia\Resources\CategoryNaturalAreaResource;
use FelipeVa\ApiColombia\Resources\CityResource;
use FelipeVa\ApiColombia\Resources\CountryResource;
use FelipeVa\ApiColombia\Resources\DepartmentResource;
use FelipeVa\ApiColombia\Resources\MapResource;
use FelipeVa\ApiColombia\Resources\NaturalAreaResource;
use FelipeVa\ApiColombia\Resources\PresidentResource;
use FelipeVa\ApiColombia\Resources\RegionResource;
use FelipeVa\ApiColombia\Resources\TouristAttractionResource;
use Saloon\Http\Connector;

final class Factory extends Connector
{
    public string $apiVersion = 'v1';

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

    public function withApiVersion(string $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

        return $this;
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

    public function touristAttractions(): TouristAttractionResource
    {
        return new TouristAttractionResource($this);
    }

    public function categoryNaturalAreas(): CategoryNaturalAreaResource
    {
        return new CategoryNaturalAreaResource($this);
    }

    public function naturalAreas(): NaturalAreaResource
    {
        return new NaturalAreaResource($this);
    }

    public function maps(): MapResource
    {
        return new MapResource($this);
    }
}
