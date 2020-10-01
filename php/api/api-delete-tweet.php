<?php

require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Exit if not provided with existing id of a user

$sTweets = file_get_contents('../../db/tweets.json');
$aTweets = json_decode($sTweets);

// Find a match for the userId
foreach ($aTweets as  $index => $jTweet) {
    if ($jTweet->id == $_POST['tweetId']) {
        array_splice($aTweets, $index, 1);
        $sTweets = json_encode($aTweets);
        file_put_contents('../../db/tweets.json', $sTweets);

        $apiHelper->sendResponse(200, '{"message": "You have deleted a tweet successfully", "id": "' . $jTweet->id .  '"}');
    }
}
// No match is found
$apiHelper->sendResponse(400, '{"message": "Error deleting tweet"}');
