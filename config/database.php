<?php
    // error_reporting(0);

    session_start();

    require_once 'function.php';
    $db = new mysqli("db_ip" ,"db_username","db_password", "db_name");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    // echo "Connected successfully";
    
    
?>


