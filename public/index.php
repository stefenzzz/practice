<?php

declare(strict_types = 1);

use App\App;
use App\Contollers\ContactController;
use App\Contollers\HomeController;
use App\Contollers\OrderController;
use App\Exceptions\RouteNotFound;
use App\Exceptions\ViewNotFound;
use App\Router;
use PSpell\Config;

require_once __DIR__ . '/../vendor/autoload.php';
define('VIEWS_PATH',__DIR__.'/../Views');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



$router = new Router();

$router->get('/practice/public/',[HomeController::class,'index'])
        ->get('/practice/public/home/',[HomeController::class,'index'])
        ->get('/practice/public/contact/',[ContactController::class,'index'])
        ->get('/practice/public/order/',[OrderController::class,'order'])
        ->post('/practice/public/order/',[OrderController::class,'purchase']);



(new App($router))->boot()->run();


