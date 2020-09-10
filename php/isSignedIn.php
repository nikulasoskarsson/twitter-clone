<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['userId'])) {
    $isSignedIn = true;
} else {
    $isSignedIn = false;
}
