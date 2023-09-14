<?php

namespace App\Http\Controllers;

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
        $user = Socialite::driver('facebook')->user();

        dd($user);
    }
}
