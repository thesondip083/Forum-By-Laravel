<?php
use App\User;


/*Remember this file comes after running the command php artisan eloquent-oauth:install
from https://github.com/adamwathan/eloquent-oauth-l5  sondip
*/
return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/facebook/redirect',
            'scope' => [],
        ],
        'google' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/google/redirect',
            'scope' => [],
        ],
        'github' => [
            'client_id' => 'fe7af6919d19b3c0e602', //from github settings->developer
            'client_secret' => '3da3ea84fed4eb92c6d2bfeafdcc055500566915',
            'redirect_uri' => 'http://localhost:8000/github/redirect',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '81scntcvhrf1nj',//from linked in
            'client_secret' => '9QBqhN6k1oV3Hxiw',
            'redirect_uri' => 'http://localhost:8000/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];
