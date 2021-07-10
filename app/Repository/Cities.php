<?php

namespace App\Repository;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Cities
{
    const CACHE_KEY = "cities";

    public static function all()
    {
        $key = "all";
        $cacheKey = self::getCacheKey($key);

        return Cache::remember($cacheKey, now()->addMinutes(10), function () {
            ini_set("memory_limit", "500M");
            $path = storage_path() . "\json\cities.json";
            return json_decode(file_get_contents($path), true);
        });
    }

    public static function get(int $id)
    {
        ini_set("memory_limit", "500M");
        $cities = self::all();
        $foundCity = null;

        foreach ($cities as $city) {
            if ($city['id'] === $id) {
                $foundCity = $city;
                break;
            }
        }

        return $foundCity;
    }

    public static function find($name): array
    {
        ini_set("memory_limit", "500M");
        $cities = self::all();
        $citiesForSelection = [];

        foreach ($cities as $city) {
            if (Str::contains(strtolower($city['name']), strtolower($name))) {
                array_push($citiesForSelection, $city);
            }
        }

        return $citiesForSelection;
    }

    public static function getCacheKey($key)
    {
        $key = strtolower($key);

        return self::CACHE_KEY . ".$key";
    }
}
