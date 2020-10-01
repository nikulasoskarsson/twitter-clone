<?php


require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();
!isset($_GET['userId']) && $apiHelper->sendResponse(400, '{"message":"No userId in GET"}');

$sUsers = file_get_contents('../../db/users.json');
$aUsers = json_decode($sUsers);

// Check if the user exists with the id retrived from post
foreach ($aUsers as $jUser) {
    if ($jUser->id == $_GET['userId']) {
        $apiHelper->sendResponse(200, json_encode($jUser));
    }
}
$apiHelper->sendResponse(200, '{
    "message": "user not found"
}');
