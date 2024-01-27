<?php
session_start();
include('../includs/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
        .table {
            font-size: 22px;
        }

        @media (max-width: 477px) {
            h3 {
                font-size: 17px;
            }

            .table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <h3>Your leave applications</h3>
    <br>
    <div style="overflow-x:auto;">
        <table class="table" style="background-color:whitesmoke; width:75vw;">
            <tr style="font-weight: 700;">
                <td>S.No</td>
                <td>subject</td>
                <td  style="width:40%;">message</td>
                <td>Status</td>
            </tr>
            <?php

            $sno = 1;
            $query = "SELECT * FROM leaves WHERE uid = $_SESSION[uid]";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $sno; ?>
                    </td>
                    <td>
                        <?php echo $row['subject']; ?>
                    </td>
                    <td>
                        <?php echo $row['message']; ?>
                    </td>

                    <td>
                        <?php echo $row['status']; ?>
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