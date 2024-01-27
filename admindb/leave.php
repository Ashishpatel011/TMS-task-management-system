<?php
include("../includs/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System || admin login || admin dashboard || leave</title>
</head>

<body>

        <h3>All leave applications</h3>
    <br>
    <div style="overflow-x:auto;">

    <table class="table" style="background-color:antiquewhite; width:75vw;">
        <tr>
            <td>S.No</td>
            <td>uid</td>
            <td>subject</td>
            <td style="width:40%;">message</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        <?php
        $sno = 1;
        include("../includs/connection.php");
        $query = "SELECT * FROM leaves";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td>
                    <?php echo $sno; ?>
                </td>
                <?php
                $query1 = "SELECT user.name FROM user WHERE uid=$row[uid] "; // Include 'user.' prefix to select 'name' from the 'user' table
                $result1 = mysqli_query($connection, $query1);
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <td>
                        <?php echo $row1['name']; ?> <!-- Access 'name' from $row1 -->
                    </td>
                    <?php
                }
                ?>
                <td>
                    <?php echo $row['subject']; ?>
                </td>
                <td>
                    <?php echo $row['message']; ?>
                </td>
                <td>
                    <?php echo $row['status']; ?>
                </td>
                <td>
                    <a href="approve.php ?id=<?php echo $row['lid']; ?>">Approve </a>|
                    <a href="reject.php ?id=<?php echo $row['lid']; ?>"> Reject</a>
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