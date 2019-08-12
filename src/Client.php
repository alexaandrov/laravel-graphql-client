<?php

namespace Alexaandrov\GraphQL;

use Illuminate\Support\Facades\Request;

class Client
{
    protected $client;

    public function __construct()
    {
        $config = config('graphql-client');

        $this->client = new \EUAutomation\GraphQL\Client($config['endpoint']);
    }

    public function fetch(string $query, array $variables = []): \EUAutomation\GraphQL\Response
    {
        return $this->client->response($query, $variables, $this->getHeaders());
    }

    protected function getHeaders()
    {
        $options = [];

        if ($authorization = Request::header('Authorization')) {
            $options['Authorization'] = $authorization;
        }

        if ($requestId = Request::header('X-Request-Id')) {
            $options['RequestId'] = $requestId;
        }

        return $options;
    }
}
