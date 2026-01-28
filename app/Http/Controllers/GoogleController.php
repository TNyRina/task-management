<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();

    }

    public function callback()
    {

        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->getEmail())->first();

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name'       => $googleUser->getName(),
                'google_id'  => $googleUser->getId(),
                'avatar'     => $googleUser->getAvatar(),
                'provider'   => 'google',
                'password'   => bcrypt(Str::random(16)),
            ]
        );
        
        Auth::login($user);

        return view('Projects.index',[
            'user' => Auth::user()
        ]);
    }
}
