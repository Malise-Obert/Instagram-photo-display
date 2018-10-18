<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use App\Facades\Instagram;
use Illuminate\Http\Request;
use App\Classes\InstagramAPI;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class InstagramController extends Controller
{
    public function redirectToInstagramAuthorization()
    {
       return redirect($this->instagramAuthRedict());
    }

    public function handleInstagramCallback()
    {
        $instagram = new InstagramAPI($_GET['code']);
        $response = $instagram->getInstagramAccessTokenAndPosts();


        return view('welcome', ['posts' => $response]);
    }

    public function instagramAuthRedict()
    {
        $clientID = env('INSTAGRAM_CLIENT_ID');
        $redirectURI = env('INSTAGRAM_REDIRECT_URI');

        return $url = "https://api.instagram.com/oauth/authorize/?client_id={$clientID}&redirect_uri={$redirectURI}&response_type=code";

    }
}
