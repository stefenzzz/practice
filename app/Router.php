<?php

declare(strict_types = 1);

namespace App;

use App\Exceptions\RouteNotFound;
use Exception;

/**
 * This class is for routing
 * 
 */
class Router
{

    private array $routes = [];

    public function register(string $method, string $uri,array $action):Router
    {
        $this->routes[$method][$uri] = $action;
        return $this;
    }
    
    public function getRoutes():array
    {
        return $this->routes;
    }

    public function resolve()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $action = $this->routes[$method][$uri] ?? null;

        if($action === null)
        {
            throw new RouteNotFound('404 not found');
        }
        [$class,$method] = $this->routes[$method][$uri];

        return call_user_func([new $class, $method]);
      
    }
    public function get($uri,$action):Router
    {
        $this->register('GET',$uri,$action);

        return $this;
    }
    public function post($uri,$action):Router
    {
        $this->register('POST',$uri,$action);

        return $this;
    }
}