<?php
(function () {
    if (!isset($_POST)) {
        return;
    }
    // TODO validate..

    $newUser = [$_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)];

    $sUsers = file_get_contents('../../db/users.txt');
    $aUsers = json_decode($sUsers);

    array_push($aUsers, $newUser);
    $sUsers = json_encode($aUsers);

    file_put_contents('../../db/users.txt', $sUsers);
})();
