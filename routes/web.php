<?php

use Illuminate\Support\Facades\Route;

$router->get('/', function () use ($router) {
    echo "Sushiarigato API Services";
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

$router->group([
    'prefix' => 'api'
], function ($router) {
    $router->get('/healthcheck', function () use ($router) {
        echo "Sushiarigato API Services";
    });
    $router->group([
        'prefix' => 'v1'
    ], function ($router) {
        $router->post('register', 'AuthController@register');
        $router->post('login', 'AuthController@login');
        $router->post('logout', 'AuthController@logout');

        $router->get('users', 'UserController@get_by_id');

        $router->get('products', 'ProductController@get');
        $router->get('products/{id}', 'ProductController@get_by_id');
        $router->post('products', 'ProductController@insert');
        $router->put('products/{id}', 'ProductController@update');
        $router->delete('products/{id}', 'ProductController@delete');

        $router->get('categories', 'CategoryController@get');

        $router->get('carts', 'CartController@get');
        $router->post('carts', 'CartController@insert');
        $router->put('carts/{id}', 'CartController@update');
        $router->delete('carts/{id}', 'CartController@delete');
    });
});
