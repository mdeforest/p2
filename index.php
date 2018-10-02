<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <script src='show-hide.js'></script>
    <title>Resume Creator</title>
</head>
<body>
    <h1>Resume Creator</h1>
    <p>Create a Resume by choosing a template and filling out the required fields below</p>

    <form method='POST' action='create.php'>
        <ul class='templates'>
            <li>
                <label>
                    <input type='radio' name='template' onclick="handleRadio(this, 'temp-1')" value='temp-1'>
                    <img class="template-img" src='templates/temp-1/temp-1.png'>
                </label>
            </li>
        </ul>

        <label class="temp-1 hide" for='firstName'>First Name
            <input type='text' name='firstName'>
        </label>

        <label class="temp-1 hide" for='lastName'>Last Name
            <input type='text' name='lastName'>
        </label>

        <input type='submit' value='Create'>
    </form>

</body>
</html>




