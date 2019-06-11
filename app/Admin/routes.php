<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'Index@index')->name('admin.home');
    $router->resource('profiles', 'Profile')->names('admin.profiles');
    $router->resource('tags', 'Tag')->names('admin.tags');
    $router->resource('profile_tags', 'ProfileTag')->names('admin.profile_tags');

});
