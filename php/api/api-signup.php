<?php
session_start();
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

if (!isset($_POST)) {
    $apiHelper->sendResponse(400, '{"message": "POST cannot be empty"}');
}
// Check if any of the fields are empty
$fields = ['firstName', 'lastName', 'userName', 'email', 'password', 'month', 'day', 'year'];
foreach ($fields as $field) {
    if (empty($_POST["$field"])) {
        $apiHelper->sendResponse(400, '{"message": "' . $field . ' cannot be empty"}');
    }
}
// TODO refactor validate to use a function instead of a bunch of if statements
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $apiHelper->sendResponse(400, '{"message": "Please insert a legit email"}');
}

if (strlen($_POST['firstName']) < 2) {
    $apiHelper->sendResponse(400, '{"message": "Firstname has to be at least 2 characters"}');
}

if (strlen($_POST['firstName']) > 50) {
    $apiHelper->sendResponse(400, '{"message": "Firstname cannot be more then 50 characters"}');
}

if (strlen($_POST['lastName']) < 2) {
    $apiHelper->sendResponse(400, '{"message": "Lastname has to be at least 2 characters"}');;
}

if (strlen($_POST['lastName']) > 50) {
    $apiHelper->sendResponse(400, '{"message": "Lastname cannot be more then 50 characters"}');
}

if (strlen($_POST['userName']) < 2) {
    $apiHelper->sendResponse(400, '{"message": "Username cannot be more then 50 characters"}');
}

if (strlen($_POST['userName']) > 50) {
    $apiHelper->sendResponse(400, '{"message": "Username cannot be more then 50 characters"}');
}



if (strlen($_POST['password']) < 6) {
    $apiHelper->sendResponse(400, '{"message": "Password cannot be shorter then 6 characters"}');
}

if (strlen($_POST['password']) > 50) {
    $apiHelper->sendResponse(400, '{"message": "Password cannot be longer then 50 characters"}');
}

require_once(__DIR__ . '/../private/db.php');
try {
    $query = $db->prepare('SELECT * FROM users where email = :email OR username = :username LIMIT 1');
    $query->bindValue('email', $_POST['email']);
    $query->bindValue('username', $_POST['username']);
    $query->execute();
    $row = $query->fetch();

    if ($row) {
        if ($row[4] === $_POST['email'] && $_POST['username']) {
            $apiHelper->sendResponse(409, '{"message":"Email and username are both in use"}');
        } else if ($row[4] === $_POST['email']) {
            $apiHelper->sendResponse(409, '{"message":"Email ' . $_POST['email'] . ' is already registered"}');
        } else if ($row[5] === $_POST['username']) {
            $apiHelper->sendResponse(409, '{"message":"Username ' . $_POST['username'] . ' is already registered"}');
        }
    }
    // No duplicate enteries = save user to the db
    $query = $db->prepare('INSERT INTO users VALUES (NULL, :firstname, :lastname, :username, :email, :password, :month, :year, :day, :timestamp)');
    $query->bindValue(':firstname', $_POST['firstName']);
    $query->bindValue(':lastname', $_POST['lastName']);
    $query->bindValue(':username', $_POST['userName']);
    $query->bindValue(':email', $_POST['email']);
    $query->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
    $query->bindValue(':month', $_POST['month']);
    $query->bindValue(':year', $_POST['year']);
    $query->bindValue(':day', $_POST['day']);
    $query->bindValue(':timestamp', strtotime('now'));
    $query->execute();


    $_SESSION['userId'] = $db->lastInsertId();
    $apiHelper->sendResponse(200, '{"message": "You have successfuly signed up to twitter clone!",
    "id": "' . $db->lastInsertId() . '"}');
} catch (PDOException $ex) {
    echo $ex;
    $apiHelper->sendResponse(500, '{"message": "System under maintainance","error":}');
}
