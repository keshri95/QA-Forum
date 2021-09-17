<?php
    include 'header.php';
    include 'connect.php';
?>
<?php
    if(isset($_GET['id']))
    {
        $catid=$_GET['id'];
        $sql = "SELECT * FROM categories WHERE cat_id = '$catid'";
        $result = $conn->query($sql);
        if(!$result)
        {
            die("Unable To Connect To Server");
        }
        else
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                    $catname = $row['cat_name'];
                    echo "<div id='d01'>";
                    echo "<b><i><h1 style='color:#17252A;'>".$row['cat_name']."</h1></i></b><br>";
                    echo "<p>".$row['cat_description']."</p>";
                    echo "</div>";
            }
            $sql = "SELECT * FROM topics WHERE topic_cat = '$catname'";
            $result = $conn->query($sql);
            if(!$result)
            {
                echo "Error In Network Connection";
            }
            else
            {
                echo "<h1 style='position:relative;left:300px;'>All Topics Under This Category Are:</h1><br>";
                echo "<hr>";
                echo "<div id='alltopics'>";
                if(mysqli_num_rows($result) == 0)
                {
                    echo "No Topics Available."."<a href='create_topic.php'>Post A New Topic</a>"." Under This Category";
                }
                else 
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<h2 style='color:#3AAFA9;'>".$row['topic_name']."</h2><br>";
                        echo "<p style='color:#17252A'>".$row['topic_desc']."</p>";   
                    }    
                }
                echo "</div>";
                echo "<hr>";
            }
        }
        
    }
?>