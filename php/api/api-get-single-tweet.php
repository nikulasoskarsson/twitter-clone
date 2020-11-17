<?php

require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user


// TODO More validation
include(__DIR__ . '/../private/db.php');

// Getting the tweet and user information of the tweet author
$query = $db->prepare('SELECT tweets.id, tweets.timestamp, tweet_body.body, users.first_name, users.last_name, users.username, user_images.url
FROM tweets 
LEFT OUTER JOIN tweet_body ON tweet_body.tweet_id = tweets.id 
LEFT OUTER JOIN users ON users.id = tweets.user_id
LEFT OUTER JOIN user_images ON user_images.user_id = users.id
WHERE tweets.id = :tweetId');
$query->bindValue('tweetId', $_GET['tweetId']);
$query->execute();
$row = $query->fetch();

// Getting the images for the tweet and apending them to the response
$query = $db->prepare('SELECT tweet_id, url FROM tweet_images WHERE tweet_id = :tweetId');
$query->bindValue('tweetId', $row[0]);
$query->execute();
$imgRows = $query->fetchAll();
$row[7] = [];
foreach($imgRows as $imgRow){
    array_push($row[7], $imgRow[1]);
}

header('Content-Type: application/json');
echo json_encode($row);
