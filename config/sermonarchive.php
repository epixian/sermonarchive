<?php

return [

    'breeze_api_key' => env('BREEZE_API_KEY'),
    'breeze_api_url' => 'https://' . env('BREEZE_SUBDOMAIN') . '.breezechms.com/api',
    'breeze_email_profile_field' => env('BREEZE_EMAIL_PROFILE_FIELD'),

    'prayer_request_name' => env('PRAYER_REQUEST_NAME', 'Prayer Request Recipient'),
    'prayer_request_email' => env('PRAYER_REQUEST_EMAIL', 'mail@example.com'),

    'event_timezone' => env('TIMEZONE', 'America/New_York'),

];
