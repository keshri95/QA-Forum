<?php
    include 'header.php';
    include 'connect.php';
    if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['level']) && isset($_SESSION['loggedin']))
    {
        if($_SESSION['loggedin'] != true)
        {
            die("<h3>Please Login First"."<a href='login.php'>Login</a></h3>");
        }
        else
        {
            if(isset($_POST['question']) && isset($_POST['description']) && isset($_POST['catlist']))
            {
                $question = $_POST['question'];
                $description = $_POST['description'];
                $category = $_POST['catlist'];
                $postedby = $_SESSION['name'];
                if($question != NULL && $description != NULL && $category != NULL)
                {
                    $sql = "INSERT INTO topics VALUES(NULL,'$question','$description','$category','$postedby')";
                    $result = $conn->query($sql);
                    if(!$result)
                    {
                        echo "<h3>Unable To Connect.Please Try After Some Time..</h3>";
                    }
                    else
                    {
                        echo "<h3>You've Successfully Created A New Topic."."<a href='index.php'>Go To HomePage</a>"."</h3>";
                    }
                }
                else 
                {
                    echo "<h3>Please Fill The Given Fields With Proper Values..<h3>";
                }
            }
            else
            {
                header("Location:create_topic.php");
            }
        }
    }
?>