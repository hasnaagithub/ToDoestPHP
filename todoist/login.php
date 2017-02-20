<?php

session_start();
require 'dbConn.php';

$username = $_POST['name'];
$pass = $_POST['password'];

if (!empty($username) && !empty($pass)) {
    $checkedQuery = "SELECT * from user WHERE username = '$username' AND pass='$pass'";
//    print_r(existed($checkedQuery));die;
    $results = existed($checkedQuery);
    if($results) {
        $row = mysqli_fetch_assoc($results);
        $_SESSION['user_id'] = $row['id'];
        header("Location: home.php");
    }
    else {
        header("Location: index.php?msg=3");
    }
}
else {
    header("Location: index.php?msg=1");
}
