<?php

$userExists = false;
$sUsers = file_get_contents('../../db/users.json');
$aUsers = json_decode($sUsers);

// Check if the user exists with the id retrived from post
foreach ($aUsers as $jUser) {
    if ($jUser->id == $_POST['userId']) {
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
    if ($jTweet->id == $_POST['tweetId']) {
        $jTweet->body = $_POST['newTweetBody'];
    }
}

$sTweets = json_encode($aTweets);
file_put_contents('../../db/tweets.json', $sTweets);
header('Content-Type: application/json');
echo '{"message": "You have successfully updated a tweet"}';
exit();
