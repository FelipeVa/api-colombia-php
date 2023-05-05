<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\Country\GetCountryRequest;
use Saloon\Contracts\Response;

class CountryResource extends Resource
{
    public function get(string $country): Response
    {
        return $this->connector->send(new GetCountryRequest($country));
    }
}
