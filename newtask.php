<?php
session_start();

//echo $_POST['taskname']."<br>";
//echo $_POST['duedate']."<br>";

// check if checkbox is checked or not
//if (isset($_POST['is_completed'])) {
//    echo $_POST['is_completed'] . "<br>"; // Checkbox was checked
//} else {
//    echo "0<br>"; // Checkbox was not checked
//}

// Insert into the database table MyTasks

include 'db.php';

//check if checkbox was checked, if not, set value to 0
$is_completed = isset($_POST['is_completed']) ? $_POST['is_completed'] : '0';

$sql = "INSERT INTO MyTasks (taskname, duedate, is_completed)
VALUES ('{$_POST['taskname']}', '{$_POST['duedate']}', '{$is_completed}')";



if (mysqli_query($conn, $sql)) {
  $_SESSION['message'] = 'taskadded';
  header("Location: dashboard.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


// Redirect back to the main page with a GET variable to display success message

//



?>

