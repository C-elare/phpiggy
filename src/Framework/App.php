<?php
// Enable strict type checking to ensure type safety
declare(strict_types=1);

// Declare the namespace to organize the code and enable autoloading
namespace Framework;

/**
 * App Class
 *
 * The main application class that acts as the central entry point.
 * It initializes the Router and dispatches the appropriate route.
 */
class App
{
    /**
     * @var Router The router instance responsible for handling HTTP routes.
     */
    private Router $router;

    /**
     * Constructor
     *
     * Initializes the App by creating a new Router instance.
     */
    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * Run the Application
     *
     * Retrieves the path and HTTP method from the global $_SERVER array,
     * and then delegates the request to the router for dispatching.
     */
    public function run(): void
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method);
    }

    /**
     * Register a GET Route
     *
     * Adds a new GET route to the router for handling.
     *
     * @param string $path The URI path for this route.
     * @param array $controller The controller and method to handle this route.
     */
    public function get(string $path, array $controller): void
    {
        $this->router->add('GET', $path, $controller);
    }
}
