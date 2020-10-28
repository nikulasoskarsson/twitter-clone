<?php

require_once(__DIR__. '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Exit if not provided with existing id of a user

if(!isset($_POST['tweetId'])){
    $apiHelper->sendResponse(400, 'Id of tweet missing');
}

// after more validation

require(__DIR__ . '/../private/db.php');
$query = $db->prepare('DELETE FROM tweet_likes WHERE tweet_id=:tweetId AND liker_id = :userId');
$query->bindValue('tweetId', $_POST['tweetId']);
$query->bindValue('userId', $_POST['userId']);
$query->execute();
$apiHelper->sendResponse(200, '{"message": "Tweet unliked"}');