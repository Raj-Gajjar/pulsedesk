<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Pest\Support\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {

        try{

            $credentials = $request->only('email', 'password');
            
            if (! Auth::attempt($credentials, $request->boolean('remember'))){

                 return back()
                    ->withErrors(['email' => 'Invalid email or password.',])
                    ->onlyInput('email');
            }

            $request->session()->regenerate();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Welcome back!');


        }catch (\Throwable $e){

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while logging in.');

        }

    }

    public function register()
    {
        return view('auth.register');
    }


    public function store(RegisterRequest $request)
    {
        try {

            DB::transaction(function () use ($request) {

                User::create([

                    'name' => $request->name,

                    'email' => $request->email,

                    'password' => Hash::make($request->password),

                ]);

            });

            return redirect()
                ->route('login')
                ->with('success', 'Account created successfully. Please login.');

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while creating your account.');
        }
    }

    public function logout(Request $request)
    {
        try {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->with('success', 'You have been logged out successfully.');

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->with('error', 'Something went wrong while logging out.');
        }
    }

}
