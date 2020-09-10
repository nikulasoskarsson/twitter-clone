<?php
session_start();

(function () {
    if (!isset($_POST)) {
        return;
    }
    //Check if a user has entered a email or a password
    if (!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
        $isEmail = false;
    } else {
        $isEmail = true;
    }      //all validation has passed
    $sUsers = file_get_contents('../../db/users.json');
    $aUsers = json_decode($sUsers);


    foreach ($aUsers as $jUser) {
        // Check for matching email

        if ($isEmail) {
            if ($_POST['username'] == $jUser->email && password_verify($_POST['password'], $jUser->password)) {
                $_SESSION['userId'] =  $jUser->id;
                echo 'email match found';
                header('Location: ../../index.php');
                return;
            }
        }
        //Check for mathcing username
        else {
            if ($_POST['username'] == $jUser->username && password_verify($_POST['password'], $jUser->password)) {
                $_SESSION['userId'] =  $jUser->id;
                echo 'username match found';
                header('Location: ../../index.php');
                return;
            }
        }
    }
    echo 'match not found';
})();
