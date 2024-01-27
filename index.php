<?php
session_start();
include('includs/connection.php');
if (isset($_POST['userlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT email, password, name, uid FROM user WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultEmail, $resultPassword, $name, $uid);
    mysqli_stmt_fetch($stmt);
    if ($email == $resultEmail && $password == $resultPassword) {
        $_SESSION["email"] = $resultEmail;
        $_SESSION["name"] = $name;
        $_SESSION["uid"] = $uid;

        echo "<script type='text/javascript'>
                    window.location.href='user_db.php';
                    </script>";
    } else {
        echo "<script type='text/javascript'>
                    alert('Please enter correct email or password...');
                    window.location.href='index.php';
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
    <title>Task Management System</title>
    <link rel="shortcut icon" href="img/task.png" type="image/x-icon" />
    <!-- jQuery -->
    <script src="includs/jq.j
    s"></script>

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
            <a href="index.php" class="btn btn-success" id="active" style="margin-right:20px"> user login</a>
            <a href="user-resister.php" class="btn btn-warning" style="margin-right:20px"> user resistration</a>
            <a href="admin-login.php" class="btn btn-info"> admin login</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" id="ulogin">
            <center>
                <h2>User Login</h2>
                <form action="" method="post">
                    <div class="from-group" id="login">
                        <input type="email" name="email" placeholder="enter Email id" required>

                    </div>
                    <div class="from-group">
                        <input type="password" name="password" placeholder="enter  password" required>
                    </div>

                    <div class="from-group" id="pass">
                        Not have an account?
                        <a href="user-resister.php">Signup here</a>
                    </div>

                    <div class="from-group" id="submit">
                        <input type="submit" name="userlogin" value="Login" class="btn btn-success" required>
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