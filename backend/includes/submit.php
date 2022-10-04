<?php

session_start();

include 'functions.php';
include 'validation.php';

$_SESSION['errors'] = [];
$_SESSION['submission'] = $_POST;

if (! array_key_exists('HTTP_REFERER', $_SERVER)) {
    // ! says if there is not
    die;
}

if(count($_POST) <= 0) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    // . is concatination in php

    die;
}

$firstName = getPostDataWithDefault('first_name');
$lastName = getPostDataWithDefault('last_name');
$email = getPostDataWithDefault('email');
$dono = getSubmissionFromSession('dono');

$firstNameValid = isFirstNameValid($firstName);
$lastNameValid = isLastNameValid($lastName);
$emailValid = isEmailValid($email);
$donoValid = isDonoValid($dono);

if (! $firstNameValid) {
    $_SESSION['errors']['first_name'] = 'First name can not be blank and must be longer 3 characters or more';
};

if (! $lastNameValid) {
    $_SESSION['errors']['last_name'] = 'Last name can not be blank and must be longer 3 characters or more';
};

if (! $emailValid) {
    $_SESSION['errors']['email'] = 'Please use a valide email format: email@email.com';
};

if (! $donoValid) {
    $_SESSION['errors']['dono'] = 'Please enter a valid amount';
};

if (! $firstNameValid || ! $lastNameValid || ! $emailValid || $donoValid) {
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);

    die;
};

$to = $email;
$subject = "Thank you for the donation!";
$message = "<html><body>";
$message .= "Thank you " . $firstName . " " . $lastName . ".";
$message .= "For your donation to Ceres in the amount of " . $dono . ". <br>";
$message .= "We will use this to help #SustainTheFutre. <br>";
$message .= "With Thanks, Ceres";
$message .= "</body></html>";

$to2 = "CeresCampaign@ceres.com";
$subject2 = "New Donation";
$message2 = "<html><body>";
$message2 .= "First Name: " . $firstName . "<br>";
$message2 .= "Last Name: " . $lastName . "<br>";
$message2 .= "Email: " . $email;
$message2 .= "Amount:" . $dono;
$message2 .= "</body></html>";

mail( $to, $subject, $message);
mail( $to2, $subject2, $message2);
$_SESSION['submission'] = [];

header('Location: ' . $_SERVER['HTTP_REFERER']);