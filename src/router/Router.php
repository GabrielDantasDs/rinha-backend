<?php

namespace router;

use Closure;
use Exception;

class Router
{
    protected $routes = []; // stores routes

    /*
    * add routes to the $routes
    */
    public function addRoute(string $method, string $url, Closure $target)
    {
        if ($method == 'PUT' || $method == 'GET' || $method == 'DELETE') {
            $url_parts = explode('/', trim($url, '/'));
            $url = $url_parts[0];
        }


        $this->routes[$method][$url] = $target;
    }

    public function matchRoute()
    {
        try {
            $method = $_SERVER['REQUEST_METHOD'];
            $url = $_SERVER['REQUEST_URI'];
            $id = null;

            if (isset($this->routes[$method])) {
                foreach ($this->routes[$method] as $routeUrl => $target) {
                    // Simple string comparison to see if the route URL matches the requested URL
                    if ($method == 'PUT' || $method == 'GET' || $method == 'DELETE') {
                        $url_parts = explode('/', trim($url, '/'));
                        $id = $url_parts[1];
                        $url = $url_parts[0];
                    }

                    if ($routeUrl === $url) {
                        call_user_func($target, $id);
                    }
                }
            }
        } catch (Exception $e) {

            error_log($e->getMessage());
            return $e->getMessage();
        }
    }
}
