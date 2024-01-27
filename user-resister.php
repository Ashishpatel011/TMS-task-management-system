<?php
include('includs/connection.php');

if (isset($_POST['userresistation'])) {
  $name = $_POST['name'];
  $mnumber = $_POST['mnumber'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rpassword = $_POST['rpassword'];

  if ($password == $rpassword) {
    $query = "INSERT INTO user (name, mnumber, email, password, rpassword) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sisss", $name, $mnumber, $email, $password, $rpassword);

    // Execute the statement
    $query_run = mysqli_stmt_execute($stmt);
    // Check if the query was successful
    if ($query_run) {
      echo "<script type='text/javascript'>
                    alert('User registered successfully...');
                    window.location.href='index.php';
                    </script>";
    } else {
      echo "<script type='text/javascript'>
                    alert('Error... please try again...');
                    window.location.href='user-resister.php';
                    </script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
    echo "<script type='text/javascript'>
                alert('Password and Confirm Password do not match. Please try again.');
                window.location.href='user-resister.php';
                </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Management System || Registration Page</title>
  <link rel="shortcut icon" href="img/task.png" type="image/x-icon" />
  <!-- jQuery -->
  <script src="includes/jq.js"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <!-- External CSS -->
  <link rel="stylesheet" href="user-resistretion.css">
</head>

<body>
  <!-- HEADER -->
  <div class="name">
    <img src="img/task.png" alt="" class="img">
    <div class="n">
      <h1>Task Management System</h1>
      <p>Stay on Top of Tasks, Boost Team Collaboration</p>
    </div>
  </div>
  <!-- MAIN -->
  <div class="row">
    <div class="col-md-4" id="home">
      <a href="index.php" class="btn btn-success" style="margin-right:20px"> User Login</a>
      <a href="user-resister.php" class="btn btn-warning" style="margin-right:20px"> User Registration</a>
      <a href="admin-login.php" class="btn btn-info"> Admin Login</a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 " id="uresister">
      <center>
        <h2>User Registration</h2>
        <form action="" method="post">
          <div class="form-group" id="login">
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
          </div>
          <div class="form-group" id="login">
            <input type="number" class="form-control" name="mnumber" size="10" placeholder="Enter mobile number"
              required>
          </div>
          <div class="form-group" id="login">
            <input type="email" class="form-control" name="email" placeholder="Enter Email id" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="rpassword" placeholder="Confirm password" required>
          </div>
          <div class="form-group" id="submit">
            <input type="submit" name="userresistation" value="Register" class="btn btn-success" required>
          </div>
        </form>
      </center>
    </div>
  </div>
  <!-- FOOTER -->
  <div class="copyright">
    <p>&copy; 2023 Task management system - all rights reserved</p>
  </div>
</body>

</html>