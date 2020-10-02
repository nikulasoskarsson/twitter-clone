<?php

require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user


$sTweets = file_get_contents('../../db/tweets.json');
$aTweets = json_decode($sTweets);


foreach ($aTweets as $jTweet) {
    if ($jTweet->id == $_GET['tweetId']) {
        $date = "2011-07-26 20:05:00";
        $date = strtotime($date);

        $jTweet->formattedTimestamp = $apiHelper->getFormattedTimeOrDate($date);
        $apiHelper->sendResponse(200, json_encode($jTweet));
    }
}
// no tweet is found in the loop-> send back an error
$apiHelper->sendResponse(400, '{
    "message": "Tweet not found"
}');
