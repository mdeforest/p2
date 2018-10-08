<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en"
      xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <script src='js/show-hide.js'></script>
    <title>Resume Creator</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
</head>
<body>
<div class='container'>
    <section class='banner' id='intro'>
        <img src='images/logo.png'>
        <p id='instructions'>Create a Resume by choosing a template and filling out the required fields below</p>
        <div class='button-container'>
            <a class='button' href='#choose-template'>Let's Go!</a>
        </div>
    </section>
    <form class='form' method='POST' action='logic/create.php'>
        <section id='choose-template'>
            <a href='#intro'>
                <div class='arrow-up'></div>
            </a>
            <p>Choose a Template</p>
            <div class='templates'>
                <div class='column'>
                    <input type='radio' name='template' id='temp-1' value='temp-1'>
                    <label for='temp-1'>
                        <img class="template-img" src='templates/temp-1/temp-1.png'>
                    </label>
                </div>
                <div class='column'>
                    <input type='radio' name='template' id='temp-2' value='temp-2'>
                    <label for='temp-2'>
                        <img class="template-img" src='templates/temp-2/temp-2.png'>
                    </label>
                </div>
            </div>
            <a href='#basic-info'>
                <div class='arrow-down'></div>
            </a>
        </section>
        <section id='basic-info'>
            <a href='#choose-template'>
                <div class='arrow-up'></div>
            </a>
            <p>Basic Information</p>
            <fieldset>
                <label for='firstName'>First Name</label>
                <input type='text' name='firstName'>
            </fieldset>
            <fieldset>
                <label for='lastName'>Last Name</label>
                <input type='text' name='lastName'>
            </fieldset>
            <div class='clearfix'></div>
            <fieldset>
                <label for='jobTitle'>Profession</label>
                <input type='text' name='jobTitle'>
            </fieldset>
            <div class='clearfix'></div>
            <fieldset>
                <label for='city'>City</label>
                <input type='text' name='city'>
            </fieldset>
            <fieldset>
                <label for='state'>State</label>
                <select name='state'>
                    <option value="AL" selected>Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </fieldset>
            <div class='clearfix'></div>
            <fieldset>
                <label for='email'>Email</label>
                <input type='email' name='email'>
            </fieldset>
            <fieldset>
                <label for='phoneNumber'>Phone Number</label>
                <input type='text' name='phoneNumber'>
            </fieldset>
            <div class='clearfix'></div>
            <fieldset>
                <label for='website'>Website</label>
                <input type='text' name='website'>
            </fieldset>
            <div class='clearfix'></div>
            <a href='#summary'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='summary'>
            <a href='#basic-info'>
                <div class='arrow-up'></div>
            </a>
            <p>Summary</p>
            <label class="temp-1 temp-2 hide" for='summary'>
                <textarea placeholder='List here your top selling points, including your most relevant strengths, skills and core competencies'
                          name='summary'></textarea>
            </label>
            <a href='#experience'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='experience' class='work-experience temp-1 temp-2 hide'>
            <a href='#summary'>
                <div class='arrow-up'></div>
            </a>
            <p>Work Experience</p>
            <div class='button-container'>
                <button type='button' class='button' onclick='addExperience()'>Add</button>
            </div>
            <div id='experiences'></div>
            <a href='#education-info'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='education-info' class='education temp-1 temp-2 hide'>
            <a href='#experience'>
                <div class='arrow-up'></div>
            </a>
            <p>Education</p>
            <div class='button-container'>
                <button type='button' class='button' onclick='addEducation()'>Add</button>
            </div>
            <div id='degrees'></div>
            <a href='#additional-info'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='additional-info'>
            <a href='#education-info'>
                <div class='arrow-up'></div>
            </a>
            <p>Additional Information</p>
            <label for='additionalInfo'>
                <textarea placeholder='Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get'
                          name='additionalInfo'></textarea>
            </label>
            <a href='#output'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='output'>
            <a href='#additional-info'>
                <div class='arrow-up'></div>
            </a>
            <p>Choose Display Type</p>
            <label for='output'>Display Type
                <select name='output'>
                    <option value='html' selected>HTML</option>
                    <option value='pdf'>PDF</option>
                </select>
            </label>
            <input id='submit' type='submit' value='Submit!'>
        </section>
    </form>

    <?php if (isset($_SESSION['errors'])) : ?>
        <div>
            <ul>
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>

        <?php $_SESSION['errors'] = null; ?>
    <?php endif; ?>
</div>
</body>
</html>




