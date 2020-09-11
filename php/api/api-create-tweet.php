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

$newTweet = [
    'id' => uniqid(),
    'userId' => $_POST['userId'],
    'body' => $_POST['tweet'],
    'active' => 1,
];

$sTweets = file_get_contents('../../db/tweets.json');
$aTweets = json_decode($sTweets);

array_push($aTweets, $newTweet);
$sTweets = json_encode($aTweets);
file_put_contents('../../db/tweets.json', $sTweets);
echo '{"message": "You have created a new tweet with the id of ' . $_POST['userId'] . '"}';
