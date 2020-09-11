<?php

$userExists = false;
$sUsers = file_get_contents('../../db/users.json');
$aUsers = json_decode($sUsers);

// Check if the user exists with the id retrived from post
foreach ($aUsers as $jUser) {
    if ($jUser->id == $_GET['userId']) {
        $userExists = true;
        break;
    }
}

if (!$userExists) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo '{
        "message": "user not found"
    }';
    exit();
}

$sTweets = file_get_contents('../../db/tweets.json');
$aTweets = json_decode($sTweets);
$aUserTweets = [];

foreach ($aTweets as $jTweet) {
    if ($jTweet->userId == $_GET['userId']) {
        array_push($aUserTweets, $jTweet);
    }
}
$sUserTweets = json_encode($aUserTweets);

header('Content-Type: application/json');
echo $sUserTweets;
