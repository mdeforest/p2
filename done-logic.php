<?php
session_start();

if (!isset($_SESSION['results'])) {
    header('Location: index.php');
}

$results = $_SESSION['results'];

$doc = new DOMDocument();
$doc->loadHTMLFile('templates/'.$results["template"].'/'.$results["template"].'.html');

$xpath = new DOMXPath($doc);
$query = "//span[@class='firstName']";

$node = $xpath->query($query)->item(0);
$node->nodeValue = "test";

var_dump($node->nodeValue);


session_unset();