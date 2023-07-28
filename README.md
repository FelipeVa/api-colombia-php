```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();

// Get all departments
$departments = $client->departments()->all();

foreach ($departments as $department) {
    echo $department->name;
}
```
---

<p align="center">
    <a href="https://github.com/felipeva/api-colombia-php/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/felipeva/api-colombia-php/tests.yml?branch=master&label=tests&style=round-square"></a>
    <a href="https://packagist.org/packages/felipeva/api-colombia-php"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/felipeva/api-colombia-php"></a>
    <a href="https://packagist.org/packages/felipeva/api-colombia-php"><img alt="Latest Version" src="https://img.shields.io/packagist/v/felipeva/api-colombia-php"></a>
    <a href="https://packagist.org/packages/felipeva/api-colombia-php"><img alt="License" src="https://img.shields.io/github/license/felipeva/api-colombia-php"></a>
</p>

***Api Colombia PHP*** is a PHP API client that lets you easily interact with the [Api Colombia](https://github.com/Mteheran/api-colombia).

## Table of Contents
- [Getting started](#getting-started)
  - [Installation](#installation)
- [Usage](#usage)
  - [Country Resource](#country-resource)
  - [Region Resource](#region-resource)
  - [Department Resource](#department-resource)
  - [City Resource](#city-resource)
  - [President Resource](#president-resource)
  - [Tourist Attraction Resource](#tourist-attraction-resource)
  - [Category Natural Area Resource](#category-natural-area-resource)
  - [Natural Area Resource](#natural-area-resource)
  - [Map Resource](#map-resource)

## Getting started

> **Requires [PHP 8.2+](https://php.net/releases/)**

### Installation
First, install the package via the [Composer](https://getcomposer.org/) package manager:
```bash
composer require felipeva/api-colombia-php
```

Then, you're ready to start using the package:
```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();

// Get all cities
$cities = $client->cities()->all();

foreach ($cities as $city) {
    echo $city->name;
}

// Get all departments
$departments = $client->departments()->all();

foreach ($departments as $department) {
    echo $department->name;
}
```

## Usage

### Country Resource

#### `get`
Retrieves general information about Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$country = $client->countries()->get('Colombia');

// Returns a Country object
$country->name; // Colombia
$country->surface;
$country->population;
$country->languages;
// ...
```

### Region Resource

#### `all`
Retrieves all regions in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$regions = $client->regions()->all();

// Returns a Listed object of Region objects
foreach ($regions->data as $region) {
    $region->id;
    $region->name;
    $region->description;
    $region->departments; // Array of Department objects
    // ...
}
```

#### `get`
Retrieves a region by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$region = $client->regions()->get(1);

// Returns a Region object
$region->id;
$region->name;
$region->description;
$region->departments; // Array of Department objects
```

#### `departments`
Retrieves all departments in a region.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$regionDepartments = $client->regions()->departments(1);

// Returns a Listed object of Department objects
foreach ($regionDepartments->data as $department) {
    $department->id;
    $department->name;
    $department->description;
    $department->cities; // Array of City objects
    // ...
}
```

### Department Resource

#### `all`
Retrieves all departments in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$departments = $client->departments()->all();

// Returns a Listed object of Department objects
foreach ($departments->data as $department) {
    $department->id;
    $department->name;
    $department->description;
    $department->cities; // Array of City objects
    // ...
}
```

#### `get`
Retrieves a department by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$department = $client->departments()->get(1);

// Returns a Department object
$department->id;
$department->name;
$department->description;
$department->cities; // Array of City objects
```
#### `cities`
Retrieves all cities in a department.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$departmentCities = $client->departments()->cities(1);

// Returns a Listed object of City objects
foreach ($departmentCities->data as $city) {
    $city->id;
    $city->name;
    $city->description;
    $city->population;
    $city->surface;
    $city->department; // Department object
    // ...
}
```
#### `naturalAreas`
Retrieves all natural areas in a department.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$departmentNaturalAreas = $client->departments()->naturalAreas(1);

// Returns a Listed object of NaturalArea objects
foreach ($departmentNaturalAreas->data as $naturalArea) {
    $naturalArea->id;
    $naturalArea->name;
    $naturalArea->department; // Department object
    // ...
}
```

#### `touristAttractions`
Retrieves all tourist attractions in a department.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$departmentTouristAttractions = $client->departments()->touristAttractions(1);

// Returns a Listed object of TouristAttraction objects
foreach ($departmentTouristAttractions->data as $touristAttraction) {
    $touristAttraction->id;
    $touristAttraction->name;
    $touristAttraction->description;
    $touristAttraction->city; // City object
    // ...
}
```

#### `getByName`
Retrieves a department by its name.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$department = $client->departments()->getByName('Antioquia');

// Returns a Listed object of Department objects
foreach ($department->data as $department) {
    $department->id;
    $department->name;
    $department->description;
    $department->cities; // Array of City objects
    // ...
}
```

#### `search`
Searches for departments by the following fields: Name, Description, PhonePrefix.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$departments = $client->departments()->search('Antioquia');

// Returns a Listed object of Department objects
foreach ($departments->data as $department) {
    $department->id;
    $department->name;
    $department->description;
    $department->cities; // Array of City objects
    // ...
}
```
#### `paged`
Retrieves a paged list of departments.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$departments = $client->departments()->paged(page: 1, pageSize: 10);

$departments->page; // 1
$departments->pageSize; // 10
$departments->totalRecords; // number of records

// Returns a Paged object of Department objects
foreach ($departments->data as $department) {
    $department->id;
    $department->name;
    $department->description;
    // ...
}
```

### City Resource

#### `all`
Retrieves all cities in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$cities = $client->cities()->all();

// Returns a Listed object of City objects
foreach ($cities->data as $city) {
    $city->id;
    $city->name;
    $city->description;
    $city->population;
    $city->surface;
    $city->department; // Department object
    // ...
}
```

#### `get`
Retrieves a city by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$city = $client->cities()->get(1);

// Returns a City object
$city->id;
$city->name;
$city->description;
$city->population;
$city->surface;
// ...
```

#### `getByName`
Retrieves a city by its name.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$city = $client->cities()->getByName('Medellín');

// Returns a Listed object of City objects
foreach ($city->data as $city) {
    $city->id;
    $city->name;
    $city->description;
    $city->population;
    $city->surface;
    // ...
}
```

#### `search`
Searches for cities by the following fields: Name, Description, PostalCode.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$cities = $client->cities()->search('Medellín');

// Returns a Listed object of City objects
foreach ($cities->data as $city) {
    $city->id;
    $city->name;
    $city->description;
    $city->population;
    $city->surface;
    // ...
}
```

#### `paged`
Retrieves a paged list of cities.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$cities = $client->cities()->paged(page: 1, pageSize: 10);

$cities->page; // 1
$cities->pageSize; // 10
$cities->totalRecords; // number of records

// Returns a Paged object of City objects
foreach ($cities->data as $city) {
    $city->id;
    $city->name;
    $city->description;
    $city->population;
    $city->surface;
    // ...
}
```

### President Resource

#### `all`
Retrieves all presidents in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$presidents = $client->presidents()->all();

// Returns a Listed object of President objects
foreach ($presidents->data as $president) {
    $president->id;
    $president->name;
    $president->lastName;
    $president->description;
    // ...
}
```

#### `get`
Retrieves a president by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$president = $client->presidents()->get(1);

// Returns a President object
$president->id;
$president->name;
$president->lastName;
$president->description;
// ...
```

#### `getByName`
Retrieves a president by its name.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$president = $client->presidents()->getByName('Gustavo Petro');

// Returns a Listed object of President objects
foreach ($president->data as $president) {
    $president->id;
    $president->name;
    $president->lastName;
    $president->description;
    // ...
}
```

#### `getByYear`
Retrieves a president by its year.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$president = $client->presidents()->getByYear(2023);

// Returns a Listed object of President objects
foreach ($president->data as $president) {
    $president->id;
    $president->name;
    $president->lastName;
    $president->description;
    // ...
}
```

#### `search`
Searches for presidents by the following fields: Name, Description, PoliticalParty,LastName

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$presidents = $client->presidents()->search('Gustavo Petro');

// Returns a Listed object of President objects
foreach ($presidents->data as $president) {
    $president->id;
    $president->name;
    $president->lastName;
    $president->description;
    // ...
}
```

#### `paged`
Retrieves a paged list of presidents.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$presidents = $client->presidents()->paged(page: 1, pageSize: 10);

$presidents->page; // 1
$presidents->pageSize; // 10
$presidents->totalRecords; // number of records

// Returns a Paged object of President objects
foreach ($presidents->data as $president) {
    $president->id;
    $president->name;
    $president->lastName;
    $president->description;
    // ...
}
```

### Tourist Attraction Resource

#### `all`
Retrieves all touristic attractions in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$touristicAttractions = $client->touristAttractions()->all();

// Returns a Listed object of TouristicAttraction objects
foreach ($touristicAttractions->data as $touristicAttraction) {
    $touristicAttraction->id;
    $touristicAttraction->name;
    $touristicAttraction->description;
    $touristicAttraction->city; // City object
    // ...
}
```

#### `get`
Retrieves a touristic attraction by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$touristicAttraction = $client->touristAttractions()->get(1);

// Returns a TouristicAttraction object
$touristicAttraction->id;
$touristicAttraction->name;
$touristicAttraction->description;
$touristicAttraction->city; // City object
// ...
```

#### `getByName`
Retrieves a touristic attraction by its name.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$touristicAttraction = $client->touristAttractions()->getByName('Catedral de Sal de Zipaquirá');

// Returns a Listed object of TouristicAttraction objects
foreach ($touristicAttraction->data as $touristicAttraction) {
    $touristicAttraction->id;
    $touristicAttraction->name;
    $touristicAttraction->description;
    $touristicAttraction->city; // City object
    // ...
}
```

#### `search`
Searches for touristic attractions by the following fields: Name, Description,LastName,Latitude, Longitude

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$touristicAttractions = $client->touristAttractions()->search('Catedral de Sal de Zipaquirá');

// Returns a Listed object of TouristicAttraction objects
foreach ($touristicAttractions->data as $touristicAttraction) {
    $touristicAttraction->id;
    $touristicAttraction->name;
    $touristicAttraction->description;
    $touristicAttraction->city; // City object
    // ...
}
```

#### `paged`
Retrieves a paged list of touristic attractions.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$touristicAttractions = $client->touristAttractions()->paged(page: 1, pageSize: 10);

$touristicAttractions->page; // 1
$touristicAttractions->pageSize; // 10
$touristicAttractions->totalRecords; // number of records

// Returns a Paged object of TouristicAttraction objects
foreach ($touristicAttractions->data as $touristicAttraction) {
    $touristicAttraction->id;
    $touristicAttraction->name;
    $touristicAttraction->description;
    $touristicAttraction->city; // City object
    // ...
}
```

### Category Natural Area Resource

#### `all`
Retrieves all categories of natural areas in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$categoriesNaturalArea = $client->categoryNaturalAreas()->all();

// Returns a Listed object of CategoryNaturalArea objects
foreach ($categoriesNaturalArea->data as $categoryNaturalArea) {
    $categoryNaturalArea->id;
    $categoryNaturalArea->name;
    $categoryNaturalArea->description;
    $categoryNaturalArea->naturalAreas; // array of NaturalArea objects
    // ...
}
```

#### `get`
Retrieves a category of natural areas by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$categoryNaturalArea = $client->categoryNaturalAreas()->get(1);

// Returns a CategoryNaturalArea object
$categoryNaturalArea->id;
$categoryNaturalArea->name;
$categoryNaturalArea->description;
$categoryNaturalArea->naturalAreas; // array of NaturalArea objects
// ...
```

#### `naturalAreas`
Retrieves all natural areas of a category by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$naturalAreas = $client->categoryNaturalAreas()->naturalAreas(1);

// Returns a Listed object of NaturalArea objects
foreach ($naturalAreas->data as $naturalArea) {
    $naturalArea->id;
    $naturalArea->name;
    $naturalArea->categoryNaturalArea; // CategoryNaturalArea object
    // ...
}
```
### Natural Area Resource

#### `all`
Retrieves all natural areas in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$naturalAreas = $client->naturalAreas()->all();

// Returns a Listed object of NaturalArea objects
foreach ($naturalAreas->data as $naturalArea) {
    $naturalArea->id;
    $naturalArea->name;
    $naturalArea->categoryNaturalArea; // CategoryNaturalArea object
    // ...
}
```

#### `get`
Retrieves a natural area by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$naturalArea = $client->naturalAreas()->get(1);

// Returns a NaturalArea object
$naturalArea->id;
$naturalArea->name;
$naturalArea->categoryNaturalArea; // CategoryNaturalArea object
// ...
```

#### `getByName`
Retrieves a natural area by its name.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$naturalArea = $client->naturalAreas()->getByName('Parque Nacional Natural Tayrona');

// Returns a Listed object of NaturalArea objects
foreach ($naturalArea->data as $naturalArea) {
    $naturalArea->id;
    $naturalArea->name;
    $naturalArea->categoryNaturalArea; // CategoryNaturalArea object
    // ...
}
```

#### `search`
Searches for natural areas by the following fields: Name, Description,LastName,Latitude, Longitude

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$naturalAreas = $client->naturalAreas()->search('Parque Nacional Natural Tayrona');

// Returns a Listed object of NaturalArea objects
foreach ($naturalAreas->data as $naturalArea) {
    $naturalArea->id;
    $naturalArea->name;
    $naturalArea->categoryNaturalArea; // CategoryNaturalArea object
    // ...
}
```

#### `paged`
Retrieves a paged list of natural areas.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$naturalAreas = $client->naturalAreas()->paged(page: 1, pageSize: 10);

$naturalAreas->page; // 1
$naturalAreas->pageSize; // 10
$naturalAreas->totalRecords; // number of records

// Returns a Paged object of NaturalArea objects
foreach ($naturalAreas->data as $naturalArea) {
    $naturalArea->id;
    $naturalArea->name;
    $naturalArea->categoryNaturalArea; // CategoryNaturalArea object
    // ...
}
```

### Map Resource

#### `all`
Retrieves all maps in Colombia.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$maps = $client->maps()->all();

// Returns a Listed object of Map objects
foreach ($maps->data as $map) {
    $map->id;
    $map->name;
    $map->description;
    // ...
}
```

#### `get`
Retrieves a map by its id.

```php
use FelipeVa\ApiColombia\ApiColombia;

$client = ApiColombia::client();
$map = $client->maps()->get(1);

// Returns a Map object
$map->id;
$map->name;
$map->description;
// ...
```
