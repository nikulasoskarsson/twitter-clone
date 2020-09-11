<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>

    <?php

    (function () {
        if (!isset($_SESSION['userId'])) {
            return;
        }

        if ($_SESSION['userId']) {
            $uId = $_SESSION['userId'];
            echo "<div id ='user-id' data-user-id='$uId'></div>";
        }
    })();
    ?>
    <form action="php/actions/logout.php">
        <button>Logout</button>
    </form>