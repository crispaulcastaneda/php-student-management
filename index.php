<?php

    // USING SESSION - store a data
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['UserLogin'])) {
<<<<<<< HEAD
        echo "<div class='message admin'>Welcome " .$_SESSION['UserLogin']. ' 👦</div>';
=======
        echo "<div class='message admin'>Welcome Admin!</div> ".$_SESSION['UserLogin'];
>>>>>>> 8a9d19b9e8d539726aa00bb2dc7e21e3c9e8d45d
    }else{
        echo "<div class='message info'>Welcome Guest! 🙋‍♂️</div>";
    }


    include_once("connections/connection.php");

    $con = connection();

    $sql = "SELECT * FROM student_list ORDER BY id DESC";
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

         <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>
<body class="main-page">

        <h1>Student Management System</h1>
        <form action="pages/search/result.php" method="get" class="main-form">
            <input type="text" name="search" id="search">
            <button type="submit" class="btn-main">Search</button>
        </form>

    <div class="table-set">
        <div class="add-log">
            <?php if(isset($_SESSION['UserLogin'])){ ?>
                <a href="pages/login/logout.php"><img src="img/logout.png" alt="logout"></a>
            <?php } else { ?>

                <a href="pages/login/login.php"><img src="img/login.png" alt="login"></a>
            <?php } ?>

            <a href="pages/detail-action/add.php"><img src="img/add.png" alt="logout"></a>
        </div>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>View Details</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                </tr>
                </thead>
                <tbody>
                <?php do{ ?>
                    <tr>
                        <td><a href="pages/detail-action/details.php?ID=<?php echo $row['id'];?>"><img src="img/view.png"></a></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                    </tr>
                <?php }while($row = $students->fetch_assoc())?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>