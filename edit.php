<?php
include('includs/connection.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];

    // Use prepared statement to avoid SQL injection
    $query = "UPDATE tasks SET uid=?, description=?, sdate=?, edate=? WHERE tid=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "isssi", $uid, $description, $sdate, $edate, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script type='text/javascript'>
            alert('Task updated successfully...');
            window.location.href='admin_db.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Error updating task. Please try again.');
            window.location.href='edit.php?id=$id';
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
    <title>Task Management System || admin login || admin dashboard</title>
    <link rel="shortcut icon" href="img/task.png" type="image/x-icon" />
    <!-- jQuery -->
    <script src="includs/jq.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body style="background-color: rgb(57, 43, 102); height: 90vh; width: 100%; background-size: cover;
    background-position: top 25% right 0; padding: 0; margin: 0;">

    <div class="row"
        style="background-color:#3d8f6d; height:8vh;width:101vw;padding-top: 15px;padding-bottom: 5px;padding-left: 50px; ">
        <div class="col-md-12 ">
            <h2>Task Management System</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white"><br>
            <h3 style="padding-top: 15px;padding-bottom: 50px">Edit the task</h3>
            <?php
            $query = "SELECT * FROM tasks WHERE tid=$_GET[id]";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="from-group">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="user">Select User</label>
                        <select class="form-control" name="uid" id="user" required>
                            <option>select</option>
                            <?php
                            $query1 = "SELECT uid, name FROM user";
                            $result1 = mysqli_query($connection, $query1);
                            if (mysqli_num_rows($result1)) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    ?>
                                    <option value="<?php echo $row1['uid']; ?>">
                                        <?php echo $row1['name']; ?>
                                    </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="taskName">Description:</label>
                        <textarea class="form-control" rows="3" cols="50" name="description" required>
                                <?php echo $row['description']; ?>
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label for="user">Start Date:</label>
                        <input type="date" class="form-control" name="sdate" value="<?php echo $row['sdate']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="user">End Date:</label>
                        <input type="date" class="form-control" name="edate" value="<?php echo $row['edate']; ?>">
                    </div>
                    <input style=" margin-top:30px" type="submit" class="btn btn-primary" name="update" value="Update">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>