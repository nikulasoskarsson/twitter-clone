<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Checks if userId exists and if its 

// Tweet can be emtpy if it has an image

if (!isset($_FILES['tweetImage']) && !isset($_POST['tweet'])) {
    $apiHelper->sendResponse(400, '{
        "message": "Tweet must contain either text or a image"
    }');;
}



require(__DIR__ . '/../private/db.php');
require_once(__DIR__ . '/../classes/db-helper.php');
$dbHeper = new DbHelper($db);

$lastInsertedId;
$now = strtotime('now');

// Insert into tweets table
$query = $db->prepare("INSERT INTO tweets VALUES(null, :userId, $now)");
$query->bindValue('userId', $_POST['userId']);


$query->execute();
$lastInsertedId =  $db->lastInsertId();


// Insert into tweet_images table
if (isset($_FILES['tweetImage'])) {

    $dbHeper->insertOrUpdateImage($lastInsertedId, 'tweetImage', 'tweet_id', 'tweets', 'tweet_images');
}

// Insert into tweet_body table
if (isset($_POST['tweet'])) {
    if (strlen($_POST['tweet']) < 2) {
        $apiHelper->sendResponse(400, '{
            "message": "Tweet has to be at least 2 characters long"
        }');;
    }

    if (!strlen($_POST['tweet']) > 240) {
        $apiHelper->sendResponse(400, '{
            "message": "Tweet cannot be longer then 2 characters long"
        }');
    }
    $dbHeper->insertOrUpdateTextFromFK($lastInsertedId, 'body', 'tweet_id', $_POST['tweet'], 'tweet_body');
}





$apiHelper->sendResponse(400, '{"message": "You have created a new tweet",
"id": "' . $lastInsertedId . '"}');
