<?php
session_start();
(function () {

    if (!isset($_POST)) {
        return;
    } else {

        require_once('../classes/image-upload.php');
        $imageUpload = new ImageUpload($_FILES['user-image'], '../../img/user/', '../../db/users.json');
        $imageUpload->uploadImage();


        // Save the name of the image to the user object

        $userId = $_SESSION['userId'];
        $sUsers = file_get_contents('../../db/users.json');
        $aUsers = json_decode($sUsers);

        foreach ($aUsers as $jUser) {
            if ($jUser->id === $userId) {
                $jUser->userImg = $imageUpload->getFileName();
                break;
            }
        }
        $sUsers = json_encode($aUsers);
        file_put_contents('../../db/users.json', $sUsers);
        header('Location: ../../index.php');

        // header('Location: ../../index.php');
    }
})();
