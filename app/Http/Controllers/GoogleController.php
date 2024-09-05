<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use Exception;
class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->route('welcome');
            }else{
                $newUser = User::create([
                    'first_name' => $user->user['given_name'],
                    'last_name' => $user->user['family_name'],
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'email_verified_at' => now(),
                    'role_id' => 2,
                    'is_google_user' => true,
                    'password' => Str::random(100),
                ]);
                Auth::login($newUser);
                return redirect()->route('welcome');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('dashboard');
        }
    }
}
