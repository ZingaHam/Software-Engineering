<?php
include("config.php");
session_start();
ob_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //when the form input button is clicked
    $user_email = mysqli_real_escape_string($db,$_POST["email"]);
    $user_password = mysqli_real_escape_string($db,$_POST["password"]);
    // sql script to be run
    $sql = "SELECT userID FROM users WHERE email = '$user_email' and password = '$user_password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result); // returns dict like array
    $count = mysqli_fetch_assoc($result);

    // if the table returns 1 row(denoting a match)
    if($count==1){ // the user's info exist in the db
        // record their user id for the session
        $_SESSION['login_userID'] = $user_email;

        //and directs user to the account page
        header("location:index.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>


<html>

<head>
    <title>Login</title>
</head>

<body>

<h2>Enter Email and Password</h2>
<div class = "container form-signin">
<!--Form has no action because php is present in the file-->
    <form action = "" method = "post">
        <label>Email  :</label><input type = "text" name = "email" class = "box"/><br /><br />
        <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
        <input type = "submit" value = " Submit "/><br />
    </form>
</div> <!-- /container -->

</body>
</html>