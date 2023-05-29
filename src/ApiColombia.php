<?php

namespace FelipeVa\ApiColombia;

final class ApiColombia
{
    public static function client(string $apiVersion = 'v1'): Factory
    {
        return self::factory()->withApiVersion($apiVersion);
    }

    public static function factory(): Factory
    {
        return new Factory();
    }
}
