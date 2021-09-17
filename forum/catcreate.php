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
        if($_SESSION['level'] != 1)
        {
            echo "<h3>Your're Not Allowed To Create A Category.Please Ask Admin To Create Category..</h3>";
        }
        else
        {
            if(isset($_POST['catname']) && isset($_POST['catdesc']))
            {
                $catname = $_POST['catname'];
                $catdesc = $_POST['catdesc'];
                if($catname != NULL && $catdesc != NULL)
                {
                    $sql = "INSERT INTO categories VALUES(NULL,'$catname','$catdesc')";
                    $result = $conn->query($sql);
                    if(!$result)
                    {
                        echo "<h3>Cannot Add The Category Now.Please Try Again Later..</h3>";
                    }
                    else
                    {
                        $_SESSION['newcat'] = true;
                        header("Location:index.php");
                    }
                }
                else 
                {
                    echo "Please Fill The Given Fields With Proper Values..";
                }
            }
            else
            {
                header("Location:create_cat.php");
            }
        }
    }
}
?>