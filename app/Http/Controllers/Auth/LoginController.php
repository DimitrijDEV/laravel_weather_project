<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginUserRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            if (Auth::attempt($validated)) {
                $request->session()->regenerate();

                return redirect()->intended('home');
            }
        }
        
        return back();
    }
}
