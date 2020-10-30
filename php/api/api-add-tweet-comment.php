<?php

require_once(__DIR__. '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Exit if not provided with existing id of a user

if(!isset($_POST['tweetId'])){
    $apiHelper->sendResponse(400, 'Id of tweet missing');
}

// after more validation

require(__DIR__ . '/../private/db.php');
$query = $db->prepare('INSERT INTO tweet_comments VALUES(null, :tweetId, :commenterId, :userId)');
$query->bindValue('tweetId', $_POST['tweetId']);
$query->bindValue('commenterId', $_POST['commenterId']);
$query->bindValue('userId', $_POST['userId']);
$query->execute();


if(isset($_POST['commentBody'])){
    $query = $db->prepare('INSERT INTO comment_body VALUES(null, :commentId, :body)');
    $query->bindValue(':commentId', $db->lastInsertId());
    $query->bindValue(':body', $_POST['commentBody']);
    $query->execute();
}

$apiHelper->sendResponse(200, '{"message": "Tweet Comment added"}');