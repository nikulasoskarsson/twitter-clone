<?php
if (!isset($_POST) && !isset($_FILES['userImg']) && !isset($_FILES['backgroundImg'])) {
    exit();
}


// Array with all the field names that you can update that belong to the user table
$fields = ['firstName', 'lastName', 'month', 'year', 'day'];
$rows = ['first_name', 'last_name', 'month', 'year', 'day'];


// validation is passed..

require_once(__DIR__ . '/../private/db.php'); // connection to the db
require_once(__DIR__ . '/../classes/db-helper.php'); // class with helper functions
$dbHelper = new DbHelper($db);


if (isset($_FILES['userImg'])) {
    $dbHelper->insertOrUpdateImage($_POST['userId'], 'userImg', 'user_id', 'user', 'user_images');
}
if (isset($_FILES['backgroundImg'])) {
    $dbHelper->insertOrUpdateImage($_POST['userId'], 'backgroundImg', 'user_id', 'background', 'background_images');
}
if (isset($_POST['bio'])) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['userId'], 'text', 'user_id', $_POST['bio'], 'user_bio');
}

if (isset($_POST['website'])) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['userId'], 'url', 'user_id',  $_POST['website'], 'user_website');
}

if (isset($_POST['location'])) {
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





















//     $sUsers = file_get_contents('../../db/users.json');
//     $aUsers = json_decode($sUsers);
//     foreach ($aUsers as $jUser) {
//         // If the user matches the user from the text file
//         if ($jUser->id == $_POST['id']) {
//             if (isset($_FILES['userImg'])) {
//                 require('../classes/image-upload.php');
//                 require('../classes/image-delete.php');

//                 $imageUpload = new ImageUpload($_FILES['userImg'], '../../img/user/', '../../db/users.json');
//                 $imageUpload->uploadImage();
//                 $jUser->userImg = $imageUpload->getFileName();

//                 //delete the old image
//                 $deleteImage = new ImageDelete($_POST['id'], '../../img/user', 'userImg', '../../db/users.json');
//                 $deleteImage->deleteSingleImage();

//                 echo '{img delete}';
//             }
//             if (isset($_FILES['backgroundImg'])) {
//                 require('../classes/image-upload.php');
//                 require('../classes/image-delete.php');

//                 $imageUpload = new ImageUpload($_FILES['backgroundImg'], '../../img/background/', '../../db/users.json');
//                 $imageUpload->uploadImage();
//                 $jUser->backgroundImg = $imageUpload->getFileName();

//                 //delete the old image
//                 $deleteImage = new ImageDelete($_POST['id'], '../../img/background', 'backgroundImg', '../../db/users.json');
//                 $deleteImage->deleteSingleImage();
//             }
//         }
//     }

//     $sUsers = json_encode($aUsers);
//     file_put_contents('../../db/users.json', $sUsers);
