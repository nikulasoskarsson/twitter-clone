<?php
// Simple class with some public helper methods for the api e.g to check if a user id is valid or send back a response

class ApiHelper
{
    // Every protected route requires an id
    public function validateUserid($id)
    {
        $sUsers = file_get_contents(__DIR__ . '/../../db/users.json');
        $aUsers = json_decode($sUsers);
        foreach ($aUsers as $jUser) {

            if ($jUser->id === $id) {
                echo 'working';
            }
        }
        return false;
    }

    public function sendResponse($statusCode, $response)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo $response;
        exit;
    }
}
