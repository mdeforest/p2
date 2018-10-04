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
        'additionalInfo' => 'required',
        'output' => 'required'
    ];

    if (isset($_POST['experience'])) {
        for ($i = 0; $i < count($form->get('experience|jobTitle')); $i++) {
            $fields['experience|jobTitle|'.$i] = 'required|alpha';
            $fields['experience|company|'.$i] = 'required';
            $fields['experience|location|'.$i] = 'required';
            $fields['experience|fromMonth|'.$i] = 'required';
            $fields['experience|fromYear|'.$i] = 'required';
            $fields['experience|toMonth|'.$i] = 'required';
            $fields['experience|toYear|'.$i] = 'required';
            $fields['experience|html-content|'.$i] = 'required';
        }
    }

    if (isset($_POST['education'])) {
        for ($i = 0; $i < count($_POST['education']['degree']); $i++) {
            $fields['education|degree|'.$i] = 'required|alpha';
            $fields['education|where|'.$i] = 'required';
            $fields['education|location|'.$i] = 'required';
            $fields['education|fromYear|'.$i] = 'required';
            $fields['education|toYear|'.$i] = 'required';
            $fields['education|html-content|'.$i] = 'required';
        }
    }

    $errors = $form->validate($fields);

    if ($form->hasErrors) {
        $_SESSION['errors'] = $errors;
        header('Location: ../index.php');
        exit();
    }
} else {
    header("Location: ../index.php");
}

$template = $form->get('template');
$output = $form->get('output');

$firstName = $form->get('firstName');
$lastName = $form->get('lastName');
$jobTitle = $form->get('jobTitle');
$city = $form->get('city');
$state = $form->get('state');
$email = $form->get('email', '');
$phoneNumber = $form->get('phoneNumber', '');
$website = $form->get('website', '');
$summary = $form->get('summary');
$additionalInfo = $form->get('additionalInfo');

$experience = [];
$education = [];

if (isset($_POST['experience'])) {
    for ($i = 0; $i < count($form->get('experience|jobTitle')); $i++) {
        array_push($experience, []);
        $experience[$i]['jobTitle'] = $form->get('experience|jobTitle'.$i);
        $experience[$i]['company'] = $form->get('experience|company'.$i);
        $experience[$i]['location'] = $form->get('experience|location'.$i);
        $experience[$i]['fromMonth'] = $form->get('experience|fromMonth'.$i);
        $experience[$i]['fromYear'] = $form->get('experience|fromYear'.$i);
        $experience[$i]['toMonth'] = $form->get('experience|toMonth'.$i);
        $experience[$i]['toYear'] = $form->get('experience|toYear'.$i);
        $experience[$i]['html-content'] = $form->get('experience|html-content'.$i);
    }
}

if (isset($_POST['education'])) {
    for ($i = 0; $i < count($form->get('education|degree')); $i++) {
        array_push($education, []);
        $education[$i]['degree'] = $form->get('education|degree'.$i);
        $education[$i]['where'] = $form->get('education|where'.$i);
        $education[$i]['location'] = $form->get('education|location'.$i);
        $education[$i]['fromYear'] = $form->get('education|fromYear'.$i);
        $education[$i]['toYear'] = $form->get('education|toYear'.$i);
        $education[$i]['html-content'] = $form->get('education|html-content'.$i);
    }
}

$_SESSION['template'] = $template;
$_SESSION['output'] = $output;
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

