
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskTracker</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="dashboard.php">TaskTracker</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">

<h1>TaskTracker</h1>

<?php include 'alerts.php'; ?>


<form action="<?= isset($_POST['edittask']) ? 'updatetask.php' : 'newtask.php' ?>" method="POST">
    <div class="form-group">
        <input class="form-control" type="text" name="taskname" value="<?= isset($_POST['taskname']) ? $_POST['taskname'] : '' ?>" placeholder="New Task" required>
    </div>

    <div class="form-group">
        <input class="form-control" type="date" name="duedate" value="<?= isset($_POST['duedate']) ? $_POST['duedate'] : '' ?>" placeholder="Due Date" required>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="is_completed" <?= isset($_POST['is_completed']) && $_POST['is_completed'] == "1" ? "checked" : "" ?> value="1"> Is it complete?
            </label>
        </div>
    </div>

    <?php
    if(isset($_POST['edittask'])) {
        echo '<input type="hidden" name="id" value ="'.$_POST['id'].'">';
        echo '<button type="submit" name="updatetask" class="btn btn-success">Update Task</button>';
    } else {
        echo '<button type="submit" name="addtask" class="btn btn-success">Add Task</button>';
    }
    ?> 
</form>

<br><br>
<div class="table-responsive">
    <table class="table table-hover table-striped  table-bordered">
    <tr>
        <th>Task</th>
        <th>Due Date</th>
        <th>Status</th>
        <th>Created on:</th>
        <th>Delete Task</th>
        <th>Edit Task</th>
    </tr>

<?php
include 'db.php';

$sql = "SELECT id, taskname, duedate, is_completed, reg_date FROM MyTasks";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?>


<tr>
    <td><?= $row['taskname'] ?></td>
    <td><?= $row['duedate'] ?></td>
    <td><?= $row['is_completed'] == "1" ? "✅" : "❌" ?></td>
    <td><?= $row['reg_date'] ?></td>
    <td>
        <form action="deletetask.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="taskname" value="<?= $row['taskname'] ?>">
            <input type="hidden" name="duedate" value="<?= $row['duedate'] ?>">
            <input type="hidden" name="is_completed" value="<?= $row['is_completed'] ?>">
            <button type="submit" name="deletetask" class="btn btn-xs btn-danger">✖</button>
        </form>
    </td>
    <td>
        <form action="dashboard.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="taskname" value="<?= $row['taskname'] ?>">
            <input type="hidden" name="duedate" value="<?= $row['duedate'] ?>">
            <input type="hidden" name="is_completed" value="<?= $row['is_completed'] ?>">
            <button type="submit" name="edittask" class="btn btn-xs btn-info">Edit</button>
        </form>
    </td>
</tr>


<?php
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
include 'footer.php';
?>
