<?php

$router->get('/', function () {
    echo "Welcome to the Workshop Dashboard!";
});

$router->get('/customers', 'CustomersController@index');