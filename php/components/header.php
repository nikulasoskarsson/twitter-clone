<?php
session_start();
!isset($_SESSION['user']) ? header('Location: auth.html') : header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>