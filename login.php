<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">TaskTracker</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li  class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login</h1>

                <?php
                if(isset($_SESSION['message'])) {
                    echo '<div class="alert alert-danger">
                    <strong>Failed login!</strong> Username or Password is invalid.
                  </div>';
                  unset($_SESSION['message']);
                }

                ?>

                <form action="loginprocess.php" method="POST">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" value="ricky.d.weeks.jr@gmail.com" name="usersEmail" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" value="75829523" class="form-control" name="pwd" required>
  </div>
  <button type="submit" name="loginuser" class="btn btn-default">Login</button>
</form>

            </div>
        </div>
    </div>
    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>