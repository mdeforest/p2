<?php
require "../includes/Form.php";
require "../includes/MyForm.php";

use DWA\Form;
use Resume\MyForm;

session_start();

$form = new MyForm($_POST);

if ($form->isSubmitted()) {
    $fields =
    [
        'template' => 'required',
        'firstName' => 'required|alpha',
        'lastName' => 'required|alpha',
        'jobTitle' => 'required|alpha',
        'city' => 'required',
        'state' => 'required',
        'email' => 'email',
        'phoneNumber' => 'digit|minLength:10|maxLength:10',
        'website' => 'url',
        'summary' => 'required',
        'additionalInfo' => 'required'
    ];

    if (isset($_POST['experience'])) {
        for ($i = 0; $i < count($_POST['experience']['jobTitle']); $i++) {
            $fields['experience|jobTitle|' . $i] = 'required|alpha';
            $fields['experience|company|' . $i] = 'required';
            $fields['experience|location|' . $i] = 'required';
            $fields['experience|fromMonth|' . $i] = 'required';
            $fields['experience|fromYear|' . $i] = 'required';
            $fields['experience|toMonth|' . $i] = 'required';
            $fields['experience|toYear|' . $i] = 'required';
            $fields['experience|html-content|' . $i] = 'required';
        }
    }

    if (isset($_POST['education'])) {
        for ($i = 0; $i < count($_POST['education']['degree']); $i++) {
            $fields['education|degree|' . $i] = 'required|alpha';
            $fields['education|where|' . $i] = 'required';
            $fields['education|location|' . $i] = 'required';
            $fields['education|fromYear|' . $i] = 'required';
            $fields['education|toYear|' . $i] = 'required';
            $fields['education|html-content|' . $i] = 'required';
        }
    }

    $errors = $form->validate($fields);
} else {
    header("Location: index.php");
}

var_dump($fields);
echo "<br>";
var_dump($errors);

$template = $_POST['template'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$jobTitle = $_POST['jobTitle'];
$city = $_POST['city'];
$state = $_POST['state'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$website = $_POST['website'];
$summary = $_POST['summary'];
$additionalInfo = $_POST['additionalInfo'];

$experience = [];
$education = [];

if (isset($_POST['experience'])) {
    for ($i = 0; $i < count($_POST['experience']['jobTitle']); $i++) {
        array_push($experience, []);
        $experience[$i]['jobTitle'] = $_POST['experience']['jobTitle'][$i];
        $experience[$i]['company'] = $_POST['experience']['company'][$i];
        $experience[$i]['location'] = $_POST['experience']['location'][$i];
        $experience[$i]['fromMonth'] = $_POST['experience']['fromMonth'][$i];
        $experience[$i]['fromYear'] = $_POST['experience']['fromYear'][$i];
        $experience[$i]['toMonth'] = $_POST['experience']['toMonth'][$i];
        $experience[$i]['toYear'] = $_POST['experience']['toYear'][$i];
        $experience[$i]['html-content'] = $_POST['experience']['html-content'][$i];
    }
}

if (isset($_POST['education'])) {
    for ($i = 0; $i < count($_POST['education']['degree']); $i++) {
        array_push($education, []);
        $education[$i]['degree'] = $_POST['education']['degree'][$i];
        $education[$i]['where'] = $_POST['education']['where'][$i];
        $education[$i]['location'] = $_POST['education']['location'][$i];
        $education[$i]['fromYear'] = $_POST['education']['fromYear'][$i];
        $education[$i]['toYear'] = $_POST['education']['toYear'][$i];
        $education[$i]['html-content'] = $_POST['education']['html-content'][$i];
    }
}

$_SESSION['template'] = $template;
$_SESSION['experience'] = $experience;
$_SESSION['education'] = $education;

$_SESSION['results'] = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'jobTitle' => $jobTitle,
    'city' => $city,
    'state' => $state,
    'email' => $email,
    'phoneNumber' => $phoneNumber,
    'website' => $website,
    'summary' => $summary,
    'additionalInfo' => $additionalInfo
];

header('Location: ../done.php');

?>

