<?php
require_once 'includes/Form.php';
require_once 'includes/MyForm.php';

require 'logic/index-logic.php';

use DWA\Form;
use Resume\MyForm;

?>

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
        <?php if (isset($_SESSION['errors'])) : ?>
            <section id='choose-template' class='no-padding'>
        <?php else : ?>
            <section id='choose-template'>
        <?php endif; ?>
            <?php if (isset($_SESSION['errors'])) : ?>
                <p class='error-message'>There was an error with your submission. Please fix all errors below.</p>
            <?php endif; ?>
            <a href='#intro'>
                <div class='arrow-up'></div>
            </a>
            <h2>Choose a Template</h2>
            <div class='templates'>
                <div class='column'>
                    <input type='radio' name='template' id='temp-1' value='temp-1' <?php echo isset($_SESSION['template']) && $_SESSION['template'] == 'temp-1' ? 'checked' : 'checked'; ?> >
                    <label for='temp-1'>
                        <img class="template-img" src='templates/temp-1/temp-1.png'>
                    </label>
                </div>
                <div class='column'>
                    <input type='radio' name='template' id='temp-2' value='temp-2' <?php echo isset($_SESSION['template']) && $_SESSION['template'] == 'temp-2' ? 'checked' : ''; ?> >
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
            <h2>Basic Information</h2>
            <div class='basic-info-content'>
                <fieldset>
                    <label for='firstName'>First Name</label>
                    <span class='info'>Required</span>
                    <input type='text' name='firstName' value="<?= $form['firstName'] ?? '' ?>" >
                    <span class='error'><?= getError('/.*firstName.*/', $errors) ?></span>
                </fieldset>
                <fieldset>
                    <label for='lastName'>Last Name</label>
                    <span class='info'>Required</span>
                    <input type='text' name='lastName' value="<?= $form['lastName'] ?? '' ?>" >
                    <span class='error'><?= getError('/.*lastName.*/', $errors) ?></span>
                </fieldset>
                <div class='clearfix'></div>
                <fieldset>
                    <label for='jobTitle'>Profession</label>
                    <span class='info'>Required</span>
                    <input type='text' name='jobTitle' value="<?= $form['jobTitle'] ?? '' ?>" >
                    <span class='error'><?= getError('/.*jobTitle.*/', $errors) ?></span>
                </fieldset>
                <div class='clearfix'></div>
                <fieldset>
                    <label for='city'>City</label>
                    <span class='info'>Required</span>
                    <input type='text' name='city' value="<?= $form['city'] ?? '' ?>" >
                    <span class='error'><?= getError('/.*city.*/', $errors) ?></span>
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
                    <span class='error'><?= getError('/.*state.*/', $errors) ?></span>
                </fieldset>
                <div class='clearfix'></div>
                <fieldset>
                    <label for='email'>Email</label>
                    <input type='text' name='email' value="<?= $form['email'] ?? '' ?>" >
                    <span class='error'><?= getError('/.*email.*/', $errors) ?></span>
                </fieldset>
                <fieldset>
                    <label for='phoneNumber'>Phone Number</label>
                    <input type='text' name='phoneNumber' value="<?= $form['phoneNumber'] ?? '' ?>" >
                    <span class='error'><?= getError('/.*phoneNumber.*/', $errors) ?></span>
                </fieldset>
                <div class='clearfix'></div>
                <fieldset>
                    <label for='website'>Website</label>
                    <input type='text' name='website' value="<?= $form['website'] ?? '' ?>" >
                    <span class='error'><?= getError('/.*website.*/', $errors) ?></span>
                </fieldset>
                <div class='clearfix'></div>
            </div>
            <a href='#summary'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='summary'>
            <a href='#basic-info'>
                <div class='arrow-up'></div>
            </a>
            <h2>Summary</h2>
            <textarea placeholder='List here your top selling points, including your most relevant strengths, skills and core competencies' name='summary'><?= $form['summary'] ?? '' ?></textarea>
            <span class='error'><?= getError('/.*summary.*/', $errors) ?></span>
            <a href='#experience'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='experience' class='work-experience'>
            <a href='#summary'>
                <div class='arrow-up'></div>
            </a>
            <h2>Work Experience</h2>
            <div class='button-container'>
                <button type='button' class='button' onclick='addExperience()'>Add</button>
            </div>
            <?php if (isset($_SESSION['errors'])) : ?>
                <div class='error-message'>
                    <ul>
                        <?php foreach (preg_grep('/.*experience.*/', $_SESSION['errors']) as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div id='experiences'>
                <?php if (count($form) > 0 && isset($form['experience'])) : ?>
                    <?php for ($i = 0; $i < count($form['experience']['jobTitle']); $i++) : ?>
                        <script>addExperience(<?= json_encode($form['experience']); ?>, "<?= $i; ?>")</script>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            <a href='#education-info'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='education-info' class='education'>
            <a href='#experience'>
                <div class='arrow-up'></div>
            </a>
            <h2>Education</h2>
            <div class='button-container'>
                <button type='button' class='button' onclick='addEducation()'>Add</button>
            </div>
            <?php if (isset($_SESSION['errors'])) : ?>
                <div class='error-message'>
                    <ul>
                        <?php foreach (preg_grep('/.*education.*/', $_SESSION['errors']) as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div id='degrees'>
                <?php if (count($form) > 0 && isset($form['education'])) : ?>
                    <?php for ($i = 0; $i < count($form['education']['degree']); $i++) : ?>
                        <script>addEducation(<?= json_encode($form['education']); ?>, "<?= $i; ?>")</script>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            <a href='#additional-info'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='additional-info'>
            <a href='#education-info'>
                <div class='arrow-up'></div>
            </a>
            <h2>Additional Information</h2>
            <textarea placeholder='Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get'
                          name='additionalInfo'><?= $form['additionalInfo'] ?? '' ?></textarea>
            <span class='error'><?= getError('/.*additionalInfo.*/', $errors) ?></span>
            <a href='#output'>
                <div class='arrow-down'></div>
            </a>
        </section>

        <section id='output'>
            <a href='#additional-info'>
                <div class='arrow-up'></div>
            </a>
            <h2>Choose Display Type</h2>
            <select name='output'>
                <option value='html' selected>HTML</option>
                <option value='pdf'>PDF</option>
            </select>
            <div class='button-container'>
                <input id='submit' class='button' type='submit' value='Submit!'>
            </div>
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
    <?php endif; ?>

    <?php $_SESSION['errors'] = null; ?>
    <?php $_SESSION['form'] = null; ?>
</div>
</body>
</html>




