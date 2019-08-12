# Laravel GraphQL Client

Wrapper over [euautomation/graphql-client](https://github.com/euautomation/graphql-client) library for laravel/lumen.

## Installation

You can install the package via composer:

```
composer require alexaandrov/laravel-graphql-client
```

Set endpoint url in your .env

```
ENDPOINT_URL=https://your-endpoint.url
```

## For laravel:

```
php artisan vendor:publish --provider="Alexaandrov\GraphQL\GraphQLClientServiceProvider" 
```

## For lumen:

Copy and setting up config:

```
cp vendor/alexaandrov/laravel-graphql-client/config/config.php config/graphql-client.php
```

Add to `bootstrap/app.php`

```
$app->configure('graphql-client');
$app->register(Alexaandrov\GraphQL\GraphQLClientServiceProvider::class);
```

## Usage

### Code
```php
<?php

$guery = <<<QUERY
query {
    users {
        id
        email
    }
}
QUERY;

$mutation = <<<MUTATION
mutation {
    login(data: {
        username: "user@mail.com"
        password: "qwerty"
    }) {
        access_token
        refresh_token
        expires_in
        token_type
    }
}
MUTATION;

$queryResponse = Alexaandrov\GraphQL\Facades\Client::fetch($query);
foreach ($queryResponse->users as $user) {
    // Do something with the data
    $user->id;
    $user->email;
}

$mutationResponse = Alexaandrov\GraphQL\Facades\Client::fetch($mutation);

// Do something with the data
$login = $mutationResponse->login;
$login->access_token;
$login->...;
```
