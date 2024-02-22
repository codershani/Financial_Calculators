<?php

namespace app\core;
use app\core\exception\NotFoundException;


/**
 * Summary of Router
 * @author CoderShani
 * @package app\core
 * @copyright (c) 2024
 */
class Router
{
    public Request $request;
    public Response $response;
    protected array $routeMap = [];
    protected $currentGroup = '';

    /**
     * Summary of __construct
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Summary of group
     * @param mixed $prefix
     * @param mixed $callback
     * @return void
     */
    public function group($prefix, $callback) {
        $parentGroup = $this->currentGroup;
        $this->currentGroup .= '/' . trim($prefix, '/');

        $callback($this);

        $this->currentGroup = $parentGroup;
    }

    /**
     * Summary of get
     * @param mixed $path
     * @param mixed $callback
     * @return void
     */
    public function get($path, $callback) {
        $path = $this->currentGroup ? $this->currentGroup . $path : $path;
        $this->routeMap['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $path = $this->currentGroup ? $this->currentGroup . $path : $path;
        $this->routeMap['post'][$path] = $callback;
    }

    public function getRouteMap($method) {
        return $this->routeMap[$method] ?? [];
        ;
    }

    /**
     * Summary of getCallback
     * @return mixed
     */
    public function getCallback() {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();

        // trim slashes
        $url = trim($url, '/');

        // Set all routes for current request method
        $routes = $this->getRouteMap($method);

        $routeParams = false;

        // Start iterating registered routes
        foreach($routes as $route => $callback) {
            /// Trim slashes
            $route = trim($route, '/');
            $routeNames = [];

            if (!$route) {
                continue;
            }

            // Find all route names from the routes and save in $routeNames
            if (preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches)) {
                $routeNames = $matches[1];
            }


            // Convert route name into regex pattern
            $routeRegex = "@^" . preg_replace_callback('/\{(\w+)(:([^}]+))?}/', function($m) {
                $paramPattern = isset($m[3]) ? "({$m[3]})" : '([\w-]+)';
                return "(?P<{$m[1]}>{$paramPattern})";
            }, $route) . "$@";

            // Test and match current route against $routeRegex
            if (preg_match($routeRegex, $url, $matches)) {
                $routeParams = array_filter($matches, function($key) {
                    return is_string($key);
                }, ARRAY_FILTER_USE_KEY);

                $this->request->setRouteParams($routeParams);
                return $callback;
            }

        }
        
        return false;

    }

    /**
     * Summary of resolve
     * @return mixed
     */
    public function resolve() 
    {
        $path = $this->request->getUrl();
        $method = $this->request->getMethod();
        $callback = $this->routeMap[$method][$path] ?? false;

        if (!$callback) {

            $callback = $this->getCallback();

            if ($callback === false) {
                throw new NotFoundException();
            }
        }

        if(is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }

        if(is_array($callback)) {
            /** @var \app\core\Controller $controller */
            $controller = new $callback[0];
            $controller->action = $callback[1];
            Application::$app->controller = $controller;
            $middlewares = $controller->getMiddlewares();
            
            foreach($middlewares as $middleware) {
                $middleware->execute();
            }
            $callback[0] = $controller;
        }
        return call_user_func($callback, $this->request, $this->response);
    }
    
}