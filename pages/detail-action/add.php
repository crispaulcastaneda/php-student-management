<?php

    include_once("../../connections/connection.php");
    $con = connection();

    if(isset($_POST['submit'])){

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];


        $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) VALUES ('$fname', '$lname', '$gender')";
        $con->query($sql) or die ($con->error);

        echo header("Location: ../../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Student Management System</title>

        <link rel="stylesheet" href="../../css/style.css">

         <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>
<body class="main-page">

    <div class="wrapper">
        <a href="../../index.php">
            <img src="../../img/back.png" alt="back">
        </a>

        <form action="" method="post" class="form-wrapper">

            <label>First Name</label>
            <input type="text" name="firstname" id="firstname">

            <label>Last Name</label>
            <input type="text" name="lastname" id="lastname">

            <label>Gender</label>
            <select name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <!-- <input type="submit" name="submit" value="Submit"> -->
            <button class="btn-form btn-add" type="submit" name="submit">
               <img src="https://img.icons8.com/plasticine/100/000000/submit-progress.png">
            </button>
        </form>
    </div>

</body>
</html>