<?php
return [
    /*
    |--------------------------------------------------------------------------
    | OFFICEGEST SEND SMS CONNECTION
    |--------------------------------------------------------------------------
    |
    */

    'is_active' => env('OFFICEGEST_SMS_ACTIVE', false),

    /*
    |--------------------------------------------------------------------------
    | OFFICEGEST SEND SMS CONNECTION
    |--------------------------------------------------------------------------
    |
    */

    'url' => env('OFFICEGEST_SMS_URL', ''),
    'user' => env('OFFICEGEST_SMS_USER', ''),
    'api_key' => env('OFFICEGEST_SMS_KEY', ''),
];
