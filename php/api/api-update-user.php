<?php
(function () {
    $isAllFieldsEmpty = true;
    // Array with all the field names that you can update
    $fields = ['first_name', 'last_name', 'bio', 'location', 'website', 'month', 'year', 'day'];
    //Not a post request
    if (!isset($_POST)) {
        // TODO send a 400 error
        echo 'nothing in post';
        return false;
    }
    // Check if a single field contains data and if it does continue with the update else return error
    // else {
    //     foreach ($fields as $field) {
    //         if (!empty($_POST["$field"])) {
    //             $isAllFieldsEmpty = false;
    //             break;
    //         }
    //     }
    // }
    // if (!isset($_FILES['userImg']) && !isset($_FILES['backgroundImg'])) {
    //     $isAllFieldsEmpty = false;
    //     return false;
    // }

    // if ($isAllFieldsEmpty) {
    //     echo 'atleast one field must contain data';
    //     return false;
    // }
    // TODO validate all fields that have data in them


    $sUsers = file_get_contents('../../db/users.json');
    $aUsers = json_decode($sUsers);
    foreach ($aUsers as $jUser) {
        // If the user matches the user from the text file
        if ($jUser->id == $_POST['id']) {
            if (isset($_FILES['userImg'])) {
                require('../classes/image-upload.php');
                require('../classes/image-delete.php');

                $imageUpload = new ImageUpload($_FILES['userImg'], '../../img/user/', '../../db/users.json');
                $imageUpload->uploadImage();
                $jUser->userImg = $imageUpload->getFileName();

                //delete the old image
                $deleteImage = new ImageDelete($_POST['id'], '../../img/user', 'userImg', '../../db/users.json');
                $deleteImage->deleteSingleImage();

                echo '{img delete}';
            }
            if (isset($_FILES['backgroundImg'])) {
                require('../classes/image-upload.php');
                require('../classes/image-delete.php');

                $imageUpload = new ImageUpload($_FILES['backgroundImg'], '../../img/background/', '../../db/users.json');
                $imageUpload->uploadImage();
                $jUser->backgroundImg = $imageUpload->getFileName();

                //delete the old image
                $deleteImage = new ImageDelete($_POST['id'], '../../img/background', 'backgroundImg', '../../db/users.json');
                $deleteImage->deleteSingleImage();
            }
        }
    }

    $sUsers = json_encode($aUsers);
    file_put_contents('../../db/users.json', $sUsers);
})();
