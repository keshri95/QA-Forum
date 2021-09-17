<?php
    include 'loginheader.php';
    include 'connect.php';
?>
<?php
    if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confpassword']))
    {
        if (!empty($_POST['username'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['confpassword'])) 
        {
            $username = $_POST['username'];    
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_hash = sha1($password);
            $confpassword = $_POST['confpassword'];
            if($password == $confpassword)
            {
                $sql = "INSERT INTO users VALUES(NULL,'$username','$password_hash','$email',0)";
                $result = $conn->query($sql);
                if(!$result)
                {
                    die(mysqli_error($conn));
                }
                else
                {
                    echo "<h4>Hello ".$username.".Welcome To Acharya ISE Forum</h4>"."<a href='login.php'>Login Now!</a>";
                }
            }
            else
            {
                echo "<h4>Password And Confirm Password Donot Match..</h4>";
            }
            
        }
    }
?>
<div id='regwrap' class="w3-card">
    <form  id= "regform" action="register.php" method="post">
        <b><i>Name:</i></b><br><input type="text" name="username" id="username" placeholder="Enter Name.." required><br>
        <b><i>E-mail:</i></b><br><input type="email" name="email" id="email" placeholder="Enter Acharya E-mail Id.." required><br>
        <b><i>Password:</i></b><br><input type="password" name="password" id="password" placeholder="Enter Password" required><br>
        <b><i>Retype Password:</i></b><br><input type="password" name="confpassword" id="confpassword" placeholder="Retype Password" required><br>
        <input id="reg" type="submit" value="Register"><br>
        <a id="alreg" href="login.php">Already Registered?Login</a>
    </form>
</div>