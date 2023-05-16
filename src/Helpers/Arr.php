<?php

namespace FelipeVa\ApiColombia\Helpers;

class Arr
{
    /**
     * @template TKey of array-key
     * @template TValue
     *
     * @param  array<TKey, TValue>  $array
     * @return array<TKey, TValue>
     */
    public static function purgeNull(array $array): array
    {
        return array_filter($array, fn ($value): bool => ! is_null($value));
    }

    /**
     * @template TKey of array-key
     * @template TValue
     *
     * @param  array<TKey, TValue>  $array
     * @return array<TKey, TValue>
     */
    public static function purgeDeepNull(array $array): array
    {
        return array_filter($array, fn ($value): array|bool => is_array($value) ? self::purgeDeepNull($value) : ! is_null($value));
    }
}
