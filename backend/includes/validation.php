<?php

function isFieldEmpty($input) {
    return $input == "";
}
// there is a php function empty() that does the same thing

function isFirstNameValid($firstName) {
    
    if (isFieldEmpty($firstName)) {
        return false;
    }

    if (strlen($firstName) < 3) {
        return false;
    }

    return true;
}

function isLastNameValid($lastName) {
    
    if (isFieldEmpty($lastName)) {
        return false;
    }

    if (strlen($lastName) < 3) {
        return false;
    }

    return true;
}

function isEmailValid($email) {
    
    if (isFieldEmpty($email)) {
        return false;
    }

    if (strlen($email) < 6) {
        return false;
    }

    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return true;
}

function isDonoValid($dono) {
    
    if (isFieldEmpty($dono)) {
        return false;
    }

    if (strlen($dono) < 1) {
        return false;
    }
    return true;
}
