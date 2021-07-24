<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    /**
     * Display a register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Create a new user in a database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(CreateNewUserRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
          
            User::create([
                "name" => $request->username,
                "email" => $request->email,
                "password" => Hash::make($request->password, ['rounds' => 12]),
                "created_at" => now()
            ]);

            return redirect()->route('auth.login');
        }
    }
}

 