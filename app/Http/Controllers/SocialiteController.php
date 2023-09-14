<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // Redirecciona de la app web a facebook para autorizar el acceso a los datos del usuario
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    // Redirección de facebook a la app web una vez autorizado el acceso a los datos del usuario
    public function callback() {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::updateOrCreate([
            'facebook_id' => $facebookUser->id,
        ], [
            'name'        => $facebookUser->name,
            'email'       => $facebookUser->email,
        ]);

        auth()->login($user); // Forma alternativa de hacer login con helper

        return redirect()->to('/dashboard');
    }
}
