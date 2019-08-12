<?php

namespace Alexaandrov\GraphQL;

use Illuminate\Support\ServiceProvider;

class GraphQLClientServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('graphql-client.php')
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'graphql-client');
        $this->app->singleton(Client::class);
    }
}
