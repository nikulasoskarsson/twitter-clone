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
        if (!$this->findUserIdMatch($method['userId'])) {
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
    public function getFormattedTimeOrDate($timestamp)
    {
        // Timestamp of seconds since tweet used to return time since tweet in seconds, minutes and hours
        $timeSinceTweet = strtotime('now') - $timestamp;
        // Less then one minute
        if ($timeSinceTweet < 60) {
            $formattedTimestamp = $timeSinceTweet . 's';
        }
        // Less then one hour 
        else if ($timeSinceTweet < 3600) {
            $formattedTimestamp = floor($timeSinceTweet / 60) . 'm';
            // less then 24 hours
        } else if ($timeSinceTweet < 86400) {
            $formattedTimestamp = floor($timeSinceTweet / 3600) . 'h';
        }
        // If the time since tweet is more then 24 hours use the timestmap of the tweet to return a formatted date 
        else {
            date('y', $timestamp) !== date('y') ? $year = date('Y', $timestamp) : $year = null;
            //If the year is not the current year show it in the response
            if (!$year) {
                $formattedTimestamp  = date("M", $timestamp) . ' ' . date('n', $timestamp);
                // $formattedTimestamp = $date = date("M", $date) . ', ' . date('Y', $date); // see the date manual page for format options
            } else {
                $formattedTimestamp  = date("M", $timestamp) .  ' ' . date('n', $timestamp) . ', ' . $year;
            }
        }
        return $formattedTimestamp;
    }
}
