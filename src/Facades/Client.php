<?php

namespace Alexaandrov\GraphQL\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alexaandrov\GraphQL\Client
 * @method static Client fetch(string $query, array $variables = []): \EUAutomation\GraphQL\Response
 */
class Client extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Alexaandrov\GraphQL\Client::class;
    }
}
