<?php

use FelipeVa\ApiColombia\ApiColombia;
use FelipeVa\ApiColombia\Requests\City\GetAllCityRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityByNameRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityBySearchRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityRequest;
use FelipeVa\ApiColombia\Requests\City\GetPagedCityRequest;
use FelipeVa\ApiColombia\Requests\Country\GetCountryRequest;
use FelipeVa\ApiColombia\Requests\Department\GetAllDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentByNameRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentBySearchRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentCityRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentNaturalAreaRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Department\GetDepartmentTouristAttractionRequest;
use FelipeVa\ApiColombia\Requests\Department\GetPagedDepartmentRequest;
use FelipeVa\ApiColombia\Requests\President\GetAllPresidentRequest;
use FelipeVa\ApiColombia\Requests\President\GetPagedPresidentRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentByNameRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentBySearchRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentRequest;
use FelipeVa\ApiColombia\Requests\Region\GetAllRegionRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionDepartmentRequest;
use FelipeVa\ApiColombia\Requests\Region\GetRegionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetAllTouristicAttractionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetPagedTouristicAttractionRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionByNameRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionBySearchRequest;
use FelipeVa\ApiColombia\Requests\TouristAttraction\GetTouristicAttractionRequest;
use Saloon\Exceptions\DirectoryNotFoundException;
use Saloon\Exceptions\InvalidMockResponseCaptureMethodException;
use Saloon\Http\Faking\Fixture;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

/**
 * @param array<class-string, Fixture> $mocks
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
        GetDepartmentTouristAttractionRequest::class => MockResponse::fixture('departments.get.1.tourist-attractions'),
        GetDepartmentByNameRequest::class => MockResponse::fixture('departments.get.by-name'),
        GetDepartmentBySearchRequest::class => MockResponse::fixture('departments.get.by-search'),
        GetPagedDepartmentRequest::class => MockResponse::fixture('departments.get.paged'),
        GetAllCityRequest::class => MockResponse::fixture('cities.get.all'),
        GetCityRequest::class => MockResponse::fixture('cities.get.1'),
        GetCityByNameRequest::class => MockResponse::fixture('cities.get.by-name'),
        GetCityBySearchRequest::class => MockResponse::fixture('cities.get.by-search'),
        GetPagedCityRequest::class => MockResponse::fixture('cities.get.paged'),
        GetAllPresidentRequest::class => MockResponse::fixture('presidents.get.all'),
        GetPresidentRequest::class => MockResponse::fixture('presidents.get.1'),
        GetPresidentByNameRequest::class => MockResponse::fixture('presidents.get.by-name'),
        GetPresidentBySearchRequest::class => MockResponse::fixture('presidents.get.by-search'),
        GetPagedPresidentRequest::class => MockResponse::fixture('presidents.get.paged'),
        GetAllTouristicAttractionRequest::class => MockResponse::fixture('touristicAttraction.get.all'),
        GetTouristicAttractionRequest::class => MockResponse::fixture('touristicAttractions.get.1'),
        GetTouristicAttractionByNameRequest::class => MockResponse::fixture('touristicAttractions.get.by-name'),
        GetTouristicAttractionBySearchRequest::class => MockResponse::fixture('touristicAttractions.get.by-search'),
        GetPagedTouristicAttractionRequest::class => MockResponse::fixture('touristicAttractions.get.paged')
    ], $mocks));

    $apiColombia->withMockClient($mockClient);

    return $apiColombia;
}
