<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $get_user = User::where('google_id', $google_user->getId())->first();
            $get_duplicate_email = User::where('email', $google_user->getEmail())->first();
            if ($get_user) {
                Auth::login($get_user);

                return redirect()->intended('/feed');
            } else {
                if (! $get_duplicate_email) {
                    $create_user = User::create([
                        'name' => $google_user->getName(),
                        'username' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                        'role' => 'user',
                    ]);
                    Auth::login($create_user);
                } else {
                    $get_duplicate_email->update([
                        'google_id' => $google_user->getId(),
                    ]);
                    Auth::login($get_duplicate_email);
                }

                return redirect()->intended('/feed');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
