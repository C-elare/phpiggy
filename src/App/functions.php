<?php
// Enable strict type checking
declare(strict_types=1);

/**
 * Dump and Die
 *
 * Utility function to dump the value and stop the script execution.
 *
 * @param mixed $value The value to dump
 */
function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
