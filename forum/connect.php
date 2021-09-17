<?php
    $host = "localhost";
    $dbname = "forum";
    $user = "root";
    $pass = "";
    $conn = mysqli_connect($host,$user,$pass,$dbname);
    if(!$conn)
    {
        die("error connecting to server".mysqli_error($conn));
    }
?>