<?php

use Dompdf\Dompdf;

session_start();

// Return to index if the template, results, our output are not set in _SESSION
if (!isset($_SESSION['template']) | !isset($_SESSION['results']) | !isset($_SESSION['output'])) {
    header('Location: index.php');
}

// Necessary to make experience or education an empty list instead of unset
if (!isset($_SESSION['experience'])) {
    $experience = [];
} else {
    $experience = $_SESSION['experience'];
}

if (!isset($_SESSION['education'])) {
    $education = [];
} else {
    $education = $_SESSION['education'];
}

$results = $_SESSION['results'];
$output = $_SESSION['output'];

// Fill out template using XPath notation
$doc = new DOMDocument();
$doc->loadHTMLFile('templates/' . $_SESSION["template"] . '/' . $_SESSION["template"] . '.html');

$xpath = new DOMXPath($doc);

foreach ($results as $key => $value) {
    $query = "//*[contains(concat(' ',normalize-space(@class),' '),' " . $key . " ') and not(ancestor-or-self::*[@data-category='experience']) and not(ancestor-or-self::*[@data-category='education'])]";
    $node = $xpath->query($query);

    foreach ($node as $item) {
        $item->nodeValue = $value;
    }
}

if (count($experience) == 0) {
    $query = "//div[@data-category='experience']";
    $node = $xpath->query($query);

    foreach ($node as $item) {
        $oldNode = $item->parentNode->removeChild($item);
    }
} else {
    for ($i = 0; $i < count($experience); $i++) {
        foreach ($experience[$i] as $key => $value) {
            $query = "(//div[@data-category='experience']//div//div//*[contains(concat(' ',normalize-space(@class),' '), ' " . $key . " ')])[last()]";
            $node = $xpath->query($query);
            $node[0]->nodeValue = $value;
        }

        $query = "(//div[@data-category='experience']//div//div[@data-category='experience'])[last()]";
        $node = $xpath->query($query);

        if ($i < count($experience) - 1) {
            $duplicate = $node->item(0)->cloneNode(true);
            $node->item(0)->parentNode->appendChild($duplicate);
        } else {
            $node->item(0)->attributes->item(0)->nodeValue = "last-child";
        }
    }
}

if (count($education) == 0) {
    $query = "//div[@data-category='education']";
    $node = $xpath->query($query);

    foreach ($node as $item) {
        $oldNode = $item->parentNode->removeChild($item);
    }
} else {
    for ($i = 0; $i < count($education); $i++) {
        foreach ($education[$i] as $key => $value) {
            $query = "(//div[@data-category='education']//div//div//*[contains(concat(' ',normalize-space(@class),' '), ' " . $key . " ')])[last()]";
            $node = $xpath->query($query);
            $node[0]->nodeValue = $value;
        }

        $query = "(//div[@data-category='experience']//div//div[@data-category='experience'])[last()]";
        $node = $xpath->query($query);

        if ($i < count($education) - 1) {
            $duplicate = $node->item(0)->cloneNode(true);
            $node->item(0)->parentNode->appendChild($duplicate);
        } else {
            $node->item(0)->attributes->item(0)->nodeValue = "last-child";
        }
    }
}

$htmlString = $doc->saveHTML();

// Display pdf if pdf option chosen
if ($output == 'pdf') {
    $filename = strtolower($results['firstName']) . '-' . strtolower($results['lastName']) . '-resume.pdf';

    $domPdf = new Dompdf();
    $domPdf->loadHtml($htmlString);
    $domPdf->render();
    $domPdf->stream($filename, ["Attachment" => false]);

    session_unset();
    exit();
}

session_unset();