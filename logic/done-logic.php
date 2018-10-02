<?php
session_start();

if (!isset($_SESSION['template']) | !isset($_SESSION['results'])) {
    header('Location: index.php');
}

$results = $_SESSION['results'];

$doc = new DOMDocument();
$doc->loadHTMLFile('templates/'.$_SESSION["template"].'/'.$_SESSION["template"].'.html');

$xpath = new DOMXPath($doc);

foreach ($_SESSION['results'] as $key => $value) {
    $query = "//*[@class='".$key."']";
    $node = $xpath->query($query);

    foreach ($node as $item) {
        $item->nodeValue = $value;
    }
}

echo $doc->saveHTML();


session_unset();