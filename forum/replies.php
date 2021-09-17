<?php
    include "header.php";
    include "connect.php";
    if(isset($_GET['id']) && isset($_POST['answer']) && $_SESSION['id'])
    {
        $qid = $_GET['id'];
        $answer = $_POST['answer'];
        $uid = $_SESSION['id'];
        $sql = "INSERT INTO `replies` (`id`, `topic_id`, `reply`, `user_id`) VALUES (NULL, '$qid', '$answer', '$uid')";
        $result = $conn->query($sql);
        if(!$result)
        {
            echo mysqli_error($conn);
        }

    }
?>
<form action="" method="post">
    <textarea name="answer" id="answer" cols="60" rows="5" required></textarea>
    <input id="ansbtn" type="submit" value="Answer it!">
</form>
<div id="answerwrapper" style="positon:relative;height:100%;position:relative;top: 50px;left:340px;width:44%;">
<?php
    if(isset($_GET['id']))
    {
        $qid = $_GET['id'];
    }
    
    $sql = "SELECT * FROM replies WHERE topic_id = '$qid' ORDER BY id DESC";
    $result = $conn->query($sql);
    if(!$result)
    {
        echo mysqli_error();
    }
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $userid = $row['user_id'];
        $sql = "SELECT user_name FROM users WHERE user_id = '$userid'";
        $names = $conn->query($sql);
        if(!$names)
        {
            echo mysqli_error();
        }
        $x = mysqli_fetch_assoc($names);
        echo "<span style='color:#17252A;'><b><i>";
        echo $x['user_name'];
        echo "</i></b></span>";
        echo "<p style='padding:5px;'>";
        echo $row['reply'];
        echo "</p>";
        echo "<hr style='border:2px solid #17252A;'>";
    }
?>
    </div>
    </body>
</head>
