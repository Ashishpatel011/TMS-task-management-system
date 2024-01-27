<?php
session_start();
include("../includs/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System || admin login || user dashboard || task</title>
    <style>
        .table {
            font-size: 22px;
        }

        @media (max-width: 477px) {
            h1 {
                font-size: 17px;
            }

            .table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <h1>Your tasks</h1>
    <br>
    <div style="overflow-x:auto;">
        <table class="table" style="background-color:whitesmoke; width:75vw;">
            <tr style="font-weight: 700;">
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
            // Use a prepared statement to avoid SQL injection
            $query = "SELECT * FROM tasks WHERE uid = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $_SESSION['uid']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

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
                        <a href="./update.php?id=<?php echo $row['tid']; ?>">Update</a>
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