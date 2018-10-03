<?php
session_start();

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

