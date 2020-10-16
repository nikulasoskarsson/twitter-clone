<?php

// require_once('classes/image-upload.php');
// $imageUpload = new ImageUpload($_FILES['images'], __DIR__ . '/../img/test/');

var_dump($_FILES['images']['tmp_name']);

// foreach ($_FILES['images']['tmp_name'] as $i => $file) {


//     $name =  $_FILES['images']['name'][$i];
//     $tmp = $_FILES['images']['tmp_name'][$i];
//     $size =  $_FILES['images']['size'][$i];
//     $errors = $_FILES['images']['errors'][$i];
//     $type = $_FILES['images']['type'][$i];

//     $newImg = [$name, $tmp, $size, $errors, $type];
// }


require_once('classes/db-helper.php');
require_once('private/db.php');
$dbHelper = new DbHelper($db);
$dbHelper->insertOrUpdateMultipleImages(36, 'images', 'tweet_id',  'test', 'tweet_images');
