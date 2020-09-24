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
            } else {
                //TODO send back error msg
                exit();
            }
        }
        // delete the old image if it's being updated
        require_once('../classes/image-delete.php');
        $imageDelete = new ImageDelete('5f6390b6efea5', '../../img/user/', 'userImg', '../../db/users.json');
        $imageDelete->deleteSingleImage();

        $sUsers = json_encode($aUsers);
        file_put_contents('../../db/users.json', $sUsers);
        header('Location: ../../index.php');
    }
})();
