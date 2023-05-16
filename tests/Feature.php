<?php

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Country;
use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Objects\Paged;
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

    expect(fn() => $client->countries()->get('United States'))
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
})->skip();

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
