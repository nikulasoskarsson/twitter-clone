<?php

require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

if (!isset($_POST)) {
    $apiHelper->sendResponse(400, '{"message": "POST cannot be empty"}');
}
if (!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
    $isEmail = false;
} else {
    $isEmail = true;
}
if (!isset($_POST['password'])) {
    $apiHelper->sendResponse(400, '{"message": "Password cannot be empty"}');
}

require_once(__DIR__ . '/../private/db.php');
// If the user is login in with an email
if ($isEmail) {
    $query = $db->prepare("SELECT password FROM users WHERE email=:email LIMIT 1"); // get the hashed password
    $query->bindValue(':email', $_POST['username']);

    $query->execute();
    $row = $query->fetch();
    if (!$row) {
        $apiHelper->sendResponse(400, '{"message": "Email not found in the database"}');
    }
}
// If the user is login in with a username
else {
    $query = $db->prepare("SELECT password FROM users WHERE username=:username LIMIT 1"); // get the hashed password
    $query->bindValue(':username', $_POST['username']);

    $query->execute();
    $row = $query->fetch();
    if (!$row) {
        $apiHelper->sendResponse(400, '{"message": "Username not found in the database"}');
    }
}

if (!password_verify($_POST['password'], $row[0])) {
    $apiHelper->sendResponse(400, '{"message": "Password is inncorrect"}');
} else {
    $query = $db->prepare("SELECT id FROM users WHERE username=:username OR email=:email LIMIT 1");
    $query->bindValue(':username', $_POST['username']);
    $query->bindValue(':email', $_POST['username']);

    $query->execute();
    $row = $query->fetch();

    session_start();
    $_SESSION['userId'] = $row[0];
    $apiHelper->sendResponse(200, '{"message": "Successfully logged in","id": "' . $row[0] .  '"}');
}
