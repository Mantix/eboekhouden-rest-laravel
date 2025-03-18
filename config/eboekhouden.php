<?php

return [
    /*
    |--------------------------------------------------------------------------
    | E-Boekhouden API Token
    |--------------------------------------------------------------------------
    |
    | Your e-Boekhouden.nl API token. You can create one in your e-Boekhouden
    | account under Settings > API.
    |
    */
    'api_token' => env('EBOEKHOUDEN_API_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Source Identifier
    |--------------------------------------------------------------------------
    |
    | A short identifier (max 10 characters) to identify your application in
    | the e-Boekhouden API logs.
    |
    */
    'source' => env('EBOEKHOUDEN_SOURCE', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Guzzle HTTP Client Options
    |--------------------------------------------------------------------------
    |
    | Additional options to pass to the Guzzle HTTP Client.
    |
    */
    'client_options' => [
        'timeout' => 30,
    ],
];
