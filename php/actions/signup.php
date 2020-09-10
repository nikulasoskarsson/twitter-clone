<?php

(function () {

    if (!isset($_POST)) {
        echo "You should not be here";
        return;
    }
    // Check if any of the fields are empty
    $fields = ['firstname', 'lastname', 'username', 'email', 'password', 'month', 'day', 'year'];
    foreach ($fields as $field) {
        if (empty($_POST["$field"])) {
            echo "$field cannot be not empty";
            return;
        }
    }
    // TODO refactor validate to use a function instead of a bunch of if statements
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'must be a real email address';
        return;
    }

    if (strlen($_POST['firstname']) < 2) {
        echo 'firstname cannot be shorter then 2 characters';
        return;
    }

    if (strlen($_POST['firstname']) > 50) {
        echo 'firstname cannot be longer then 50 characters';
        return;
    }

    if (strlen($_POST['lastname']) < 2) {
        echo 'lastname cannot be shorter then 2 characters';
        return;
    }

    if (strlen($_POST['lastname']) > 50) {
        echo 'lastname cannot be longer then 50 characters';
        return;
    }

    if (strlen($_POST['username']) < 2) {
        echo 'Username cannot be shorter then 2 characters';
        return;
    }

    if (strlen($_POST['username']) > 50) {
        echo 'Username cannot be longer then 50 characters';
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


    $sUsers = file_get_contents('../../db/users.json');
    $aUsers = json_decode($sUsers);

    foreach ($aUsers as $jUser) {
        if ($jUser->email == $_POST['email']) {
            echo 'email taken';
            return;
        }
        if ($jUser->username == $_POST['username']) {
            echo 'username taken';
            return;
        }
    }

    $newUser = [
        "id" => uniqid(),
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
        "dob" => [
            "month" => $_POST['month'], "year" => $_POST['year'], "day" => $_POST['day']
        ]
    ];

    array_push($aUsers, $newUser);
    $sUsers = json_encode($aUsers);
    file_put_contents('../../db/users.json', $sUsers);


    session_start();
    $_SESSION['userId'] = $newUser['id'];
    header('Location: ../../index.php');
})();
