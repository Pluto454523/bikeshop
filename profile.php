<?php 
    require_once ('./config/database.php');

    if (!isset($_SESSION['cusID'])) {
        alert('Not allow', './login.php');
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSql</title>
    <?php include_once ('./components/header.php'); ?>
</head>

<body>

    <?php include_once ('./components/navbar.php') ?>

    PROFILE


</body>

</html>