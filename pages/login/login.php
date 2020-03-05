<?php

    if(!isset($_SESSION)){
        session_start();
    }

    include_once("../../connections/connection.php");
    $con = connection();

    if(isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";

        $user = $con->query($sql) or die ($con->error);
        $row = $user->fetch_assoc();
        $total = $user->num_rows;

        if($total > 0) {
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];

            echo header("Location: ../../index.php");
        }else{
            echo "<div class='message warning'>No user found 😥</div>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Student Management System</title>

        <!-- Main CSS -->
        <link rel="stylesheet" href="../../css/style.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>
<body class="login-body">

    <div class="wrapper">
        <form action="" method="post" class="form-wrapper">
            <div class="image-header">
                <img src="../../img/scholarship.png" alt="FlatIcon">
            </div>

            <input type="text" name="username" id="username"
                    placeholder="Username" class="form-control" required autofocus="true">
                <br>
            <input type="password" name="password" id="password" placeholder="Password" required
                    class="form-control">
                    <br>

            <button class="btn-form" type="submit" name="login">
                <img src="https://img.icons8.com/ultraviolet/40/000000/enter-key.png">
            </button>
        </form>
    </div>

</body>
</html>