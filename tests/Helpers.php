<?php

use FelipeVa\ApiColombia\ApiColombia;
use FelipeVa\ApiColombia\Requests\Country\GetCountryRequest;
use FelipeVa\ApiColombia\Requests\Department\GetAllDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentCityRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Region\GetAllRegionRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionRequest;
use Saloon\Exceptions\DirectoryNotFoundException;
use Saloon\Exceptions\InvalidMockResponseCaptureMethodException;
use Saloon\Http\Faking\Fixture;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

/**
 * @param  array<class-string, Fixture>  $mocks
 *
 * @throws DirectoryNotFoundException
 * @throws InvalidMockResponseCaptureMethodException
 */
function mockClient(array $mocks = []): ApiColombia
{
    $apiColombia = new ApiColombia();
    $mockClient = new MockClient(array_merge([
        GetCountryRequest::class => MockResponse::fixture('countries.get.colombia'),
        GetAllRegionRequest::class => MockResponse::fixture('regions.get.all'),
        GetRegionRequest::class => MockResponse::fixture('regions.get.1'),
        GetRegionDepartmentRequest::class => MockResponse::fixture('regions.get.1.departments'),
        GetAllDepartmentRequest::class => MockResponse::fixture('departments.get.all'),
        GetDepartmentRequest::class => MockResponse::fixture('departments.get.1'),
        GetDepartmentCityRequest::class => MockResponse::fixture('departments.get.1.cities'),
        GetDepartmentNaturalAreaRequest::class => MockResponse::fixture('departments.get.1.natural-areas'),
    ], $mocks));

    $apiColombia->withMockClient($mockClient);

    return $apiColombia;
}
