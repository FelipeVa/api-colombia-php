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
final class Country implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  string[]|null  $languages
     * @param  string[]|null  $borders
     * @param  string[]|null  $flags
     */
    public function __construct(
        public readonly int $id,
        public readonly int $surface,
        public readonly int $population,
        public readonly ?array $languages = null,
        public readonly ?string $name = null,
        public readonly ?string $description = null,
        public readonly ?string $stateCapital = null,
        public readonly ?string $timeZone = null,
        public readonly ?string $currency = null,
        public readonly ?string $currencyCode = null,
        public readonly ?string $currencySymbol = null,
        public readonly ?string $isoCode = null,
        public readonly ?string $internetDomain = null,
        public readonly ?string $phonePrefix = null,
        public readonly ?string $radioPrefix = null,
        public readonly ?string $aircraftPrefix = null,
        public readonly ?string $subRegion = null,
        public readonly ?string $region = null,
        public readonly ?array $borders = null,
        public readonly ?array $flags = null,
    ) {
    }

    public static function from(array $data): Country
    {
        return new self(...$data);
    }
}
