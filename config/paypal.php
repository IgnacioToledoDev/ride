<?php

return [
    'clientId' => env('VITE_PAYPAL_CLIENT_ID'),
    'secretKey' => env('VITE_PAYPAL_SECRET_KEY'),
    'url' => (env('APP_ENV') === 'local'
        ? env('VITE_PAYPAL_SANDBOX_URL')
        : env('VITE_PAYPAL_PROD_URL')),
];
