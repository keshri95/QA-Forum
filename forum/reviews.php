<?php
    include 'header.php';
    include 'connect.php';
?>
    <div id="comments">
        <form action="reviews.php" method="post">
            <b><i>Comment:</i></b><br><textarea name="comment" id="comment" cols="10" rows="5" placeholder="Add Suggestion.."></textarea><br><br>
            <input type="submit" value="POST" id="suggest">
        </form>
    </div>
    <div id="comdiv" style="">
        <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {
                    echo "<div id='comwrap'>";
                    echo "<h2>All Suggestions:</h2><br>";
                    if(isset($_POST['comment']) && !empty($_POST['comment']))
                    {
                        $comment = $_POST['comment'];
                        $user = $_SESSION['name'];
                        $sql = "INSERT INTO feedback VALUES(NULL,'$user','$comment')";
                        $result = $conn->query($sql);
                        if(!$result)
                        {
                            die("<h4>error connecting to server</h4>");
                        }
                    }
                    $sql1 = "SELECT * FROM feedback ORDER BY id DESC";
                    $result1 = $conn->query($sql1);
                    while($row = mysqli_fetch_assoc($result1))
                    {
                        echo "<h4 style='color:#3AAFA9;'><i>".$row['user_id']."</i></h4>";
                        echo "<span style='color: #17252A;'>".$row['comment']."</span><br><br>";
                    }
                    echo "</div>";                
            }
            else
            {
                header("Location:login.php");
            }
        ?>
    </div>
</body>
</html>