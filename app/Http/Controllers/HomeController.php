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
        $validated = $request->validate(['id' => 'required|integer']);

        if ($validated) {
            $id = (int) $validated['id'];
            $city = Cities::get($id);
            $weather = $this->getWeatherData($city);

            return view('profile.home', [
                'cities' => [],
                'city' => $city,
                'weather' => $weather
            ]);
        }

        abort(404);
    }

    private function getWeatherData($city)
    {
        $weatherJson = file_get_contents($this->getApiUrl($city));
        return json_decode($weatherJson);
    }

    private function getApiUrl($city)
    {
        $location = 'https://api.openweathermap.org/data/2.5/onecall';
        $url = $location . '?lat=' . $city['coord']['lat'] . '&lon=' . $city['coord']['lon'] . '&exclude=' . '&appid=' . env('OWM_KEY');
        return $url;
    }
}
