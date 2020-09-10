<?php

(function () {

    if (!isset($_POST)) {
        echo "You should not be here";
        return;
    }
    // Check if any of the fields are empty
    $fields = ['email', 'password', 'month', 'day', 'year'];
    foreach ($fields as $field) {
        if (empty($_POST["$field"])) {
            echo "$field cannot be not exist";
            return;
        }
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'must be a real email address';
        return;
    }


    if (strlen($_POST['password']) < 6) {
        echo 'Password cannot be shorter then 6 characters';
        return;
    }

    if (strlen($_POST['password']) > 20) {
        echo 'Password cannot be longer then 20 characters';
        return;
    }
    echo 'validation passed <br>';
    var_dump($_POST);

    $newUser = [uniqid(), $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)];

    $sUsers = file_get_contents('../../db/users.txt');
    $aUsers = json_decode($sUsers);

    array_push($aUsers, $newUser);
    $sUsers = json_encode($aUsers);

    file_put_contents('../../db/users.txt', $sUsers);
})();
