<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <script src='js/show-hide.js'></script>
    <title>Resume Creator</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
<div class='container'>
    <section class='banner' id='intro'>
        <img src='images/logo.png'>
        <p id='instructions'>Create a Resume by choosing a template and filling out the required fields below</p>
        <div class='button-container'>
            <a class='start' href='#choose-template'>Let's Go!</a>
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
                    <input type='radio' name='template' id='temp-1' onclick="handleRadio(this, 'temp-1')" value='temp-1'>
                    <label for='temp-1'>
                        <img class="template-img" src='templates/temp-1/temp-1.png'>
                    </label>
                </div>
                <div class='column'>
                    <input type='radio' name='template' id='temp-2' onclick="handleRadio(this, 'temp-2')" value='temp-2'>
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
            <label class="temp-1 temp-2 hide" for='firstName'>First Name
                <input type='text' name='firstName'>
            </label>

            <label class="temp-1 temp-2 hide" for='lastName'>Last Name
                <input type='text' name='lastName'>
            </label>

            <label class="temp-1 temp-2 hide" for='jobTitle'>Profession
                <input type='text' name='jobTitle'>
            </label>

            <label class='temp-1 temp-2 hide' for='city'>City
                <input type='text' name='city'>
            </label>

            <label class='temp-1 temp-2 hide' for='state'>State
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
            </label>

            <label class="temp-1 temp-2 hide" for='email'>Email
                <input type='email' name='email'>
            </label>

            <label class="temp-1 hide" for='phoneNumber'>Phone Number
                <input type='text' name='phoneNumber'>
            </label>

            <label class="temp-1 temp-2 hide" for='website'>Website
                <input type='text' name='website'>
            </label>
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
            <button type='button' onclick='addExperience(this.parentNode)'>+</button>
            <a href='#education-info'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='education-info' class='education temp-1 temp-2 hide'>
            <a href='#experience'>
                <div class='arrow-up'></div>
            </a>
            <p>Education</p>
            <button type='button' onclick='addEducation(this.parentNode)'>+</button>
            <a href='#additional-info'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='additional-info'>
            <a href='#education-info'>
                <div class='arrow-up'></div>
            </a>
            <p>Additional Information</p>
            <label class='temp-1 temp-2 hide' for='additionalInfo'>
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




