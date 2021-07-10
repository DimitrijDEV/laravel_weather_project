<?php

namespace App\Http\Controllers;

use App\Repository\Cities;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('profile.home', [
            'cities' => [],
            'city' => null,
            'weather' => null
        ]);
    }


    public function cities(Request $request)
    {
        $request->validate(['city' => 'bail|required|min:3|max:50']);

        $cities = Cities::find($request->city);

        return  view('profile.home', [
            'cities' => $cities,
            'city' =>  null,
            'weather' => null
        ]);
    }

    public function weather(Request $request)
    {
        $id = (int) $request->id;
        $city = Cities::get($id);
        $weatherJson = file_get_contents($this->getApiUrl($city));
        $weather = json_decode($weatherJson);

        return view('profile.home', [
            'cities' => [],
            'city' => $city,
            'weather' => $weather
        ]);
    }

    public function getApiUrl($city)
    {
        $location = 'https://api.openweathermap.org/data/2.5/onecall';
        $url = $location . '?lat=' . $city['coord']['lat'] . '&lon=' . $city['coord']['lon'] . '&exclude=' . '&appid=' . env('OWM_KEY');
        return $url;
    }
}
