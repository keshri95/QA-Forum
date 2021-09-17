<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "chat";
    $conn = mysqli_connect($host,$user,$password,$db);
    if(!$conn)
    {   
        echo "unable to connect to server";
    }
    function formatDate($date)
    {
        return date('g:i a',strtotime($date));
    }
?>
