<?php


$sUsers = file_get_contents('../../db/users.json');
$aUsers = json_decode($sUsers);

// Check if the user exists with the id retrived from post
foreach ($aUsers as $jUser) {
    if ($jUser->id == $_GET['userId']) {

        echo json_encode($jUser);
        exit();
    }
}

http_response_code(400);
header('Content-Type: application/json');
echo '{
        "message": "user not found"
    }';
exit();
