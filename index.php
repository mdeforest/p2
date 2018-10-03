<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <script src='js/show-hide.js'></script>
    <title>Resume Creator</title>
</head>
<body>
    <h1>Resume Creator</h1>
    <p>Create a Resume by choosing a template and filling out the required fields below</p>

    <form method='POST' action='logic/create.php'>
        <ul class='templates'>
            <li>
                <label>
                    <input type='radio' name='template' onclick="handleRadio(this, 'temp-1')" value='temp-1'>
                    <img class="template-img" src='templates/temp-1/temp-1.png'>
                </label>
            </li>
            <li>
                <label>
                    <input type='radio' name='template' onclick="handleRadio(this, 'temp-2')" value='temp-2'>
                    <img class="template-img" src='templates/temp-2/temp-2.png'>
                </label>
            </li>
        </ul>

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

        <label class="temp-1 temp-2 hide" for='summary'>Summary
            <textarea placeholder='List here your top selling points, including your most relevant strengths, skills and core competencies' name='summary'></textarea>
        </label>

        <div class='work-experience temp-1 temp-2 hide'>
            <p>Work Experience</p>
            <button type='button' onclick='addExperience(this.parentNode)'>+</button>
        </div>

        <div class='education temp-1 temp-2 hide'>
            <p>Education</p>
            <button type='button' onclick='addEducation(this.parentNode)'>+</button>
        </div>

        <label class='temp-1 temp-2 hide' for='additionalInfo'>Additional Information
            <textarea placeholder='Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get' name='additionalInfo'></textarea>
        </label>

        <input type='submit' value='Create'>
    </form>

</body>
</html>




