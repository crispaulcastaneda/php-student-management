<?php

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_POST['submit'])){

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];


        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) VALUES ('$fname', '$lname', '$gender')";
        $con->query($sql) or die ($con->error);

        echo header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Student Management System</title>

        <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <form action="" method="post">

        <label>First Name</label>
        <input type="text" name="firstname" id="firstname">

        <label>Last Name</label>
        <input type="text" name="lastname" id="lastname">

        <label>Gender</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <input type="submit" name="submit" value="Submit">

    </form>

</body>
</html>