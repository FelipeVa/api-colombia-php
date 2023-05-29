<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Objects\Country;
use FelipeVa\ApiColombia\Requests\Country\GetCountryRequest;

class CountryResource extends Resource
{
    /**
     * @param string $country
     * @return mixed|Country
     */
    public function get(string $country): mixed
    {
        return $this->connector->send(new GetCountryRequest($country))->dto();
    }
}
