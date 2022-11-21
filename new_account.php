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
<nav class="navbar background">
    <ul class="nav-list">
        <div class="logo">
            <li><a href="index.php"><img src="logo.png"></a></li>
        </div>
        <li><a href="account_page.html">Account</a></li>
        <li><a href="course_page.html">Courses</a></li>
    </ul>

    <div class="rightNav">
        <input type="text" name="search" id="search">
        <button class="btn btn-sm">Search</button>
    </div>
</nav>
<h2>Enter Email and Password</h2>
<p>Please Fill in the Form Below <br> Later on you can add courses and other details to your account</p>
<div class = "container form-signin">
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