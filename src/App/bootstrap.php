<?php
// Enable strict type checking
declare(strict_types=1);

// Require Composer's autoloader
require __DIR__ . "/../../vendor/autoload.php";

// Import relevant classes
use Framework\App;
use App\Controllers\HomeController;

// Initialize the App class
$app = new App();

// Register a GET route for the home page
$app->get('/', [HomeController::class, 'home']);

// Return the app instance for further configuration
return $app;
