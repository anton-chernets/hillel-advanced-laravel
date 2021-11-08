<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'app_key' => env('GOOGLE_APIS_CUSTOM_SEARCH_SYSTEM_ID'),
        'api_secret_key' => env('GOOGLE_APIS_CUSTOM_SEARCH_API_KEY'),
        'api_url' => env('GOOGLE_APIS_CUSTOM_SEARCH_URL'),
        'api_uri' => env('GOOGLE_APIS_CUSTOM_SEARCH_URI'),
    ],

    'fake_json' => [
        'api_url' => env('JSON_FAKE_DATA_API_URL'),
    ]

];
