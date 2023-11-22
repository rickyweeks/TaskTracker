<?php
session_start();
include 'db.php';

$sql = "UPDATE MyTasks SET taskname='{$_POST['taskname']}', duedate='{$_POST['duedate']}', is_completed='{$_POST['is_completed']}' WHERE id='{$_POST['id']}'";


if (mysqli_query($conn, $sql)) {;
    $_SESSION['message'] = 'taskupdated';
    header("Location: dashboard.php");
  
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

?>
