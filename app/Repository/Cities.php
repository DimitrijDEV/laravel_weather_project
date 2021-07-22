<?php

namespace App\Repository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class Cities
{
    const CACHE_KEY = "cities";

    public static function all()
    {
        ini_set("memory_limit", "500M");
        $key = "all";
        $cacheKey = self::getCacheKey($key);
        $path = storage_path() . "\json\cities.json";

        return Cache::remember(
            $cacheKey,
            now()->addMinutes(10),
            fn () => json_decode(file_get_contents($path), true)
        );
    }

    public static function get(int $id)
    {
        $cities = self::all();
        $foundCity = Arr::first($cities, fn ($city) => $city['id'] === $id);

        return $foundCity;
    }

    public static function find($cityName): array
    {
        $cities = self::all();
        $citiesForSelection = array_filter(
            $cities,
            fn ($city) => self::compareStrings($city['name'], $cityName)
        );

        return $citiesForSelection;
    }

    private static function compareStrings($cityName, $searchedCity)
    {
        return Str::contains(
            strtolower($cityName),
            strtolower($searchedCity)
        );
    }

    private static function getCacheKey($key)
    {
        $key = strtolower($key);
        return self::CACHE_KEY . ".$key";
    }
}
