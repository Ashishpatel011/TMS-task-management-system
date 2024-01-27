<?php
include('includs/connection.php');

$query = "DELETE FROM tasks WHERE tid=$_GET[id]";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "<script type='text/javascript'>
        alert('Task Deleted successfully...');
        window.location.href='admin_db.php';
        </script>";
} else {
    echo "<script type='text/javascript'>
        alert(' Please try again.');
        window.location.href='edit.php?id=$_GET[id]';
        </script>";
}
?>