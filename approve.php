<?php
include('includs/connection.php');
$query = "UPDATE leaves SET status='Approve' WHERE lid=$_GET[id] ";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "<script type='text/javascript'>
            alert('LEAVE STATUS updated successfully...');
            window.location.href='admin_db.php';
            </script>";
} else {
    echo "<script type='text/javascript'>
            alert('Error updating task. Please try again.');
            window.location.href='admin_db.php';
            </script>";
}
?>