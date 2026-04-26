<?php

// Load Autoloader

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Request;

// 2: Initialize the Engine
$router = new Router();
$request = new Request();

require_once __DIR__ . '/../routes/web.php';
// 3: Load the Route Definitions

// 4: Run the Router
$router->resolve($request);