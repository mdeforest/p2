<?php

session_start();

$form = $_SESSION['form'] ?? [];
$errors = $_SESSION['errors'] ?? [];

/* *
 * Get the error message corresponding to the field
 */
function getError($pattern, array $errors)
{
    $matchArray = preg_grep($pattern, $errors);
    $match = array_shift($matchArray);

    return $match ?? '';
}