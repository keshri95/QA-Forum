<?php
    session_start();
?>
<?php include 'loginheader.php'?>
<a class="w3-card-4" id="register" href="register.php">Not Yet Registered? Register Now!</a>
<div class="w3-card" id="wrapper">
    <?php
        include 'connect.php';
        $errors = array();
        if(isset($_SESSION['loggedin']) && $_SESSION == true)
        { 
            header("Location:index.php");
        }
        else
        {
            if(isset($_POST['email']) && isset($_POST['password']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_hash = sha1($password);
                $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_pass = '$password_hash' AND user_email LIKE '%@acharya.ac.in'";
                $result = $conn->query($sql);
                if(!$result)
                {
                    echo "<span class='error'>Your Have Not Yet Registered.<a href='register.php'>Register Now!</a></span><br>";
                }
                else
                {
                    $numrows = mysqli_num_rows($result);
                    if($numrows==0)
                    {
                        echo "<span class='error'>Invalid Username Or Password</span><br>";
                    }
                    else
                    {
                        $_SESSION['loggedin'] = true;
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['id'] = $row['user_id'];
                        $_SESSION['name'] = $row['user_name'];
                        $_SESSION['level'] = $row['user_level'];
                    }
                }
            }
        }
        
    ?>
    <form class="form" method="POST" action="login.php">
        <b><i>Username:</b></i><br><input class="input" type="email" name = "email" placeholder="Enter Acharya E-mail Id.."  required><br><br>
        <b><i>Password:</b></i><br><input class="input" type="password" name="password" placeholder="Enter Password.." required><br><br>
        <input id="login" type="submit" value="Login">
    </form>
</div>
<?php
    include 'loginfooter.php';
?>