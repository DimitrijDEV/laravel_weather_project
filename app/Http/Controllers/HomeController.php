<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public $citiesForSelection = [];


    public function extract_cities()
    {
        ini_set('memory_limit', '500M');

        $path = storage_path() . "\json\cities.json";
        session(['cities' => json_decode(file_get_contents($path), true)]);

        dd(session()->has('cities'));
    }


    public function index()
    {
        return view('profile.home', ['cities' => []]);
    }


    public function cities(Request $request)
    {
        $validated = $request->validate(['city' => 'required|min:3|max:50']);


        $this->extract_cities($request);
        if ($request->session()->has('cities')) {
            $this->extract_cities($request);
        }

        // if ($validated) {
        //     $cities = $request->session()->get('cities');

        //     foreach ($cities as $city) {
        //         if (Str::contains($city['name'], $request->city)) {
        //             array_push($this->citiesForSelection, $city);
        //         }
        //     }
        // }

        // return  view('profile.home', ['cities' => $this->citiesForSelection]);
    }

    public function weather(Request $request)
    {
    }
}
