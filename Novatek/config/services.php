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
    'facebook' => [
        'client_id' => '662759568475752',  //client face của bạn
        'client_secret' => '54941630f6dcbc072567f85936a29fac',  //client app service face của bạn
        'redirect' => 'http://localhost:8080/Novatek-2/Novatek/public/login-facebook/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '150058074678-jqkiu86ij6sbq4p09r16m4camg7rlmd5.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8080/Novatek-2/Novatek/public/login-google/callback'
    ],

];
