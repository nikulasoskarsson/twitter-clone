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


foreach ($aTweets as $jTweet) {
    if ($jTweet->id == $_GET['tweetId']) {

        header('Content-Type: application/json');
        echo json_encode($jTweet);
        exit();
    }
}
// no tweet is found in the loop-> send back an error
http_response_code(400);
header('Content-Type: application/json');
echo '{
        "message": "Tweet not found"
    }';
exit();
