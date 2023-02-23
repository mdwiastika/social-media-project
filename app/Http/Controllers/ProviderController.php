<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callbackProvider($provider): RedirectResponse
    {
        try {
            $provider_user = Socialite::driver($provider)->user();
            $get_user = User::where('provider_id', $provider_user->getId())->first();
            $get_duplicate_email = User::where('email', $provider_user->getEmail())->first();
            if ($get_user) {
                Auth::login($get_user);

                return redirect()->intended('/feed');
            } else {
                if (!$get_duplicate_email) {
                    $create_user = User::create([
                        'name' => $provider_user->getName(),
                        'username' => $provider_user->getEmail(),
                        'email' => $provider_user->getEmail(),
                        'provider_id' => $provider_user->getId(),
                        'role' => 'user',
                        'provider' => $provider,
                    ]);
                    Auth::login($create_user);
                } else {
                    $get_duplicate_email->update([
                        'provider_id' => $provider_user->getId(),
                        'provider' => $provider,
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
