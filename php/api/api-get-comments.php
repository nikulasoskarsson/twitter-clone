<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user


require(__DIR__. '/../private/db.php');

if(!isset($_GET['tweetId'])){
    $apiHelper->sendResponse(400,'{"message": "tweetId missing"}');
}

$query = $db->prepare('SELECT tweet_comments.id AS comment_id, tweet_comments.tweeter_id, tweet_comments.comment_timestamp, comment_body.body, users.first_name, users.last_name, users.username, user_images.url AS user_image
FROM tweet_comments 
LEFT OUTER JOIN users ON users.id = tweet_comments.commenter_id 
LEFT OUTER JOIN user_images ON user_images.user_id = users.id
LEFT OUTER JOIN comment_body ON comment_body.comment_id = tweet_comments.id 
WHERE tweet_comments.tweet_id = :tweetId');

 $query->bindValue('tweetId', $_GET['tweetId']);
$query->execute();
$rows = $query->fetchAll();


foreach($rows as &$row){
    // Grab the 
    $query = $db->prepare('SELECT url AS comment_image FROM comment_images WHERE comment_images.comment_id = :commentId');
    $query->bindValue('commentId', $row[0]);
    $query->execute();

    $imgRows = $query->fetchAll();
    $row[8] = $apiHelper->getFormattedTimeOrDate($row[2]);
    $row[9] = $imgRows;
}
var_dump($rows);
/* SELECT tweet_comments.id AS comment_id, tweet_comments.tweeter_id, comment_body.body, users.first_name, users.last_name, users.username, user_images.url AS user_image
FROM tweet_comments 
LEFT OUTER JOIN users ON users.id = tweet_comments.commenter_id 
LEFT OUTER JOIN user_images ON user_images.user_id = users.id
LEFT OUTER JOIN comment_body ON comment_body.comment_id = tweet_comments.id 
WHERE tweet_comments.tweet_id = 178 */