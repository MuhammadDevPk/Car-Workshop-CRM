<?php

// 1: Load Autoloader

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Request;

// 2: Initialize the Engine
$router = new Router();
$request = new Request();

// 3: Load the Route Definitions
require_once __DIR__ . '/../routes/web.php';

// 4: Run the Router
$router->resolve($request);