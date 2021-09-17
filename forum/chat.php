<?php
    session_start();
    include "chatconnect.php";

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        if(isset($_SESSION['name']))
        {
            $name = $_SESSION['name'];
        }
    }

    $sql = "SELECT * FROM chat ORDER BY id ASC";
    $result = $conn->query($sql);
    if(!$result)
    {
        echo "error fetching the result";
    }

    while ($row = mysqli_fetch_assoc($result)) 
    {
        if($name == $row['name'])
        {
?>
            <div id="my_chat_data">
                <span style="float: left;"><?php echo "You"; ?></span>
                <span style="float:right"><?php echo formatDate($row['date']); ?></span><br>
                <span><?php echo $row['msg']; ?></span><br>
            </div><br>    
<?php
        }
        else
        {
?>
            <div id="chat_data">
                <span style="float: left;"><?php echo $row['name']; ?></span>
                <span style="float:right"><?php echo formatDate($row['date']); ?></span><br>
                <span><?php echo $row['msg']; ?></span><br>
            </div><br>    
<?php
        }
    }
?>