<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST);

// Tweet can be emtpy if it has an image

if (!isset($_FILES['images']) && !isset($_POST['tweet'])) {
    $apiHelper->sendResponse(400, '{
        "message": "Tweet must contain either text or a image"
    }');;
}



require(__DIR__ . '/../private/db.php');
require_once(__DIR__ . '/../classes/db-helper.php');
$dbHelper = new DbHelper($db);

$lastInsertedId;
$now = strtotime('now');

// Insert into tweets table
$query = $db->prepare("INSERT INTO tweets VALUES(null, :userId, $now)");
$query->bindValue('userId', $_POST['userId']);


$query->execute();
$lastInsertedId =  $db->lastInsertId();


// Insert into tweet_images table
if (isset($_FILES['images'])) {

    $dbHelper->insertOrUpdateMultipleImages($lastInsertedId, 'images', 'tweet_id', 'tweets', 'tweet_images');
    // $dbHelper->insertOrUpdateMultipleImages(36, 'images', 'tweet_id',  'test', 'tweet_images');
}

// Insert into tweet_body table
if (isset($_POST['tweet'])) {
    if (strlen($_POST['tweet']) < 2) {
        delPrevTweets($db,$lastInsertedId);
        $apiHelper->sendResponse(400, '{
            "message": "Tweet has to be at least 2 characters long"
        }');;
    }

    if (!strlen($_POST['tweet']) > 240) {
        $apiHelper->sendResponse(400, '{
            "message": "Tweet cannot be longer then 2 characters long"
        }');
    }
    $dbHelper->insertOrUpdateTextFromFK($lastInsertedId, 'body', 'tweet_id', $_POST['tweet'], 'tweet_body');
}
function delPrevTweets($db, $id){
    $query = $db->prepare("DELETE FROM tweets WHERE id=:id");
    $query->bindValue(':id',$id);
    $query->execute();

    $query = $db->prepare("DELETE FROM tweet_images WHERE tweet_id=:id");
    $query->bindValue(':id',$id);
    $query->execute();
}




$apiHelper->sendResponse(200, '{"message": "You have created a new tweet",
"id": "' . $lastInsertedId . '"}');
