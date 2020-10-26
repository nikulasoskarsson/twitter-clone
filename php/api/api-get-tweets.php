<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user

require(__DIR__ . '/../private/db.php');


$query = $db->prepare("SELECT tweets.id, tweets.timestamp, tweet_body.body, tweets.user_id FROM tweets 
LEFT OUTER JOIN tweet_body ON tweet_body.tweet_id = tweets.id 
WHERE user_id = :id");
$query->bindValue(':id',$_GET['userId']);
$query->execute();

$rows = $query->fetchAll();

foreach($rows as &$row){
     if(isset($row[0])){
    $row[4] = $apiHelper->getFormattedTimeOrDate($row[1]);

        $row[5] = array();
        $query = $db->prepare("SELECT tweet_id, url FROM tweet_images WHERE tweet_id = :id");
        $query->bindValue(':id',$row[0]);
      
        $query->execute();
        $imgRows = $query->fetchAll();
        foreach($imgRows as $imgRow){
            array_push($row[5], $imgRow[1]);
        }
        // Get all the likes for this tweet
        $query = $db->prepare('SELECT * FROM tweet_likes WHERE tweet_id = :id');
        $query->bindValue('id', $row[0]);
        $query->execute();
        $likeRows = $query->fetchAll();  
        $row[6] = count($likeRows); // Add the amount of likes on the tweet to the res

        // Find out if the user has liked this tweet
        $row[7] = false; // If the user has liked the tweet, default false
        foreach($likeRows as $likeRow){
            if($likeRow[3] === $_GET['userId']){
                $row[7] = true; // Change to true and break if match is found
            break;
            }
        }
     }
   
}

 $apiHelper->sendResponse(200, json_encode($rows));


// SELECT * FROM tweets 
// LEFT OUTER JOIN tweet_body ON tweet_body.tweet_id = tweets.id 
// LEFT OUTER JOIN tweet_images ON tweet_images.tweet_id = tweets.id
// WHERE user_id = :id