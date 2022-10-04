<?php
// since this file is only php we do not need a closing bracket and pretty industry standard

function shouldShowSubmissionData(){
    // this will return true of false whether we should show submission data

    return count($_POST) > 0;
    // if the number of items in $_POST is greater than 0 return true, else return false

}

function getPostDataWithDefault($key){
    if (array_key_exists($key, $_POST)){
        return $_POST[$key];
    }
    
    return "";
}

function getErrorMessageFromSession($key){

    if (! isset($_SESSION)){
        return "";
    }

    if (! array_key_exists('errors', $_SESSION)){
        return "";
    }

    if (! array_key_exists($key, $_SESSION['errors'])){
        return "";
    }
    
    return $_SESSION['errors'][$key];
}

function getSubmissionFromSession($key){

    if (! isset($_SESSION)){
        return "";
    }

    if (! array_key_exists('submission', $_SESSION)){
        return "";
    }

    if (! array_key_exists($key, $_SESSION['submission'])){
        return "";
    }
    
    return $_SESSION['submission'][$key];
}