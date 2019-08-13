<?php

return [
    'endpoint_url' => env('GRAPHQL_ENDPOINT_URL'),
    'headers' => [
        'X-Request-Secret' => env('GRAPHQL_REQUEST_SECRET'),
        'X-Service-Name' => env('APP_NAME')
    ]
];
