<?php

return [
    'apiKey' => env('FLOW_API_KEY'),
    'secretKey' => env('FLOW_SECRET_KEY'),
    'url' => (env('APP_ENV') === 'local' ? env('FLOW_SANDBOX_URL') : env('FLOW_PRODUCTION_URL')),
];
