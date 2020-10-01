<?php
// Simple class with some public helper methods for the api e.g to check if a user id is valid or send back a response

class ApiHelper
{
    public function validateUserId($method)
    {
        // Return with a status code of 400 and an error message if there is no id
        !isset($method['userId']) &&  $this->sendResponse(400, '{
    "message": "No field with name of userId in ' . $_SERVER['REQUEST_METHOD'] .  '"
}');

        // Return with a status code of 400 and an error message if the id is not found in the db
        if (!$this->findUserIdMatch($_POST['userId'])) {
            $this->sendResponse(400, '{
    "message": "user not found"
}');
        }
    }
    // Every protected route requires an id
    public function findUserIdMatch($id)
    {
        $sUsers = file_get_contents(__DIR__ . '/../../db/users.json');
        $aUsers = json_decode($sUsers);
        foreach ($aUsers as $jUser) {

            if ($jUser->id === $id) {
                return true;
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
