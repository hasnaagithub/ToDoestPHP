<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'phpdiploma';

$conn = mysqli_connect($host, $username, $password, $db); 

function existed($query) {
    global $conn;
    $results = mysqli_query($conn, $query);
    $rowsCount = mysqli_num_rows($results);
    
    return ($rowsCount >= 1) ? $results : FALSE;
}