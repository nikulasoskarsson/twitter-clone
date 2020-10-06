<?php

require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Exit if not provided with existing id of a user

if (!isset($_FILES['tweetImage']) && !isset($_POST['body'])) {
    $apiHelper->sendResponse(400, '{
        "message": "Tweet must contain either text or a image"
    }');;
}

require(__DIR__ . '/../private/db.php');
require_once(__DIR__ . '/../classes/db-helper.php');
$dbHeper = new DbHelper($db);

if (isset($_POST['body'])) {
    if (strlen($_POST['body']) < 2) {
        $apiHelper->sendResponse(400, '{
            "message": "Tweet has to be at least 2 characters long"
        }');
    }

    if (strlen($_POST['body']) > 240) {
        $apiHelper->sendResponse(400, '{
            "message": "Tweet cannot be longer then 240 characters long"
        }');
    }

    $dbHeper->insertOrUpdateTextFromFK($_POST['id'], 'body', 'tweet_id', $_POST['body'], 'tweet_body');
}
if (isset($_FILES['tweetImage'])) {
    echo 'running';
    $dbHeper->insertOrUpdateImage($_POST['id'], 'tweetImage', 'tweet_id', 'tweets', 'tweet_images');
}



// $sTweets = file_get_contents('../../db/tweets.json');
// $aTweets = json_decode($sTweets);
// foreach ($aTweets as $jTweet) {
//     if ($jTweet->id == $_POST['tweetId']) {
//         if (isset($_FILES['tweet-image'])) {

//             //If the body is not the same was it was before update it..
//             if ($jTweet->body != $_POST['newTweetBody']) {
//                 $jTweet->body = $_POST['newTweetBody'];
//             }
//             // Upload the image to the text file and image folder

//             require_once('../classes/image-upload.php');
//             $imageUpload = new ImageUpload($_FILES['tweet-image'], '../../img/tweets/', '../../db/tweets.json');
//             $imageUpload->uploadImage();
//             $jTweet->tweetImage = $imageUpload->getFileName();
//         } else {
//             if ($jTweet->body ==  $_POST['newTweetBody']) {
//                 $apiHelper->sendResponse(400, '{
//                     "message": "New tweet cannot be the same was it was before"
//                 }');
//             } else {
//                 $jTweet->body = $_POST['newTweetBody'];
//             }
//         }
//     }
// }

// delete the old image if it's being updated
// require_once('../classes/image-delete.php');
// $imageDelete = new ImageDelete($_POST['tweetId'], '../../img/tweets/', 'tweetImage', '../../db/tweets.json');
// $imageDelete->deleteSingleImage();


// $sTweets = json_encode($aTweets);
// file_put_contents('../../db/tweets.json', $sTweets);

// $apiHelper->sendResponse(200, '{
//     "message": "message": "You have successfully updated a tweet"
// }');
