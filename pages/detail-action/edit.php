<?php

    include_once("../../connections/connection.php");
    $con = connection();
    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id = '$id'";
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();

    if(isset($_POST['submit'])){

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];


        $sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', gender='$gender' WHERE id = '$id'";
        $con->query($sql) or die ($con->error);

        echo header("Location: details.php?ID=".$id);
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
</head>
<body class="main-page">

    <div class="wrapper">
        <a href="../../index.php">
            <img src="../../img/back.png" alt="back">
        </a>

        <form action="" method="post" class="form-wrapper">

            <label>First Name</label>
            <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>">

            <label>Last Name</label>
            <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>">

            <label>Gender</label>
            <select name="gender">
                <option value="male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?>>Male</option>
                <option value="female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
            </select>

            <!-- <input type="submit" name="submit" value="Update"> -->
            <button class="btn-form btn-add" type="submit" name="submit">
               <img src="../../img/update.png" alt="Update button">
            </button>

        </form>
    </div>

</body>
</html>