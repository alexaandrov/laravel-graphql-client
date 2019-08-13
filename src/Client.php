<?php

namespace Alexaandrov\GraphQL;

use Illuminate\Support\Facades\Request;

class Client
{
    protected $client;
    protected $config;

    public function __construct()
    {
        $this->config = config('graphql-client');

        $this->client = new \EUAutomation\GraphQL\Client($this->config['endpoint_url']);
    }

    public function fetch(string $query, array $variables = []): \EUAutomation\GraphQL\Response
    {
        return $this->client->response($query, $variables, $this->getHeaders());
    }

    protected function getHeaders()
    {
        $headers = [];

        if ($authorization = Request::header('Authorization')) {
            $headers['Authorization'] = $authorization;
        }

        if ($requestId = Request::header('X-Request-Id')) {
            $headers['X-Request-Id'] = $requestId;
        }

        foreach ($this->config['headers'] as $name => $value) {
            if (!empty($value)) {
                $headers[$name] = $value;
            }
        }

        return $headers;
    }
}
