<?php
include("config.php");
session_start();
ob_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //when the form input button is clicked
    $userEmail = mysqli_real_escape_string($db,$_POST["email"]);
    $userPassword = mysqli_real_escape_string($db,$_POST["password"]);
    $userFName = mysqli_real_escape_string($db,$_POST["first_name"]);
    $userLName = mysqli_real_escape_string($db,$_POST["last_name"]);
    // sql script to be run
    $sql = "INSERT INTO users (email, password, firstName, lastName, timeCreated)
VALUES ($userEmail, $userPassword, $userFName, $userLName, CURRENT_TIMESTAMP) ";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result); // returns dict like array
    $count = mysqli_fetch_assoc($result);

    // if the table returns 1 row(denoting a match)
    if($count==1){ // the user's info exist in the db
        // record their user id for the session
        $_SESSION['login_userID'] = $userEmail;

        //and directs user to the account page
        header("location:index.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html lang = "en">

<head>
    <title>New Account</title>
</head>

<body>

<h2>Enter Email and Password</h2>
<p>Later on you can add courses and other details to your account</p>
<div class = "container form-signin">
    <!--Form has no action because php is present in the file-->
    <form action = "" method = "post">
        <label>Email :</label><input type = "text" name = "email" class = "box"/><br /><br />
        <label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
<!--        <label>Confirm Password  :</label><input type = "text" name = "email" class = "box"/><br /><br />-->
        <label>First Name :</label><input type = "first_name" name = "password" class = "box" /><br/><br />
        <label>Last Name :</label><input type = "last_name" name = "email" class = "box"/><br /><br />
        <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
        <input type = "submit" value = " Submit "/><br />
    </form>
</div> <!-- /container -->

</body>
</html>