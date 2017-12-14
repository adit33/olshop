<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1242340722563588',
        'client_secret' => '3df374cf2c48f406ed17fce8d4e57229',
        'redirect' => 'http://localhost/olshop/public/social-media/registered/facebook',
    ],
    'github' => [
        'client_id'=>'8b7a4b65d389912b1e75',
        'client_secret'=>'fb95e624eea9627a373dba61b7b051a050ecb559',
        'redirect'=>'http://localhost/olshop/public/social-media/registered/github',
    ]

];
