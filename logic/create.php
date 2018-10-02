<?php
session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$template = $_POST['template'];

$_SESSION['results'] = [
    'firstName' => $firstName,
    'lastName' => $lastName,
];

$_SESSION['template'] = $template;

header('Location: done.php');

?>

