<?php

require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();
// TODO validate user id
if (!isset($_POST) && !isset($_FILES['userImg']) && !isset($_FILES['backgroundImg'])) {
    $apiHelper->sendResponse(400, '{"message": "data needed"}');
}


// Array with all the field names that you can update that belong to the user table
$fields = ['firstName', 'lastName', 'month', 'year', 'day'];
$rows = ['first_name', 'last_name', 'month', 'year', 'day'];


// validation is passed..

require_once(__DIR__ . '/../private/db.php'); // connection to the db
require_once(__DIR__ . '/../classes/db-helper.php'); // class with helper functions
$dbHelper = new DbHelper($db);


if (isset($_FILES['userImg']) && $_FILES['userImg']['size'] !== 0 ) {
    $dbHelper->insertOrUpdateImage($_POST['userId'], 'userImg', 'user_id', 'user', 'user_images');
}
if (isset($_FILES['backgroundImg']) && $_FILES['backgroundImg']['size'] !== 0 ) {
    $dbHelper->insertOrUpdateImage($_POST['userId'], 'backgroundImg', 'user_id', 'background', 'background_images');
}
if (isset($_POST['bio']) && !empty($_POST['bio'])) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['userId'], 'text', 'user_id', $_POST['bio'], 'user_bio');
}

if (isset($_POST['website']) && strlen($_POST['website']) > 4) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['userId'], 'url', 'user_id',  $_POST['website'], 'user_website');
}

if (isset($_POST['location']) && strlen($_POST['location']) > 4) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['userId'], 'location', 'user_id', $_POST['location'], 'user_location');
}


$fieldsToUpdate = array();
$valuesToUpdate = array();
$rowsToUpdate = array();

foreach ($fields as $i=>$field) {
    if (isset($_POST["$field"])) {
        array_push($fieldsToUpdate, $field);
        array_push($valuesToUpdate, $_POST["$field"]);
        array_push($rowsToUpdate, $rows[$i]);
    }
}
$dbHelper->updateMultipleFromPK($_POST['userId'], $fieldsToUpdate, $valuesToUpdate, $rowsToUpdate, 'users');

$apiHelper->sendResponse(200, '{"message":"You have successfuly updated your information"}');












