<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Checks if userId exists and if its 

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


$newTweet = [
    'id' => uniqid(),
    'userId' => $_POST['userId'],
    'body' => $_POST['tweet'],
    'active' => 1,
    'timestamp' => strtotime('now')
];

if (isset($_FILES['tweet-image'])) {
    require_once('../classes/image-upload.php');
    $imageUpload = new ImageUpload($_FILES['tweet-image'], '../../img/tweets/', '../../db/tweets.json');
    $imageUpload->uploadImage();
    $newTweet['tweetImage'] = $imageUpload->getFileName();
}


$sTweets = file_get_contents('../../db/tweets.json');
$aTweets = json_decode($sTweets);

array_unshift($aTweets, $newTweet);
$sTweets = json_encode($aTweets);
file_put_contents('../../db/tweets.json', $sTweets);
$apiHelper->sendResponse(400, '{"message": "You have created a new tweet",
"id": "' . $newTweet['id'] . '"}');
