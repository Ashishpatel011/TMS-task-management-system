<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System || admin login || admin dashboard || create task</title>
</head>

<body>
    <h3>Create a new task</h3>
    <div class="row" id="task">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="user">Select User</label>
                    <select style="background-color:antiquewhite;"  class="form-control" name="id" id="user">
                        <option>select</option>
                        <?php
                        include("../includs/connection.php");
                        $query = "SELECT  uid,name FROM user";
                        $result = mysqli_query($connection, $query);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['uid']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="taskName">Description:</label>
                    <textarea style="background-color:antiquewhite;" class="form-control" rows="3" cols="50" name="description" placeholder="Mention the task"
                        required>  </textarea>
                </div>
                <div class="form-group">
                    <label for="user">Start Date:</label>
                    <input style="background-color:antiquewhite;" type="date" class="form-control" name="sdate">
                </div>
                <div class="form-group">
                    <label for="user">End Date:</label>
                    <input style="background-color:antiquewhite;" type="date" class="form-control" name="edate">
                </div>
                <input type="submit" class="btn btn-primary" name="create" value="Create">
            </form>
        </div>
    </div>
</body>

</html>