<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\Country;
use FelipeVa\ApiColombia\Requests\Country\GetCountryRequest;

final class CountryResource extends Resource
{
    /**
     * @return mixed|Country
     */
    public function get(string $country): mixed
    {
        return $this->connector->send(new GetCountryRequest($country))->dto();
    }
}
