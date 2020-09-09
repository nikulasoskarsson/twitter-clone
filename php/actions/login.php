<?php
session_start();

(function () {
    if (!isset($_POST)) {
        return;
    }
    var_dump($_POST);
    //all validation has passed
    $sUsers = file_get_contents('../../db/users.txt');
    $aUsers = json_decode($sUsers);

    foreach ($aUsers as $aUser) {
        if ($_POST['email'] == $aUser[1] && password_verify($_POST['password'], $aUser[2])) {
            $_SESSION['userId'] =  $aUser[0];
            break;
        }
    }
})();
