<?php

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Country;
use FelipeVa\ApiColombia\Objects\Department;
use FelipeVa\ApiColombia\Objects\NaturalArea;
use FelipeVa\ApiColombia\Objects\Region;
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
