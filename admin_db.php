<?php
session_start();
if (isset($_SESSION["email"])) {
    include('includs/connection.php');
    if (isset($_POST["create"])) {
        $query = "INSERT INTO tasks VALUES (null, '$_POST[id]', '$_POST[description]', '$_POST[sdate]', '$_POST[edate]', 'not started')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            echo "<script type='text/javascript'>
                          alert('Task created successfully...');
                          window.location.href='admin_db.php';
                          </script>";
        } else {
            echo "<script type='text/javascript'>
                          alert('Please try again...');
                          window.location.href='admin_db.php';
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
        <title>Task Management System || admin login || admin dashboard</title>
        <link rel="shortcut icon" href="img/task.png" type="image/x-icon" />
        <!-- jQuery -->
        <script src="includs/jq.js"></script>
        <script>
            $(document).ready(function () {
                $('#create_task').click(function () {
                    $('#right').load("admindb/create_task.php");
                });
            });
            $(document).ready(function () {
                $('#manage_task').click(function () {
                    $('#right').load("admindb/manage_task.php");
                });
            });
            $(document).ready(function () {
                $('#view_leave').click(function () {
                    $('#right').load("admindb/leave.php");
                });
            });
        </script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- External CSS -->
        <link rel="stylesheet" href="admin_d.css">
    </head>

    <body>
        <!-- header -->
        <div class="row" id="header">
            <div class="col-md-12 ">
                <div class="col-md-4" style="display:inline-block;">
                    <h2>Task Management System</h2>
                </div>
                <div class="aname " style="display:inline-block; text-align:right;">
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
                <table class="table" id="db">
                    <tr>
                        <td style="text-align:center;">
                            <a href="admin_db.php" id="logout_link" type="button">Dashboard</a>
                        </td>
                    </tr>
                    <tr id="create_task">
                        <td style="text-align:center;">
                            <a class="link" id="create_task" style='text-decoration: none; color:white;'
                                type="button">Create Task</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a id="manage_task" class="link" style='text-decoration: none; color:white;'
                                type="button">Manage task</a>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td style="text-align:center;">
                            <a id="view_leave" class="link" style='text-decoration: none; color:white;' type="button">Leave
                                applications</a>
                        </td>
                    </tr>
                    <td style="text-align:center;">
                        <a href="logout.php" id="logout_link" type="button">logout</a>
                    </td>
                    </tr>
                </table>
            </div>
            <div id="right" style="">
                <h3>Instructions for Admin</h3>
                <ul>
                    <li>create,modify and manage the tasks </li>
                    <li>check the status of the tasks</li>
                    <li>after the complation task remove the task </li>
                    <li>Approve the leave applications only in velid reason</li>
                    <li>Guide on resetting user passwords if needed.</li>
                    <li>If your system includes project management features, provide instructions on creating and managing
                        projects.</li>

                </ul>
            </div>

        </div>

    </body>

    </html>
    <?php
} else {
    header("Location:admin-login.php");
}