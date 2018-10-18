<?php

namespace App\Classes;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class InstagramAPI{

    private $guzzleClient;
    private $clientID;
    private $clientSecret;
    private $redirectURI;
    private $access_token;
    private $authorization_code;

    public function __construct($authorization_code)
    {
        $this->authorization_code = $authorization_code;

        $this->guzzleClient = new \GuzzleHttp\Client;
        $this->clientID = env('INSTAGRAM_CLIENT_ID');
        $this->clientSecret = env('INSTAGRAM_CLIENT_SECRET');
        $this->redirectURI = env('INSTAGRAM_REDIRECT_URI');
    }


    public function setAccessToken($token){
        $this->access_token = $token;
    }

    public function getInstagramAccessTokenAndPosts()
    {
        try {
            $response = $this->guzzleClient->post('https://api.instagram.com/oauth/access_token', [
                'form_params' => [
                     'client_id' => $this->clientID,
                     'client_secret' => $this->clientSecret,
                     'grant_type' => 'authorization_code',
                     'redirect_uri' => $this->redirectURI,
                     'code' => $this->authorization_code
                ]
               ]);
        } catch (RequestException $e) {
            echo json_decode($e->getResponse()->getBody()->getContents(), true)['error_message'];
        } catch (ClientException $e) {
            echo json_decode($e->getResponse()->getBody()->getContents(), true)['error_message'];
        }

        $tokenPackge = json_decode($response->getBody()->getContents());

        $this->setAccessToken($tokenPackge->access_token);

        return $this->getPosts();
    }

    public function getPosts()
    {
        $response = $this->guzzleClient->get('https://api.instagram.com/v1/users/self/media/recent', [
            'query' => [
                'count' => 10,
                'access_token' => $this->access_token
            ]
        ]);

        return $posts = json_decode($response->getBody()->getContents())->data;
    }
}
