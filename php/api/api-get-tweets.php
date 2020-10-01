<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user

$sTweets = file_get_contents('../../db/tweets.json');
$aTweets = json_decode($sTweets);
$aUserTweets = [];

foreach ($aTweets as $jTweet) {
    if ($jTweet->userId == $_GET['userId']) {
        array_push($aUserTweets, $jTweet);
    }
}
if (!count($aUserTweets)) {
    $apiHelper->sendResponse(400, '{"message":"Could not find tweets for this user"}');
} else {
    $sUserTweets = json_encode($aUserTweets);
    $apiHelper->sendResponse(200, $sUserTweets);
}
