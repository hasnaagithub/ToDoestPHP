<?php
session_start();
require 'dbConn.php';

$userId = $_SESSION['user_id'];

/* Insert project as per logged-in user */
if (isset($_POST['prj_name'])) {
    $prjName = $_POST['prj_name'];
    $query = 'INSERT INTO project(name,user_id) VALUES(?,?)';
    $stmt = new mysqli_stmt($conn, $query);
    $stmt->bind_param('ss', $prjName, $userId);
    if (!$stmt->execute()) {
        print 'Sorry something wrong.Please try again';
    }
}

/* List projects based on loggedin user */
$query = "SELECT * from project WHERE user_id = '$userId'";
$results = mysqli_query($conn, $query);
$rowsCount = mysqli_num_rows($results);
?>

<table>
    <thead>
    <th>Project Name</th>
</thead>
<tbody>

    <?php
    while ($rowsCount-- != 0) {
        $row = mysqli_fetch_assoc($results);
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '</tr>';
    }
    ?>
</tbody>
</table>

<form method="POST">
    <input type="text" name="prj_name" placeholder="Type project name">
    <input type="submit" value="Add Project">
</form>