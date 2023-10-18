<?php
// Enable strict type checking
declare(strict_types=1);

// Declare the namespace for this class
namespace Framework;

/**
 * Router Class
 *
 * Manages HTTP routes and dispatches them to the appropriate controllers.
 */
class Router
{
    /**
     * @var array An array holding all the registered routes
     */
    private array $routes = [];

    /**
     * Add a Route
     *
     * Registers a new route with the router.
     *
     * @param string $method The HTTP method for this route
     * @param string $path The path for this route
     * @param array $controller The controller and method to invoke
     */
    public function add(string $method, string $path, array $controller): void
    {
        $path = $this->normalizePath($path);
        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    /**
     * Normalize Path
     *
     * Cleans up the path string to ensure uniformity.
     *
     * @param string $path The original path string
     * @return string The normalized path string
     */
    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }

    /**
     * Dispatch Route
     *
     * Finds the matching route and invokes its controller method.
     *
     * @param string $path The requested path
     * @param string $method The HTTP method of the request
     */
    public function dispatch(string $path, string $method): void
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (!preg_match("#^{$route['path']}$#", $path) || $route['method'] !== $method) {
                continue;
            }
            [$class, $function] = $route['controller'];
            $controllerInstance = new $class;
            $controllerInstance->{$function}();
        }
    }
}
