<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        $registerUser = User::where('google_id', $socialUser->id)->first();

        if (!$registerUser) {
            $user = User::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => Hash::make('123'),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);

            Auth::login($user);

            if($user->role === 'admin'){
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('home');
            }
           
        }

        Auth::login($registerUser);

        if($registerUser->role === 'admin'){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('home');
        }
    }
}
