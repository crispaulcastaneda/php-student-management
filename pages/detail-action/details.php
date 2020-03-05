<?php

    // USING SESSION - store a data
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
        echo "<div class='message admin'>Welcome " .$_SESSION['UserLogin']. ' 👦</div>';
    } else {
        echo header("Location: ../../index.php");
    }


    include_once("../../connections/connection.php");

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

        <link rel="stylesheet" href="../../css/style.css">

         <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>
<body class="main-page">

    <div class="form-wrapper">
        <form action="delete.php" method="post">
            <a href="../../index.php"><img src="../../img/back.png" alt="back"></a>
            <a href="edit.php?ID=<?php echo $row['id'];?>"><img src="../../img/edit.png" alt="back"></a>
            <!-- When creating a delete button it must be POST to prevent deletion data on DB easily -->

                <?php if($_SESSION['Access'] == 'administrator'){?>
                    <button type="submit" name="delete" class="btn-details"><img src="../../img/del.png" alt="back"></button>
                <?php } ?>

                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
        </form>

        <div class="gender-type">
            <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
            <p>is a <?php echo $row['gender'];?></p>
        </div>
    </div>
</body>
</html>