<?php
session_start();
(function () {

    if (!isset($_POST)) {
        return;
    } else {

        $file = $_FILES['user-image'];

        // Get all the information about the uploaded file
        $fileName = $_FILES['user-image']['name'];
        $fileTmp = $_FILES['user-image']['tmp_name']; // Tempory location of the file
        $fileSize = $_FILES['user-image']['size'];
        $fileErrors = $_FILES['user-image']['error'];
        $fileType = $_FILES['user-image']['type'];

        $fileExt = explode('.', $fileName); // ['cat', 'png']
        var_dump($fileExt);
        $fileActualExt = strtolower(end($fileExt)); //jpg, png, etc..

        $allowed = array(
            'jpg', 'jpeg', 'png'
        );

        // If the extension that comes from post is inside of the array of allowed extensions
        if (!in_array($fileActualExt, $allowed)) {
            echo 'You cannot uppload files of this type';
            return;
        }
        // If we have errors 
        if ($fileErrors !== 0) {
            echo 'There was an error uploading this file';
            return;
        }
        // If the file size is to big
        if ($fileSize > 1000000) {
            echo 'File size is too big!';
            return;
        }
        // If there are no errors the code keeps running

        // Save the image to img/user
        $fileName = uniqid('', true) . '.' . $fileActualExt;
        $fileDestination = "../../img/user/$fileName";
        move_uploaded_file($fileTmp, $fileDestination);

        // Save the name of the image to the user object

        $userId = $_SESSION['userId'];
        $sUsers = file_get_contents('../../db/users.json');
        $aUsers = json_decode($sUsers);

        foreach ($aUsers as $jUser) {
            if ($jUser->id === $userId) {
                $jUser->userImg = $fileName;
                break;
            }
        }
        $sUsers = json_encode($aUsers);
        file_put_contents('../../db/users.json', $sUsers);
        header('Location: ../../index.php');
    }
})();
