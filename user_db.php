<?php
session_start();
if (isset($_SESSION["email"])) {
    include('includs/connection.php');

    if (isset($_POST['submit'])) {
        $uid = $_SESSION['uid'];
        $subject = mysqli_real_escape_string($connection, $_POST['subject']);
        $message = mysqli_real_escape_string($connection, $_POST['message']);

        $query = "INSERT INTO leaves VALUES (null, $uid, '$subject', '$message', 'No action')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<script type='text/javascript'>
            alert('Leave applied successfully...');
            window.location.href='user_db.php';
            </script>";
        } else {
            echo "<script type='text/javascript'>
            alert('Please try again...');
            window.location.href='user_db.php';
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
        <title>Task Management System || user login || user dashboard</title>
        <link rel="shortcut icon" href="img/task.png" type="image/x-icon" />
        <!-- jQuery -->
        <script src="includs/jq.js"></script>
        <script>
            $(document).ready(function () {
                $('#manage_task').click(function () {
                    $('#right').load("userdb/task.php");
                });
            });
            $(document).ready(function () {
                $('#view_leave').click(function () {
                    $('#right').load("userdb/view_leave.php");
                });
            });
            $(document).ready(function () {
                $('#apply_leave').click(function () {
                    $('#right').load("userdb/apply_leave.php");
                });
            });
        </script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- External CSS -->
        <link rel="stylesheet" href="user-db.css">
    </head>

    <body>
        <!-- header -->
        <div class="row" id="header">
            <div class="col-md-12 ">
                <div class="col-md-4" style="display:inline-block;">
                    <h2>Task Management System</h2>
                </div>
                <div class="uname " style="display:inline-block; text-align:right;">
                    <b>Email:</b>
                    <?php echo $_SESSION["email"]; ?>
                    <span style="margin-left:45px;"><b>Name:</b>
                        <?php echo $_SESSION["name"]; ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- MAIN -->
        <div class="row">
            <div class="col-md-2 " id="lift">
                <table class="table">
                    <tr>
                        <td style="text-align:center;">
                            <a href="user_db.php" id="logout_link" type="button">Dashboard</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a style='text-decoration: none; color:black;' type="button" id="manage_task">Update
                                Task</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a id="apply_leave" style='text-decoration: none; color:black;' type="button">Apply
                                Leave</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a id="view_leave" style='text-decoration: none; color:black;' type="button">Leave
                                status</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="logout.php" id="logout_link" type="button">logout</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="a" id="right" style="">
                <h3>Instructions for employees</h3>
                <ul>
                    <li>All the employees should mark their attendence dealy</li>
                    <li>Employee must complate the task assigned to them</li>
                    <li>Kindly maintain decorum od office</li>
                    <li>Keep office and your area neat and clean</li>
                    <li>Be Polite and Don't Forget to Use the Magic Words “Thank you” and “Please”.</li>
                    <li>Be a Team Player</li>
                    <li>Keep the noise distractions to a minimum</li>

                </ul>
            </div>

        </div>
    </body>

    </html>
    <?php
} else {
    header("Location:index.php");
}