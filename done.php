<?php
require_once 'includes/dompdf/lib/html5lib/Parser.php';
require_once 'includes/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'includes/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'includes/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

require 'logic/done-logic.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <title>Resume Creator</title>
</head>
<body>

<?= $htmlString ?>

</body>
</html>