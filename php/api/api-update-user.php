<?php
if (!isset($_POST) && !isset($_FILES['user-img']) && !isset($_FILES['background-img'])) {
    exit();
}


// Array with all the field names that you can update that belong to the user table
$fields = ['first_name', 'last_name', 'month', 'year', 'day'];


// validation is passed..

require_once(__DIR__ . '/../private/db.php'); // connection to the db
require_once(__DIR__ . '/../classes/db-helper.php'); // class with helper functions
$dbHelper = new DbHelper($db);


if (isset($_FILES['user-img'])) {
    $dbHelper->insertOrUpdateImage($_POST['id'], 'user-img', 'user', 'user_images');
}
if (isset($_FILES['background-img'])) {
    $dbHelper->insertOrUpdateImage($_POST['id'], 'background-img', 'background', 'background_images');
}
if (isset($_POST['bio'])) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['id'], 'text', $_POST['bio'], 'user_bio');
}

if (isset($_POST['website'])) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['id'], 'url', $_POST['website'], 'user_website');
}

if (isset($_POST['location'])) {
    $dbHelper->insertOrUpdateTextFromFK($_POST['id'], 'location', $_POST['location'], 'user_location');
}


$fieldsToUpdate = array();
$valuesToUpdate = array();

foreach ($fields as $field) {
    if (isset($_POST["$field"])) {
        array_push($fieldsToUpdate, $field);
        array_push($valuesToUpdate, $_POST["$field"]);
    }
}
$dbHelper->updateMultipleFromPK($_POST['id'], $fieldsToUpdate, $valuesToUpdate, 'users');





















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
