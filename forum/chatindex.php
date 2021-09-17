<?php
    session_start();
    include "chatconnect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="chatstyle.css">
        <link href="w3.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <script>
            function ajax() 
            {
                var req = new XMLHttpRequest();
                req.onreadystatechange = function(){
                    if(req.readyState == 4 && req.status == 200){
                        document.getElementById('chat_box').innerHTML = req.responseText;
                    }
                }
                req.open('GET','chat.php',true);
                req.send();
            }

        </script>
    </head>
    <body onload="ajax();">

        <div id="mytopnav" class="topnav w3-card">
            <a class="fa fa-home" ref="index.php">  Home</a>
            <a class="fa fa-th-list" href="chatindex.php">  Live Forum</a>
            <span class="fa fa-user" style="color:#FEFFFF;font-size:180%;position:relative;left:580px;"><?php echo "  ".$_SESSION['name'];?></span>
            <a class="fa fa-sign-out" href="logout.php" id="logout"> Logout</a> 
        </div>

        <div class="sidenav">
            <a id="general" href="#" onclick="ajax();return false;" style="background-color:#DEF2F1;color:#17252A;">General</a>
        </div>

        <div class="main" id="chat_box"></div>

        <form action="" method="post" id="chatform">
            <input autocomplete="off" type="text" name="message" id="message" placeholder="Write your message here..">
            <input type="submit" name="submit" value="Send!" style="padding:1%;background-color: #DEF2F1;border:none;">
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                if(!empty($_SESSION['name']) && !empty($_POST['message']))
                {
                    $name = $_SESSION['name'];
                    $msg = $_POST['message'];
                    $sql = "INSERT INTO chat(name,msg) VALUES('$name','$msg')";
                    $result = $conn->query($sql);
                    #if($result)
                    #{
                    #    echo "<embed loop='false' src='chat.mp3' hidden='true' autoplay='true'/>";
                    #}
                }
            }
        ?>
    </body>
</html> 
