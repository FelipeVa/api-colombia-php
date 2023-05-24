<?php

use FelipeVa\ApiColombia\Objects\CategoryNaturalArea;
use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Country;
use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\Map;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Objects\Paged;
use FelipeVa\ApiColombia\Objects\President;
use FelipeVa\ApiColombia\Objects\Region;
use FelipeVa\ApiColombia\Objects\TouristAttraction;
use FelipeVa\ApiColombia\Requests\Country\GetCountryRequest;
use Saloon\Exceptions\Request\Statuses\NotFoundException;
use Saloon\Http\Faking\MockResponse;

it('can retrieve country information', function () {
    $client = mockClient();

    $response = $client->countries()->get('Colombia');

    expect($response->status())->toBe(200)
        ->and($response->dto())->toBeInstanceOf(Country::class);
});

it('can\'t retrieve country information for wrong country', function () {
    $client = mockClient([
        GetCountryRequest::class => MockResponse::fixture('countries.get.wrong'),
    ]);

    expect(fn () => $client->countries()->get('United States'))
        ->toThrow(NotFoundException::class);
});

it('can retrieve all regions', function () {
    $client = mockClient();
    $response = $client->regions()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(Region::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve region information', function () {
    $client = mockClient();

    $response = $client->regions()->get(1);

    expect($response->dto())->toBeInstanceOf(Region::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve region departments', function () {
    $client = mockClient();

    $response = $client->regions()->departments(1);

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(Department::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve all departments', function () {
    $client = mockClient();

    $response = $client->departments()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(Department::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve department information', function () {
    $client = mockClient();

    $response = $client->departments()->get(1);

    expect($response->dto())->toBeInstanceOf(Department::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve departments by name', function () {
    $client = mockClient();

    $response = $client->departments()->getByName('Cundinamarca');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(Department::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve departments by search', function () {
    $client = mockClient();

    $response = $client->departments()->search('Cundinamarca');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(Department::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve paged departments', function () {
    $client = mockClient();

    $response = $client->departments()->paged(
        page: 1,
        pageSize: 10
    );

    expect($response->dto())->toBeInstanceOf(Paged::class)
        ->and($response->dto()->data)->toContainOnlyInstancesOf(Department::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve department cities', function () {
    $client = mockClient();

    $response = $client->departments()->cities(1);

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(City::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve department natual areas', function () {
    $client = mockClient();

    $response = $client->departments()->naturalAreas(1);

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(NaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve department tourist attraction', function () {
    $client = mockClient();

    $response = $client->departments()->touristAttractions(2);

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(TouristAttraction::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve all cities', function () {
    $client = mockClient();

    $response = $client->cities()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(City::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve city information', function () {
    $client = mockClient();

    $response = $client->cities()->get(1);

    expect($response->dto())->toBeInstanceOf(City::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve cities by name', function () {
    $client = mockClient();

    $response = $client->cities()->getByName('Cali');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(City::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve cities by search', function () {
    $client = mockClient();

    $response = $client->cities()->search('Cali');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(City::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve paged cities', function () {
    $client = mockClient();

    $response = $client->cities()->paged(
        page: 1,
        pageSize: 10
    );

    expect($response->dto())->toBeInstanceOf(Paged::class)
        ->and($response->dto()->data)->toContainOnlyInstancesOf(City::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve all presidents', function () {
    $client = mockClient();
    $response = $client->presidents()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(President::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve president information', function () {
    $client = mockClient();

    $response = $client->presidents()->get(1);

    expect($response->dto())->toBeInstanceOf(President::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve president by name', function () {
    $client = mockClient();

    $response = $client->presidents()->getByName('Alvaro');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(President::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve president by search', function () {
    $client = mockClient();

    $response = $client->presidents()->search('Alvaro');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(President::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve paged presidents', function () {
    $client = mockClient();

    $response = $client->presidents()->paged(
        page: 1,
        pageSize: 10
    );

    expect($response->dto())->toBeInstanceOf(Paged::class)
        ->and($response->dto()->data)->toContainOnlyInstancesOf(President::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve all touristic attractions', function () {
    $client = mockClient();
    $response = $client->touristAttractions()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(TouristAttraction::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve touristic attraction information', function () {
    $client = mockClient();

    $response = $client->touristAttractions()->get(1);

    expect($response->dto())->toBeInstanceOf(TouristAttraction::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve touristic attraction by name', function () {
    $client = mockClient();

    $response = $client->touristAttractions()->getByName('Hacienda napoles');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(TouristAttraction::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve touristic attraction by search', function () {
    $client = mockClient();

    $response = $client->touristAttractions()->search('Hacienda napoles');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(TouristAttraction::class)
        ->and($response->status())->toBe(200);
})->skip();

it('can retrieve paged touristic attractions', function () {
    $client = mockClient();

    $response = $client->touristAttractions()->paged(
        page: 1,
        pageSize: 10
    );

    expect($response->dto())->toBeInstanceOf(Paged::class)
        ->and($response->dto()->data)->toContainOnlyInstancesOf(TouristAttraction::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve all category natural areas', function () {
    $client = mockClient();
    $response = $client->categoryNaturalAreas()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(CategoryNaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve category natural area information', function () {
    $client = mockClient();

    $response = $client->categoryNaturalAreas()->get(1);

    expect($response->dto())->toBeInstanceOf(CategoryNaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve category natural area all natural areas', function () {
    $client = mockClient();

    $response = $client->categoryNaturalAreas()->naturalAreas(1);

    expect($response->dto())->toBeInstanceOf(CategoryNaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve all natural areas', function () {
    $client = mockClient();
    $response = $client->naturalAreas()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(NaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve natural area information', function () {
    $client = mockClient();

    $response = $client->naturalAreas()->get(1);

    expect($response->dto())->toBeInstanceOf(NaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve natural area by name', function () {
    $client = mockClient();

    $response = $client->naturalAreas()->getByName('Los Nevados');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(NaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve natural area by search', function () {
    $client = mockClient();

    $response = $client->naturalAreas()->search('Los Nevados');

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(NaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve paged natural areas', function () {
    $client = mockClient();

    $response = $client->naturalAreas()->paged(
        page: 1,
        pageSize: 10
    );

    expect($response->dto())->toBeInstanceOf(Paged::class)
        ->and($response->dto()->data)->toContainOnlyInstancesOf(NaturalArea::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve all maps', function () {
    $client = mockClient();
    $response = $client->maps()->all();

    expect($response->dto())->toBeArray()
        ->and($response->dto())->toContainOnlyInstancesOf(Map::class)
        ->and($response->status())->toBe(200);
});

it('can retrieve map information', function () {
    $client = mockClient();

    $response = $client->maps()->get(1);

    expect($response->dto())->toBeInstanceOf(Map::class)
        ->and($response->status())->toBe(200);
});
