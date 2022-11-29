<?php
include("config.php");
session_start();
ob_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //when the form input button is clicked
    $user_email = mysqli_real_escape_string($db,$_POST["email"]);
    $user_password = mysqli_real_escape_string($db,$_POST["password"]);
    // sql script to be run
    $sql = "SELECT userID FROM user WHERE email = '$user_email' and password = '$user_password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result); // returns dict like array
    //print_r($row);
    $count = count($row);

    // if the table returns 1 row(denoting a match)
    if($count==1){ // the user's info exist in the db
        // record their user id for the session
        $_SESSION['login_userID'] = $row["userID"];

        //and directs user to the account page
        header("location:account_page.php");
    }else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>


<html>

<head>
    <title>Login</title>
</head>

<body>
<nav class="navbar background">
    <ul class="nav-list">
        <div class="logo">
            <li><a href="index.php"><img src="logo.png"></a></li>
        </div>
        <li><a href="account_page.php">Account</a></li>
        <li><a href="course_page.html">Courses</a></li>
    </ul>

    <div class="rightNav">
        <input type="text" name="search" id="search">
        <button class="btn btn-sm">Search</button>
    </div>
</nav>
<h2>Enter Email and Password to Log-in</h2>
<div class = "container form-signin">
<!--Form has no action because php is present in the file-->
    <form action = "" method = "post">
        <label>Email  :</label><input type = "text" name = "email" class = "box"/><br /><br />
        <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
        <input type = "submit" value = " Submit "/><br />
    </form>
    <p>Or create a New Account by Clicking the Button Below</p>
    <input type="button" onclick= "window.location.href('new_account.php')" value="Create Account"/>
</div> <!-- /container -->

</body>
</html>