<?php

    function connection(){

        // OOP Connection->mysqli
        $host = "localhost";
        $username = "root";
        $password = "12345";
        $database = "student_system";

        //Connection String
        //new mysqli (parameters)
        $con = new mysqli ($host, $username, $password, $database);

        if($con->connect_error) {
            echo $con->connect_error;
        } else {
            return $con;
        }
    }

?>
