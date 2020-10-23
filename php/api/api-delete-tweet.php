<?php

require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_POST); // Exit if not provided with existing id of a user


require(__DIR__. '/../private/db.php');
$query = $db->prepare('DELETE FROM tweets WHERE id = :id');
$query->bindValue(':id', $_POST['tweetId']);
$query->execute();

$rowCount = $query->rowCount();
if(!$rowCount){
    $apiHelper->sendResponse(400,'{
        "message": "There was an error deleting your tweet",
        "id": "'.$_POST['tweetId'] .'"
    }');
}

