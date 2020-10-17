<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user

require(__DIR__ . '/../private/db.php');


$query = $db->prepare("SELECT tweets.id, tweets.timestamp, tweet_body.body FROM tweets 
LEFT OUTER JOIN tweet_body ON tweet_body.tweet_id = tweets.id 
WHERE user_id = :id");
$query->bindValue(':id',$_GET['userId']);
$query->execute();

$rows = $query->fetchAll();

foreach($rows as &$row){
     if(isset($row[0])){
        $row['images'] = array();
        $query = $db->prepare("SELECT tweet_id, url FROM tweet_images WHERE tweet_id = :id");
        $query->bindValue(':id',$row[0]);
      
        $query->execute();
        $imgRows = $query->fetchAll();
        foreach($imgRows as $imgRow){
            array_push($row['images'], $imgRow[1]);
        }
     }
   
}

 $apiHelper->sendResponse(200, json_encode($rows));


// SELECT * FROM tweets 
// LEFT OUTER JOIN tweet_body ON tweet_body.tweet_id = tweets.id 
// LEFT OUTER JOIN tweet_images ON tweet_images.tweet_id = tweets.id
// WHERE user_id = :id