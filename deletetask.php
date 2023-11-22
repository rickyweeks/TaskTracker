<?php

session_start();

//echo "We are deleting ID:".$_POST['id'];

include 'db.php';

// sql to delete a record
$sql = "DELETE FROM MyTasks WHERE id='{$_POST['id']}'";


if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'taskdeleted';
    header("Location: dashboard.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);


?>