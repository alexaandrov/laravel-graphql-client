<?php

return [
    'endpoint_url' => env('GRAPHQL_ENDPOINT_URL'),
    'headers' => [
        'X-Service-Name' => env('APP_NAME'),
        'X-Request-Secret' => env('APP_KEY')
    ]
];
