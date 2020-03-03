<?php

    // USING SESSION - store a data
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
        echo "Welcome ".$_SESSION['UserLogin']."<br> <br>";
    } else {
        echo header("Location: index.php");
    }


    include_once("connections/connection.php");

    $con = connection();

    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id = '$id'";
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();

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

    <form action="delete.php" method="post">
        <a href="index.php">< Back</a>
        <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>
        <!-- When creating a delete button it must be POST to prevent deletion data on DB easily -->

            <?php if($_SESSION['Access'] == 'administrator'){?>
                <button type="submit" name="delete">Delete</button>
            <?php } ?>

            <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
    </form>

    <br>

    <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
    <p>is a <?php echo $row['gender'];?></p>
</body>
</html>