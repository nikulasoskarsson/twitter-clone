<?php
require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();

$apiHelper->validateUserId($_GET); // Exit if not provided with existing id of a user

require(__DIR__ . '/../private/db.php');

$userId = $_GET['userId'];
$query = $db->prepare("SELECT * FROM tweets WHERE user_id =$userId");
$query->execute();
$rows = $query->fetchAll();

$apiHelper->sendResponse(200, json_encode($rows));
