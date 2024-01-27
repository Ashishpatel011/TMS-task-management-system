<?php
include("../includs/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System || admin login || admin dashboard || manage task</title>
</head>

<body>
        <h3>All assigned tasks</h3>
    <br>
    <div style="overflow-x:auto;">
        <table class="table" style="background-color:whitesmoke; width:75vw;">
            <tr>
                <td>S.No</td>
                <td>Task id</td>
                <td>Description</td>
                <td>Start date</td>
                <td>End date</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
            <?php
            $sno = 1;
            include("../includs/connection.php");
            $query = "SELECT * FROM tasks";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $sno; ?>
                    </td>
                    <td>
                        <?php echo $row['tid']; ?>
                    </td>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                    <td>
                        <?php echo $row['sdate']; ?>
                    </td>
                    <td>
                        <?php echo $row['edate']; ?>
                    </td>
                    <td>
                        <?php echo $row['status']; ?>
                    </td>
                    <td>
                        <a href="./edit.php ?id=<?php echo $row['tid']; ?>">Edit </a>|
                        <a href="./delete.php ?id=<?php echo $row['tid']; ?>"> Delete</a>
                    </td>
                </tr>
                <?php
                $sno = $sno + 1;
            }
            ?>
        </table>
    </div>

</body>

</html>