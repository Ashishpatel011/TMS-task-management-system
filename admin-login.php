<?php
session_start();
include('includs/connection.php');

if (isset($_POST['adminlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT email, password, name FROM admin WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultEmail, $resultPassword, $name);
    mysqli_stmt_fetch($stmt);

    if ($email == $resultEmail && $password == $resultPassword) {
        $_SESSION["email"] = $resultEmail;
        $_SESSION["name"] = $name;
        echo "<script type='text/javascript'>
                    window.location.href='admin_db.php';
                    </script>";
    } else {
        echo "<script type='text/javascript'>
                    alert('Please enter correct email or password...');
                    window.location.href='admin-login.php';
                    </script>";
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System || admin login page</title>
    <link rel="shortcut icon" href="img/task.png" type="image/x-icon" />
    <!-- jQuery -->
    <script src="includs/jq.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
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
            <a href="index.php" class="btn btn-success" style="margin-right:20px"> user login</a>
            <a href="user-resister.php" class="btn btn-warning" style="margin-right:20px"> user resistration</a>
            <a href="admin-login.php" class="btn btn-info"> admin login</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4" id="alogin">
            <center>
                <h2>Admin Login</h2>
                <form action="" method="post">
                    <div class="from-group" id="login">
                        <input type="email" name="email" placeholder="enter Email id" required>

                    </div>
                    <div class="from-group">
                        <input type="password" name="password" placeholder="enter  password" required>
                    </div>
                    <div class="from-group" id="submit">
                        <input type="submit" name="adminlogin" value="Login" class="btn btn-success" required>
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