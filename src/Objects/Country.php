<?php

namespace FelipeVa\ApiColombia\Objects;

use FelipeVa\ApiColombia\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-type CountryData array{id: int, name: string|null, description: string|null, stateCapital: string|null, surface: int, population: int, languages: array<int, string>|null, timeZone: string|null, currency: string|null, currencyCode: string|null, currencySymbol: string|null, isoCode: string|null, internetDomain: string|null, phonePrefix: string|null, radioPrefix: string|null, aircraftPrefix: string|null, subRegion: string|null, region: string|null, borders: array<int, string>|null, flags: array<int,string>|null}
 *
 * @implements DataTransferObject<CountryData>
 */
class Country implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  string[]|null  $languages
     * @param  string[]|null  $borders
     * @param  string[]|null  $flags
     */
    public function __construct(
        public int $id,
        public int $surface,
        public int $population,
        public ?array $languages = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $stateCapital = null,
        public ?string $timeZone = null,
        public ?string $currency = null,
        public ?string $currencyCode = null,
        public ?string $currencySymbol = null,
        public ?string $isoCode = null,
        public ?string $internetDomain = null,
        public ?string $phonePrefix = null,
        public ?string $radioPrefix = null,
        public ?string $aircraftPrefix = null,
        public ?string $subRegion = null,
        public ?string $region = null,
        public ?array $borders = null,
        public ?array $flags = null,
    ) {
    }

    public static function from(array $data): Country
    {
        return new self(...$data);
    }
}
