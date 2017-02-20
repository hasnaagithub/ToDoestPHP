<?php

require 'dbConn.php';

$email = $_POST['email'];
$username = $_POST['name1'];
$pass = $_POST['passwd'];

if (!empty($email) && !empty($username) && !empty($pass)) {
    $checkedQuery = "SELECT * from user WHERE username = '$username'";
    $object = new stdClass();
    if (existed($checkedQuery)) {
        header("Location: index.php?msg=2");
    } else {
        $query = 'INSERT INTO user(username,pass,email) VALUES(?,?,?)';
        $stmt = new mysqli_stmt($conn, $query);
        $stmt->bind_param('sss', $username, $pass, $email);
        $stmt->execute() ? print 'You are registered successfully...' :
                        print 'Sorry Unavialable.Please try again';
    }
} else {
    header("Location: index.php?msg=1");
}