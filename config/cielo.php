<?php

return [
    'merchant_id'  => env('CIELO_ID', 'default_id'),

    'merchant_key' => env('CIELO_KEY', 'default_key'),

    'environment'  => env('CIELO_ENV', 'sandbox'),
];
