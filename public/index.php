<?php
// Include helper functions
include __DIR__ . "/../src/App/functions.php";

// Include and get the app instance
$app = include __DIR__ . "/../src/App/bootstrap.php";

// Run the application
$app->run();
