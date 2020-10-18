<?php


require_once(__DIR__ . '/../classes/helper-api.php');
$apiHelper = new ApiHelper();
!isset($_GET['userId']) && $apiHelper->sendResponse(400, '{"message":"No userId in GET"}');

require_once(__DIR__.'/../private/db.php');


$sqlStatement = 'SELECT
users.id,
users.first_name,
users.last_name,
users.username,
users.email,
users.dob_month,
users.dob_year,
users.dob_day,
users.signup_timestamp,
background_images.url AS background_url,
user_images.url AS user_img,
user_bio.text AS bio,
user_location.location,
user_website.url as website

FROM
users
LEFT OUTER JOIN background_images ON background_images.user_id = users.id
LEFT OUTER JOIN user_images ON user_images.user_id = users.id
LEFT OUTER JOIN user_bio ON user_bio.user_id = users.id
LEFT OUTER JOIN user_location ON user_location.user_id = users.id
LEFT OUTER JOIN user_website ON user_website.user_id = users.id
WHERE
users.id = :id';
$query = $db->prepare($sqlStatement);
$query->bindValue(':id',$_GET['userId']);
$query->execute();
$row =$query->fetch();
$apiHelper->sendResponse(200,json_encode($row));



