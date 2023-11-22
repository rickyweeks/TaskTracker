<?php include 'header.php'; ?>
                <h1>Registration</h1>

                <form class="form-horizontal" action="signupprocess.php" method="POST">

                <div class="form-group">
    <label class="control-label col-sm-2">First Name: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="usersFirst" placeholder="Enter your first name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Last Name: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="usersLast" placeholder="Enter your last name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Email: </label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="usersEmail" placeholder="Enter email" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
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