<?php
include('includs/connection.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $status = $_POST['status'];
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];

    $query = "UPDATE tasks SET status= '$status' WHERE tid='$id'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script type='text/javascript'>
            alert('status updated successfully...');
            window.location.href='user_db.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert(' Please try again.');
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
    <title>Task Management System || admin login || admin dashboard</title>
    <link rel="shortcut icon" href="img/task.png" type="image/x-icon" />
    <!-- jQuery -->
    <script src="includs/jq.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body style="background-color: rgb(57, 43, 102);
  height: 90vh;
  width: 100%;
  background-size: cover;
  background-position: top 25% right 0;
  padding: 0;
  margin: 0;">

    <div class="row" style="background-color:#3d8f6d;
height:8vh;width:101vw;padding-top: 15px;padding-bottom: 5px;padding-left: 50px; ">
        <div class="col-md-12 ">
            <h2>Task Management System</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white"><br>
            <h3 style="padding-top: 15px;padding-bottom: 50px">Update status of task</h3>
            <?php
            $query = "SELECT * FROM tasks WHERE tid=$_GET[id]";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <form style="padding:35px" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="from-group">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" required>
                    </div>
                    <select name="status" class="form-control">
                        <option value="">-select-</option>
                        <option value="In-progress">In-progress</option>
                        <option value="complete">Complete</option>
                    </select>
                    <input style="margin-top: 25px;" type="submit" class="btn btn-primary" name="update" value="Update">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>