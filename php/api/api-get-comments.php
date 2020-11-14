<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user


require(__DIR__. '/../private/db.php');

if(!isset($_GET['tweetId'])){
    $apiHelper->sendResponse(400,'{"message": "tweetId missing"}');
}

$query = $db->prepare('SELECT * FROM tweets');