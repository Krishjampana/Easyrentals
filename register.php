<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>

    <link rel="stylesheet" href="style.css"/>
 
</head>
<header>
</header>
<body>
<?php
require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $phonenum    = stripslashes($_REQUEST['phonenum']);
        $phonenum    = mysqli_real_escape_string($con, $phonenum);
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query0    = "SELECT * FROM `users` WHERE username='$username'";
        $result0 = mysqli_query($con, $query0);
        $rows = mysqli_num_rows($result0);

        if ($rows == 1 ) {
            echo "<div class='form'>
                  <h3>User Already Existed</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>";
        }
        else{
        $query    = "INSERT into `users` (name, phnum, email, username, password)
                     VALUES ('$name', '$phonenum', '$email', '$username','$password')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }}

    } else {
?>
<h1 style="font-size:45px;text-align:center">Easy Rentals </h1>  
    <form class="form" method="post" name="login">
        <h1 class="login-title">Registeration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" autofocus="true"/>
        <input type="text" class="login-input" name="email" placeholder="Email"/>
        <input type="text" class="login-input" name="phonenum" placeholder="Mobile Number" />
        <input type="text" class="login-input" name="username" placeholder="Username"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Register" name="Register" class="login-button"/>
        <p class="link"><a href="index.php">Login</a></p>
  </form>
  <?php
    }
?>

</body>
</html>