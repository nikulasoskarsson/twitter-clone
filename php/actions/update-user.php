<?php
session_start();
(function () {

    if (!isset($_POST)) {
        return;
    } else {

        require_once('../classes/image-upload.php');
        $imageUpload = new ImageUpload($_FILES['user-image'], '../../img/user/', '../../db/users.json');
        $imageUpload->uploadImage();

        header('Location: ../../index.php');
    }
})();
