<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
    public function redirectToFacebook ()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback ()
    {
        $user = Socialite::driver('facebook')->user();
    }
}
