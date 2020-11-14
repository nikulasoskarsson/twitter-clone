<?php

require_once(__DIR__. '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Exit if not provided with existing id of a user

if(!isset($_POST['tweetId'])){
    $apiHelper->sendResponse(400, '{"message": "Id of tweet missing"}');
}

// after more validation

require(__DIR__ . '/../private/db.php');
$query = $db->prepare('INSERT INTO tweet_comments VALUES(null, :tweetId, :commenterId, :userId)');
$query->bindValue('tweetId', $_POST['tweetId']);
$query->bindValue('commenterId', $_POST['commenterId']);
$query->bindValue('userId', $_POST['userId']);
$query->execute();


if(isset($_POST['body'])){
    $query = $db->prepare('INSERT INTO comment_body VALUES(null, :commentId, :body)');
    $query->bindValue(':commentId', $db->lastInsertId());
    $query->bindValue(':body', $_POST['body']);
    $query->execute();
}

if(isset($_FILES['images'])){
    require_once(__DIR__ . '/../classes/db-helper.php');
    $dbHelper = new DbHelper($db);
    $dbHelper->insertOrUpdateMultipleImages($db->lastInsertId(),'images','comment_id','comments','comment_images');
}

$apiHelper->sendResponse(200, '{"message": "Tweet Comment added"}');